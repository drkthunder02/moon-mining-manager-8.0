<?php

namespace App\Http\Controllers;

use App\Classes\EsiConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Seat\Eseye\Containers\EsiResponse;
use Seat\Eseye\Eseye;

class SearchController extends Controller
{
    /**
     * @var Eseye
     */
    private $conn;

    /**
     * @throws \Exception
     */
    public function search(Request $request)
    {
        $esi = new EsiConnection;
        $this->conn = $esi->getConnection();

        // Even with strict search enabled ESI sometimes returns more than one character,
        // quick way to fix this is to allow search by character ID.
        $query = $request->q;
        if (is_numeric($query)) {
            $characterId = $query;
        } else {
            $characterId = $this->esiSearch($query);
        }

        if ($characterId > 0) {
            return $this->buildResult($characterId);
        } else {
            return 'No matches returned, API may be unreachable...';
        }
    }

    /**
     * @param $query
     * @return int
     * @throws \Exception
     */
    private function esiSearch($query)
    {
        $result = $this->conn->setQueryString([
            'categories' => 'character',
            'search' => $query,
            'strict' => 'true',
        ])->invoke('get', '/search/');

        Log::info('SearchController: results returned by /search query', [
            'result' => $result,
        ]);

        if (isset($result) && isset($result->character)) {
            return $result->character[0];
        }

        return 0;
    }

    /**
     * @param $characterId
     * @return EsiResponse
     * @throws \Exception
     */
    private function buildResult($characterId)
    {
        $character = $this->conn->invoke('get', '/characters/{character_id}/', [
            'character_id' => $characterId,
        ]);
        $character->id = $characterId;
        $portrait = $this->conn->invoke('get', '/characters/{character_id}/portrait/', [
            'character_id' => $characterId,
        ]);
        $character->portrait = $portrait->px128x128;
        $corporation = $this->conn->invoke('get', '/corporations/{corporation_id}/', [
            'corporation_id' => $character->corporation_id,
        ]);
        $character->corporation = $corporation->name;

        return $character;
    }
}
