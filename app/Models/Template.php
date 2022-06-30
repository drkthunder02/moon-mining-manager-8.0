<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Template
 *
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Template whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Template extends Model
{
    //
}
