<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Disable mass assignment
    protected $guarded = [];

    //default image
    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'https://res.cloudinary.com/burnerb/image/upload/v1579684420/myl5jzry6acold1cg5lw.png';
        return $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
