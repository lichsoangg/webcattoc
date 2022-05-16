@extends('client.share.master')
@section('content')
@php
 $user = Auth::user();
@endphp
@if(isset($user))
<div class="col-lg-12">
    <div class="atbd_auhor_profile_area">
        <div class="atbd_author_avatar">
            <img src="img/avata.png" alt="Author Image">
            <div class="atbd_auth_nd">
                @foreach ($data as $value )
                <h2>Name : {{$value->hovaten}}</h2>
                <p class="la la-phone"> Phone : {{$value->sodienthoai}}</p>
                <br>
                <p class="la la-envelope"> Email : {{$value->email}}</p>
                @endforeach
                @foreach ($data1 as $value1 )
                <p>Bạn có lịch cắt vào lúc : {{$value1->giocat}} ngày :  {{$value1->ngaycat}}, {{$value1->combo_id}}, {{$value1->gia_id}} VNĐ</p>
                <p>Nhân viên : {{$value1->tennhanvien}}</p>
                <p>Trạng thái : <a></i>{{$value1->trangthai == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}</a></p>
                @if ($value1->trangthai == 0)
                <p><a data-toggle="modal" data-target="#signup_modal2" href="" class="btn btn-outline-secondary"><i class="fa fa-moneyf"></i>Thanh Toán</a></p>
                @endif
                @endforeach
            </div>
        </div>
    </div><!-- ends: .atbd_auhor_profile_area -->
</div>
<div class="modal fade" id="signup_modal2" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signup_modal_label"><i class="la la-lock"></i> Vui lòng chọn phương thức thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <h5>Ngân hàng Vietcombank</h5>
                <br>
                    <input style="pointer-events: none; border : 0;" class="form-control" placeholder="Số tài khoản : 0271001092908" required >
                    <input style="pointer-events: none; border : 0;" class="form-control" placeholder="Chủ tài khoản : Huy Lịch Kiệt" required >
                    <br> --}}
                    <h5 class="text-center">Quét mã tại đây</h5>
                <br>
                {{-- <input style="pointer-events: none; border : 0;" class="form-control" placeholder="Số Điện Thoại : 0393900816" required > --}}
                <div  class="text-center">
                    <img src="img/nganhang.jpg" alt="" style="width:350px; height:400px">
                    <br>
                    <br>
                    @foreach ($data as $value3 )
                    <h5>Bạn vui lòng nhập nội dung : {{$value3->sodienthoai}}</h5>
                    @endforeach
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
