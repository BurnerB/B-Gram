<?php

//Posting a pic on Instagram
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller{

    //  middleware prevent access to this endpoint if not logged in
    public function __construct(){
        $this->middleware('auth');
    }

    //allows access from profile to post form
    public function create(){
        return view('posts.create');
    }

    public function store(){
    // validate request
        $data= request()->validate([
            'caption'=> 'required',
            'image'=> ['required','image']
        ]);

        //image is now instance of uploaded file
        //use php artisan storage:link 
        //create a symbolic link from public/storage to storage/app/public

        $imagePath = request('image')->store('uploads','public');
            
        //resize image using intervention and post
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        //get post from authenticated user and create
        auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'image' => $imagePath,
        ]);

        //redirect back  to owners profile which now contains post
        return redirect('/profile/'. auth()->user()->id);

        
    }

    public function show(\App\Post $post){
        return view('posts.show',compact('post'));
    }
}
