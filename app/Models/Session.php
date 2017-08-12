<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'nameSession',
        'start_at',
        'end_at',
        'on_going'
    ];

    protected $dates = [
        'start_at',
        'end_at',
        'created_at',
        'updated_at'
    ];

    public function sluggable(){
        return [
            'slugSession' => [
                'source'  => 'nameSession'
            ]
        ];
    }

    public function transfers(){
        return $this->hasMany('App\Models\Transfer');
    }
}
