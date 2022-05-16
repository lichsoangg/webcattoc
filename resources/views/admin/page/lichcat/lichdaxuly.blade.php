@extends('admin.share.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Danh Sách Lịch Đã Đặt</h3>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Stt</th>
                                    <th class="text-center" scope="col">Tên Khách Hàng</th>
                                    <th class="text-center" scope="col">Ngày Cắt</th>
                                    <th class="text-center" scope="col">Giờ Cắt</th>
                                    <th class="text-center" scope="col">Combo</th>
                                    <th class="text-center" scope="col">Giá Tiền</th>
                                    <th class="text-center" scope="col">Trạng Thái</th>
                                    <th class="text-center" scope="col">Nhân Viên</th>
                                    <th class="text-center" scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr class="table table-bordered">
                                        <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                        <td class="text-center">{{ $value->tenkhachang }}</td>
                                        <td class="text-center">{{ $value->ngaycat }}</td>
                                        <td class="text-center">{{ $value->giocat }}</td>
                                        <td class="text-center">{{ $value->combo_id }}</td>
                                        <td class="text-center">{{ number_format($value->gia_id, 0, ',', '.') }} VNĐ</td>
                                        {{-- <td class="text-center">{{ $value->trangthai == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</td> --}}
                                        <td class="text-center">
                                            <span class="btn view {{$value->trangthai == 0 ? 'btn btn-outline-danger btn-sm' : 'btn btn-outline-success btn-sm'}}" data-id="{{$value->id}}">{{ $value->trangthai == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }} </span>
                                        </td>
                                        <td class="text-center">{{ $value->tennhanvien}}</td>
                                        <td class="text-center text-nowrap">
                                            <button data-id={{$value->id}} type="button" class="btn btn-success round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#nhanlichmodel">Hoàn Thành</button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nhanlichmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Thông báo</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="hidden" id="xacnhan_id">
                            <label class="col-form-label" for="recipient-name">Bạn đã hoàn thành lịch cắt ?</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Chưa hoàn thành</button>
                    <button class="btn btn-success" id="xacnhanhangthanh" type="button">Xác nhận đã hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
        $(document).ready(function(){
            $(".view").click(function(){
                var text = $(this);
                var id = $(this).data('id');
                var donggoi = {
                    'id'    : id,
                };
                $.ajax({
                    url: '/admin/thanhtoan',
                    type: 'post',
                    data: donggoi,
                    success: function($upload){
                        if($upload.caulenh == false){
                        toastr.error("Vui lòng can thiệp hệ thống");
                        } else {
                            toastr.success("Đã Thay Đổi Trạng Thái Thành Công");
                            if($upload.auto == 1){
                                text.removeClass("btn btn-outline-danger btn-xs")
                                text.addClass("btn btn-outline-success btn-xs")
                                text.html('Đã thanh toán');
                            } else{
                                text.removeClass("btn btn-outline-success btn-xs")
                                text.addClass("btn btn-outline-danger btn-xs")
                                text.html('Chưa thanh toán')
                            }
                        }

                    },

            });
            });
            $(".callDelete").click(function(){
                var id = $(this).data('id');
                console.log(id);
                row = $(this);
                $("#xacnhan_id").val(id);
                });
                $("#xacnhanhangthanh").click(function(){
                    var id = $("#xacnhan_id").val();
                    $.ajax({
                        url: '/admin/xacnhanhangthanh/' + id,
                        type: 'get',
                        success: function($data) {
                            toastr.success('Chúc mừng bạn đã hoàn thành !');
                            $(row).closest('tr').remove();
                            location.reload();
                        }
                    });
                });
        });
</script>
@endsection
