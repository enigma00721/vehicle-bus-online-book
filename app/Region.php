<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $fillable = ['region_name','region_code'];

    // accessors
    public function getCreatedAtAttribute()
    {
        return  \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
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
