<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Disable mass assignment
    protected $guarded = [];

    //default image
    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'profile/6s9b2zhXyHKqstZKqqUtBAOn5f49WgPhAUBhcvnN.jpeg';
        return '/storage/'.$imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
