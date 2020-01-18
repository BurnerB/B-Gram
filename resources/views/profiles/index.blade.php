@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fnbo2-1.fna.fbcdn.net/v/t51.2885-19/s150x150/10508062_859875700789185_1123492754_a.jpg?_nc_ht=instagram.fnbo2-1.fna.fbcdn.net&_nc_ohc=B2PCns3QiMsAX88A-dV&oh=5a256f7cc8d79443bdc211ba81e82c40&oe=5E968384" class="rounded-circle">
        </div>
    
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username}}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <a href="/profile/{{$user->id}}/edit ">Edit Profile</a>
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-4"><strong>1.1M</strong> followers</div>
                <div class="pr-4"><strong>1</strong> follower</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url}}</a></div>
            

           
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-3">
                <a href="/p/{{ $post->id }}">
                    <img src=" /storage/{{ $post->image }}" class="w-100">
                </a>
                
            </div>
        @endforeach
    </div>
</div>
@endsection
