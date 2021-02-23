<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Buses extends Model
{
    protected $table = 'buses';
    protected $fillable = ['bus_name','bus_code','operator_id',
                             'total_seats','image'];


    public function operator()
    {
        return $this->belongsTo('App\Operator');
    }

    // accessors
    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->diffForHumans();
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
