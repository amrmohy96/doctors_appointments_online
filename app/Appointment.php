<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Appointment
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $doctor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Time[] $times
 * @property-read int|null $times_count
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUserId($value)
 * @mixin \Eloquent
 */
class Appointment extends Model
{
    protected $guarded = [];

    public function times()
    {
        return $this->hasMany(Time::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
