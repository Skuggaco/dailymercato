<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'nameLeague',
        'country_id'
    ];

    public function sluggable(){
        return [
            'slugLeague' => [
                'source' => ['nameLeague']
            ]
        ];
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function teams(){
        return $this->hasMany('App\Models\Team');
    }
}
