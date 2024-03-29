<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    
    //RELACION 1 A 1 INVERSA
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
