<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TempBillRetailer extends Model
{
    protected $table = 'temp_bill_retailer';

    public function salesMan(){
        return $this->belongsTo('App\User','salesman_id');
    }
}
