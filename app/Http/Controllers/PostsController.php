<?php

//Posting a pic on Instagram
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller{

    //  middleware prevent access to this endpoint if not logged in
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users= auth()->user()->pluck('id');

        $posts=Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);

        return view('posts.index',compact('posts'));
    }

    //allows access from profile to post form
    public function create(){
        return view('posts.create');
    }

    public function store(){
    // validate request
    //image is now instance of uploaded file
        $data= request()->validate([
            'caption'=> 'required',
            'image'=> ['required','image']
        ]);
            
        //resize image using intervention and post
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        
        //Uppload image to cloudinary get back URL
        $image = \Cloudinary\Uploader::upload(request('image'));
        
        //get post from authenticated user and create profile
        auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'image' => $image['secure_url'],
        ]);

        //redirect back  to owners profile which now contains post
        return redirect('/profile/'. auth()->user()->id);

        
    }

    public function show(\App\Post $post){
        return view('posts.show',compact('post'));
    }

    public function delete($id){
        // return redirect()->route('products.index')

        //                 ->with('success','Product deleted successfully');
        dd($id);
        $id=Post::find($post->id);
        $id->delete();
        return redirect('/profile/'. auth()->user()->id);
    }
}
