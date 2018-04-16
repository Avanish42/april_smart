<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChequeRegisterModel extends Model
{


    public function scopeCompleted($query){
        return $query->where('is_completed',1);
    }

    public function scopeCleared($query){
        return $query->where('is_cleared',1);
    }

    public function scopeUnBounced($query){
        return $query->where('is_bounce',0);
    }

    public function scopeSearchCheque($query,$value){
        return $query->where(function($query) use ($value){
            $query->where('cheque_number', 'like', '%' . $value . '%')
                ->orWhere('billno', 'like', '%' . $value . '%')
                ->orWhere('allocationNo', 'like', '%' . $value . '%');
        });

    }
}
