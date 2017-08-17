<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'player_id',
        'yesTransfer',
        'noTransfer',
        'offTransfer',
        'amountTransfer',
        'linkTransfer',
        'activeTransfer',
        'session_id',
    ];

    public function teams(){
        return $this->belongsToMany('App\Models\Team', 'team_transfer', 'transfer_id', 'team_id')
                    ->withPivot('left');
    }
    
    public function player(){
        return $this->belongsTo('App\Models\Player');
    }

    public function session(){
        return $this->belongsTo('App\Models\Session');
    }

    public function getAmountAttribute(){
        return number_format($this->attributes['amountTransfer'], 1, ',', '')." M€";
    }
    
    public function getTreatAmountAttribute(){
        if($this->attributes['offTransfer'] != false) {
            if (is_null($this->attributes['amountTransfer'])) {
                return 'Prêt';
            } else {
                return $this->getAmountAttribute();
            }
        } else{
            return 'Non officiel';
        }
    }
    
    public function getTeamLeft(){
        foreach($this->teams as $t){
            if($t->pivot->left == 1){
                return $t;
            }
        }
    }

    public function getTeamRight(){
        foreach($this->teams as $t){
            if($t->pivot->left == 0){
                return $t;
            }
        }
    }
}

