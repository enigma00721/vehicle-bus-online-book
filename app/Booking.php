<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{

    protected $table = 'bookings';

    protected $fillable = ['customer_id' , 'schedule_id' , 'bus_id',
                             'number' , 'seat_amount'
                        ];

    // relationship
    public function user()
    {
        return $this->belongsTo('App\User','customer_id');
    }
    public function bus()
    {
        return $this->belongsTo('App\Buses');
    }
    public function schedule()
    {
        return $this->belongsTo('App\Bus_Schedule','schedule_id');//foreign key
    }

     // accessors
    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
