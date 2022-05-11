@extends('client.share.master')
@section('content')
@php
 $user = Auth::user();
@endphp
@if(isset($user))
<div class="col-lg-12">
    <div class="atbd_auhor_profile_area">
        <div class="atbd_author_avatar">
            <img src="img/author-profile.jpg" alt="Author Image">
            <div class="atbd_auth_nd">
                @foreach ($data as $value )
                <h2>Name : {{$value->hovaten}}</h2>
                <p class="la la-phone"> Phone : {{$value->sodienthoai}}</p>
                <br>
                <p class="la la-envelope"> Email : {{$value->email}}</p>
                @endforeach
                <p>Lịch cắt : Bạn không có lịch</p>
            </div>
        </div>
    </div><!-- ends: .atbd_auhor_profile_area -->
</div>
@endif
@endsection
