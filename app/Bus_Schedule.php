<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bus_Schedule extends Model
{
    protected $table = 'bus_schedules';

    protected $fillable = ['bus_id','from','destination','operator_id',
                             'depart_date_time','return_date_time','pickup_address','dropoff_address','price'];

    // relationship
    public function bus()
    {
        return $this->belongsTo('App\Buses');
    }

    // accessors
    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    // method
    // from 02/26/2021 7:16 PM
    // retunr 7:16 PM
    public function departTime()
    {
        $depart_time = $this->attributes['depart_date_time'];
        $result = explode(" ",$depart_time);
        return $result[1] . ' ' . $result[2];
    }


     /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatusActive($query)
    {
        return $query->where('status', 0);
    }
}
