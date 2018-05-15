<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BounceChequeAllocation extends Model
{
    protected $table = 'bounce_cheque_allocation';

    public function bank(){
        return $this->belongsTo('App\Model\Bank','bank_id');
    }
    public function penalty(){
        return  $this->belongsTo('App\Model\ChequePenaltyModel','penalty_id');
    }
}
