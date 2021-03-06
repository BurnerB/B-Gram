@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ $post->image }}" class='w-100'>    
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width:100px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id}}">
                                <span>{{ $post->user->username }}</span>
                            </a>
                            
                            @if(Auth::user()->id === $post->user->profile->user_id )
                            |<a class="btn btn-danger ml-2" href="{{ route('post.delete',$post->id) }}">Delete Post</a>
                            @endif
                        </div>
                    </div>
                </div>

                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id}}">
                            {{ $post->user->username }}
                        </a>
                    </span>
                    
                    {{ $post->caption }}
                </p>
            </div>

        </div>
    </div>
  
</div>
@endsection
