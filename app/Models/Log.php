<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Log
 *
 * @property int $id
 * @property string $cron_type
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereCronType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Log whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
    //
}
