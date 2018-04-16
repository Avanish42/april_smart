<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BounceChequeRegisterModel extends Model
{

    public function penalty(){
        return  $this->belongsTo('App\Model\ChequePenaltyModel','penalty_id');
    }
}
