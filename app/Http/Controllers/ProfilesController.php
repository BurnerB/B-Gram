<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {   
        $follows=(auth()->user()) ? auth()->user()->following->contains($user) :false;

        $postCount = Cache::remember(
            'count-posts.' . $user->id,
            now()->addSeconds(30),
            function() use($user){
                return $user->posts->count();
            });

            
        // $followersCount = Cache::remember(
        //     'count-followers.' . $user->id,
        //     now()->addSeconds(30),
        //     function() use($user){
        //         return $user->profile->followers->count();
        //     });

            
        // $followingCount = Cache::remember(
        //     'count-followers.' . $user->id,
        //     now()->addSeconds(30),
        //     function() use($user){
        //         return $user->following->count();
        //     });

        return view('profiles.index',compact('user','follows','postCount'));
    }

    public function edit(User $user){

        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){

        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url' => 'url',
            'image'=>'',
        ]);

        

        if(request('image')){
            // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image = \Cloudinary\Uploader::upload(request('image'));

            $imageArray=['image'=>$image['secure_url']];
        }

        //save image as path
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
