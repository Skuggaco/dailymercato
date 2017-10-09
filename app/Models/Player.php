<?php

namespace App\Models;

use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use FormAccessible;
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'namePlayer',
        'surNamePlayer',
        'birthdayPlayer',
        'contractPlayer',
        'twitterPlayer',
        'instagramPlayer',
        'snapchatPlayer',
        'valuePlayer',
        'valueVotePlayer',
        'numberVotePlayer',
        'salaryPlayer',
        'country_id',
        'position_id'
    ];

    protected $dates = [
        'birthdayPlayer',
        'contractPlayer',
        'created_at',
        'updated_at'
    ];

    protected $appends = ['full_name'];

    public function sluggable()
    {
        return [
            'slugPlayer' => [
                'source' => ['namePlayer', 'surNamePlayer', 'id']
            ]
        ];
    }
    
    public function getFullNameAttribute(){
        return $this->attributes['namePlayer']." ".$this->attributes['surNamePlayer'];
    }

    public function getContractPlayerAttribute()
    {
        return Carbon::parse($this->attributes['contractPlayer'])->format('Y-m-d');
    }

    public function getBirthdayPlayerAttribute()
    {
        return Carbon::parse($this->attributes['birthdayPlayer'])->format('Y-m-d');
    }

    public function getBirthdayPlayerFormatAttribute(){
        return Carbon::parse($this->attributes['birthdayPlayer'])->format('d/m/Y');
    }

    public function getAgePlayerAttribute(){
        return Carbon::parse($this->attributes['birthdayPlayer'])->age;
    }
    
    public function getCurrentTeamAttribute(){
        foreach($this->teams as $t){
            if($t->pivot->activity == 1){
                return $t;
            }
        }
    }

    public function getContractPlayerFormatAttribute(){
        return Carbon::parse($this->attributes['birthdayPlayer'])->format('d/m/Y');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'team_player', 'player_id', 'team_id')
            ->withPivot('activity');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function transfers(){
        return $this->hasMany('App\Models\Transfer');
    }

    public function scopeNewTeam($query, $id)
    {
        return $query->with('country')->with('position')
            ->with(['teams' => function ($q) {
                $q->wherePivot('activity', '=', 1);
            }])
            ->where('id', '=', $id);
    }
    
    public function scopeOldTeams($query, $id){
        return $query->with('country')->with('position')
            ->with(['teams' => function ($q) {     
                $q->wherePivot('activity', '=', 0);
            }])                                    
            ->where('id', '=', $id);               
    }
}
