<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Country extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'nameCountry',
        'imgCountry'
    ];

    public function sluggable(){
        return [
            'slugCountry' => [
                'source' => ['nameCountry', 'id']
            ]
        ];
    }

    public function leagues(){
        return $this->hasMany('App\Models\League');
    }
    
    public function players(){
        return $this->hasMany('App\Models\Player');
    }

    public function scopeNotFind($query, $id){
        return $query->where('id', '!=', $id);
    }
}