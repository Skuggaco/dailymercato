<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'nameTeam',
        'nameLongTeam',
        'imgTeam',
        'league_id'
    ];

    public function sluggable(){
        return [
            'slugTeam' => [
                'source' => ['nameLongTeam', 'id']
            ]
        ];
    }

    public function getFullNameTeamAttribute(){
        return $this->attributes['nameLongTeam']." (".$this->attributes['nameTeam'].")";
    }

    public function league(){
        return $this->belongsTo('App\Models\League');
    }

    public function players(){
        return $this->belongsToMany('App\Models\Player', 'team_player', 'team_id', 'player_id')
                    ->withPivot('activity');
    }

    public function transfers(){
        return $this->belongsToMany('App\Models\Transfer', 'team_transfer', 'team_id', 'transfer_id')
                    ->withPivot('left');
    }

    public function scopeNotFind($query, $id){
        return $query->where('id', '!=', $id);
    }

    public function scopeOldTeams($query, $id){
        return $query
            ->whereHas('players', function ($q) use ($id) {
                $q->where('activity', '=', 0)
                  ->where('player_id', '=', $id);
            });
    }

}
