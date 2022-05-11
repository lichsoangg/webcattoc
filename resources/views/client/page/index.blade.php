@extends('client.share.master')
@section('content')
@php
$user = Auth::user();
@endphp
@if(isset($user))
<section class="section-padding-1_7 border-bottom">
    <div class="container">
        <div class="row">
            @foreach ($data as $key => $value)
            <div class="col-lg-4 col-sm-6">
                <div class="category-single category--img">
                    <figure class="category--img4">
                        <img src="img/hinhnen1.png" alt="">
                        <figcaption class="overlay-bg">
                            <a href="" data-toggle="modal" data-target="#signup_modal1" class="cat-box">
                                <div>
                                    <div class="icon">
                                        <span class="la la-scissors"></span>
                                    </div>
                                    <h4 class="cat-name">{{$value->tencombo}}</h4>
                                    <h6 class="cat-name">Các Bước : {{$value->chucnang}}</h6>
                                    <h6 class="cat-name">Giá : {{ number_format($value->giatien, 0, ',', '.') }} VND</h6>
                                    <span class="badge badge-pill badge-success" >Đặt Lịch Ngay</span>
                                </div>
                            </a>
                        </figcaption>
                    </figure>
                </div><!-- ends: .category-single -->
            </div><!-- ends: .col -->
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="signup_modal1" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signup_modal_label"><i class="la la-lock"></i> Vui lòng chọn thời gian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id" {{$user->id}}>
                    <h5>Nhập ngày</h5>
                    <br>
                        <input type="date" id="ngaycat" class="form-control" placeholder="Ngày cắt" required>
                        <br>
                        <h5>Nhập giờ</h5>
                    <br>
                        <input type="time" id="goicat" min="09:00" max="18:00" class="form-control" placeholder="Ngày cắt" required>
                        <br>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="dangky">Đặt Ngay</button>
                </div>
            </div>
        </div>
    </div>
@else
<section class="section-padding-1_7 border-bottom">
<div class="container">
    <div class="row">
        @foreach ($data as $key => $value)
        <div class="col-lg-4 col-sm-6">
            <div class="category-single category--img">
                <figure class="category--img4">
                    <img src="img/hinhnen1.png" alt="">
                    <figcaption class="overlay-bg">
                        <a href="" data-toggle="modal" data-target="#login_modal" class="cat-box">
                            <div>
                                <div class="icon">
                                    <span class="la la-scissors"></span>
                                </div>
                                <h4 class="cat-name">{{$value->tencombo}}</h4>
                                <h6 class="cat-name">Các Bước : {{$value->chucnang}}</h6>
                                <h6 class="cat-name">Giá : {{ number_format($value->giatien, 0, ',', '.') }} VND</h6>
                                <span class="badge badge-pill badge-success" >Đặt Lịch Ngay</span>

                            </div>
                        </a>
                    </figcaption>
                </figure>
            </div><!-- ends: .category-single -->
        </div><!-- ends: .col -->
        @endforeach

    </div>
</div>
@endif
@endsection
