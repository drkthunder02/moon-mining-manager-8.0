<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UniqueNames
 *
 * @property int $itemID
 * @property string $itemName
 * @property int|null $groupID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UniqueNames newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UniqueNames newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UniqueNames query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UniqueNames whereGroupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UniqueNames whereItemID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UniqueNames whereItemName($value)
 * @mixin \Eloquent
 */
class UniqueNames extends Model
{
    protected $table = 'invUniqueNames';

    protected $primaryKey = 'itemID';

    public $incrementing = false;

    public $timestamps = false;
}
