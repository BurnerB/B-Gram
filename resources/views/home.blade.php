@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fnbo2-1.fna.fbcdn.net/v/t51.2885-19/s150x150/10508062_859875700789185_1123492754_a.jpg?_nc_ht=instagram.fnbo2-1.fna.fbcdn.net&_nc_ohc=B2PCns3QiMsAX88A-dV&oh=5a256f7cc8d79443bdc211ba81e82c40&oe=5E968384" class="rounded-circle">
        </div>
    
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username}}</h1></div>
            <div class="d-flex">
                <div class="pr-4"><strong>153</strong> posts</div>
                <div class="pr-4"><strong>1.1M</strong> followers</div>
                <div class="pr-4"><strong>1</strong> follower</div>
            </div>
            <div class="pt-4 font-weight-bold">BurnerB</div>
            <div><a href="https://burnerb.github.io/Portfolio"></a></div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas ab vel deserunt maiores eius vitae, ipsum quam numquam aut doloribus delectus sint, voluptatem eos sequi esse praesentium itaque molestiae cum.</div>

           
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-4">
            <img src="https://instagram.fnbo2-1.fna.fbcdn.net/v/t51.2885-15/e35/59704794_356110521925319_8620756903331231824_n.jpg?_nc_ht=instagram.fnbo2-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=XaTslINV-YsAX9T3DbI&oh=5aa6f585e2d3f035f318ea22c72e01e4&oe=5EB533C4" class="w-100">
        </div>

        <div class="col-4">
            <img src="https://instagram.fnbo2-1.fna.fbcdn.net/v/t51.2885-15/e35/59704794_356110521925319_8620756903331231824_n.jpg?_nc_ht=instagram.fnbo2-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=XaTslINV-YsAX9T3DbI&oh=5aa6f585e2d3f035f318ea22c72e01e4&oe=5EB533C4" class="w-100">
        </div>

        <div class="col-4">
            <img src="https://instagram.fnbo2-1.fna.fbcdn.net/v/t51.2885-15/e35/59704794_356110521925319_8620756903331231824_n.jpg?_nc_ht=instagram.fnbo2-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=XaTslINV-YsAX9T3DbI&oh=5aa6f585e2d3f035f318ea22c72e01e4&oe=5EB533C4" class="w-100">
        </div>
</div>
@endsection
