<?php

namespace App\Jobs;

use App\Models\Miner;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CorporationChecks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // Grab all of the miner records we have, and loop through them all to queue jobs
        // to check their corporation membership.
        $miners = Miner::all();
        Log::info('CorporationChecks: found ' . count($miners) . ' miners in the database');
        $delay_counter = 1;

        foreach ($miners as $miner) {
            CorporationCheck::dispatch($miner->eve_id)->delay(Carbon::now()->addSecond(15 * $delay_counter));
            Log::info('CorporationChecks: dispatched job to check the corporation for miner ' .
                $miner->eve_id . ' in ' . (15 * $delay_counter) . ' seconds');
            $delay_counter++;
        }

    }

}
