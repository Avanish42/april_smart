<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class TempBill extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;


    protected $table = 'tempbill';

    public function retailer(){
        return $this->belongsTo('App\Model\TempBillRetailer','retailer_id');
    }

    public function billProducts(){
        return $this->hasMany('App\Model\TempBillProductsDetails','tempbill_id');
    }

    public function scopeGetByInvoice($query,$search){
       return $query->where('invoice_no', 'like', '%' . $search . '%');
    }

    public function scopeSaleReturnNull($query){
        return $query->where('is_sale_return',0);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'invoice_no'
            ]
        ];
    }


}
