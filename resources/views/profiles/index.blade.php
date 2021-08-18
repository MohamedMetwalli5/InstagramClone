@extends('layouts.app')

@section('content')
<div class="container">
    <div class=row>
        <div class="col-3 p-6">
            <!-- where the profile picture should be -->
            <img src="/svg/InstagramLogo.svg" alt="" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="https://www.linkedin.com/in/mohamed-metwalli5/">Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>22k</strong> followers</div>
                <div class="pr-5"><strong>207</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div> <a href="https://www.linkedin.com/in/mohamed-metwalli5/">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4"><img src="/svg/InstagramLogo.svg" alt="" class="w-100"></div>
        <div class="col-4"><img src="/svg/InstagramLogo.svg" alt="" class="w-100"></div>
        <div class="col-4"><img src="/svg/InstagramLogo.svg" alt="" class="w-100"></div>
    </div>
</div>
@endsection
