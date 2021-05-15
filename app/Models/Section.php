<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    //RELACION 1 A MUCHOS
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    //RELACION 1 A MUCHOS INVERSA
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
