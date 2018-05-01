<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BounceChequeRegisterModel extends Model
{
    public function bank(){
        return $this->belongsTo('App\Model\Bank','bank_id');
    }


    public function penalty(){
        return  $this->belongsTo('App\Model\ChequePenaltyModel','penalty_id');
    }
}
