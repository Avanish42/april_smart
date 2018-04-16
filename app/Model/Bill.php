<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bill extends Model
{

    public function field()
    {
        return $this->belongsToMany('App\User', 'user_bill', 'bill_id', 'user_id');
    }

    public function fieldTodayBills()
    {
        return $this->belongsToMany('App\User', 'user_bill', 'bill_id', 'user_id');
    }

    public function scopeByAllocationNo($query,$allocation){
        return $query->where('allocationNo',$allocation);
    }

    public function scopeIsPastFalse($query){
        return $query->where('isPast',0);
    }

    public function scopeIsPastTrue($query){
        return $query->where('isPast',1);
    }

}
