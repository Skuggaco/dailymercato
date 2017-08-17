<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'namePosition',
        'nameLongPosition'
    ];

    public function players(){
        return $this->hasMany('App\Models\Player');
    }

    public function scopeNotFind($query, $id){
        return $query->where('id', '!=', $id);
    }
}
