<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function fieldTodayBills(){
        return $this->belongsToMany('App\Model\Bill','user_bill','user_id','bill_id');
    }

    public function fieldTodayBounceChecks(){
        return $this->belongsToMany('App\Model\BounceChequeAllocation','user_cheque','user_id','bounce_cheque_allocation_id');
    }

    public function fieldTodayTemporaryBill(){
        return $this->belongsToMany('App\Model\TempBill','user_tempbill','user_id','tempbill_id');
    }

    public function tempBillRetailers(){
        return $this->hasMany('App\Model\TempBillRetailer','salesman_id');
    }
}
