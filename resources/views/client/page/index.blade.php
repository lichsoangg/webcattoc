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
                            <a href="" data-toggle="modal" data-gd={{$value->giatien}} data-id={{$value->tencombo}} data-target="#signup_modal1" class="cat-box callDelete">
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
                    <input type="hidden" id="user_id" value="{{$user->id}}">
                    <input type="hidden" id="combo_id" >
                    <input type="hidden" id="gia_id" >
                    <h5>Nhập ngày</h5>
                    <br>
                        <input type="date" id="ngaycat" class="form-control" placeholder="Ngày cắt" required>
                        <br>
                        <h5>Nhập giờ (vui lòng chọn từ 8:00 SA đến 7:00 CH)</h5>
                    <br>
                        <input type="time" id="giocat" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="datlich">Đặt Ngay</button>
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
@section('js')

    <script>
         $(document).ready(function(){
            $(".callDelete").click(function(){
                var id = $(this).data('id');
                var gd = $(this).data('gd');
                console.log(id);
                row = $(this);
                $("#combo_id").val(id);
                $("#gia_id").val(gd);
                });
            $('#datlich').click(function(e){
            var ngaycat        = $("#ngaycat").val();
            var giocat     = $("#giocat").val();
            var user_id  = $("#user_id").val();
            var combo_id  = $("#combo_id").val();
            var gia_id  = $("#gia_id").val();
            var data = {
                'ngaycat'    : ngaycat,
                'giocat'    : giocat,
                'user_id'    : user_id,
                'combo_id'    : combo_id,
                'gia_id'    : gia_id,
        };
        $.ajax({
                url : '/client/datlich',
                type: 'post',
                data: data,
                success: function($xxx){
                    toastr.success('Bạn đã đặt lịch thành công !');
                    location.reload();
                },
                error: function($errors){
                    var listErrors = $errors.responseJSON.errors;
                    $.each(listErrors, function(key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });
        });
    </script>
@endsection
