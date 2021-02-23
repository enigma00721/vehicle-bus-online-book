<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operators';
    protected $fillable = ['operator_name','operator_email','operator_phone',
                             'operator_address','operator_logo'];
    // protected $primarykey = 'operator_id';

    // relationship
    public function buses()
    {
        return $this->hasMany('App\Bus');
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
