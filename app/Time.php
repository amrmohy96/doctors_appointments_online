<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Time
 *
 * @property int $id
 * @property int $appointment_id
 * @property string $status
 * @property string $from
 * @property string $to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Appointment $appointment
 * @method static \Illuminate\Database\Eloquent\Builder|Time newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Time newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Time query()
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Time whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Time extends Model
{
    protected $guarded = [];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
