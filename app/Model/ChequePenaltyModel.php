<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ChequePenaltyModel extends Model
{
    public function bounceCheques(){
        return  $this->hasMany('App\Model\BounceChequeRegisterModel','penalty_id');
    }
}
