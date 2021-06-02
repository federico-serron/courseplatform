<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    
    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id );
    }

    //RELACION MUCHOS A MUCHOS
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //RELACION 1 A 1
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    //RELACION 1 A MUCHOS INVERSA
    public function section(){
            return $this->belongsTo('App\Models\Section');
    }

    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    //RELACION 1 A 1 POLIMORFICA
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //RELACION 1 A MUCHOS POLIMORFICA
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
