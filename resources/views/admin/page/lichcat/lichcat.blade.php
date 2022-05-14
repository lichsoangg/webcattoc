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
                                    <th class="text-center" scope="col">Email Khách Hàng</th>
                                    <th class="text-center" scope="col">Ngày Cắt</th>
                                    <th class="text-center" scope="col">Giờ Cắt</th>
                                    <th class="text-center" scope="col">Combo</th>
                                    <th class="text-center" scope="col">Giá Tiền</th>
                                    <th class="text-center" scope="col">Trạng Thái</th>
                                    <th class="text-center" scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lichcat as $key => $value)
                                    <tr class="table table-bordered">
                                        <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                        <td class="text-center">{{ $value->tenkhachang }}</td>
                                        <td class="text-center">{{ $value->emailkhachhang }}</td>
                                        <td class="text-center">{{ $value->ngaycat }}</td>
                                        <td class="text-center">{{ $value->giocat }}</td>
                                        <td class="text-center">{{ $value->combo_id }}</td>
                                        <td class="text-center">{{ number_format($value->gia_id, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center">{{ $value->trangthai == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</td>
                                        {{-- <td class="text-center">
                                            <span class="btn view {{$value->trangthai == 0 ? 'btn btn-outline-success btn-sm' : 'btn btn-outline-danger btn-sm'}}" data-id="{{$value->id}}">{{ $value->trangthai == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }} </span>
                                        </td> --}}
                                        <td class="text-center text-nowrap">
                                            <button data-id={{$value->id}} type="button" class="btn btn-success round waves-effect nhanlich" type="button" data-bs-toggle="modal" data-bs-target="#nhanlichmodel">Nhận Lịch</button>
                                            <button type="button" data-edit="{{ $value->id }}"
                                                class="btn btn-danger ChinhSuaCombo" data-bs-toggle="modal"
                                                data-bs-target="#chinhsuacombo">
                                                Hủy Lịch
                                            </button>
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
                    <h5 class="modal-title" id="exampleModalLabel2">Gửi thông báo khách hàng</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="hidden" id="lich_id">
                            <h6>Tên khách hàng</h6>
                            <input type="text" id="tenkhachang" class="form-control" readonly>
                            <h6>Email khách hàng</h6>
                            <input type="text" id="emailkhachhang" class="form-control" readonly>
                            <h6>Sô điện thoại khách hàng</h6>
                            <input type="text" id="phonekhachhang" class="form-control" readonly>
                            <h6>Ngày cắt</h6>
                            <input type="text" id="ngaycat" class="form-control" readonly>
                            <h6>Giờ cắt</h6>
                            <input type="text" id="giocat" class="form-control" readonly>
                            <h6>Tên Combo</h6>
                            <input type="text" id="combo_id" class="form-control" readonly>
                            <h6>Giá Tiền</h6>
                            <input type="text" id="gia_id" class="form-control" readonly>
                            <h6>Trạng thái</h6>
                            <select class="form-select" id="trangthai">
                                <option value="0">Chưa thanh toán</option>
                                <option value="1">Đã thanh toán</option>
                            </select>
                            <h6>Nhân Viên Cắt</h6>
                            @foreach ($nhanvien as $key => $value)
                            <select class="form-select" id="tennhanvien">
                                <option selected="" disabled="" value="">Vui lòng chọn nhân viên</option>
                                  <option value="{{$value->id}}">{{$value->hovaten}}</option>
                                </select>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Không</button>
                    <button class="btn btn-success" id="xacnhan" type="button">Xác nhận</button>
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
        $(document).ready(function() {
            $(".nhanlich").click(function(e) {

                var id = $(this).data('id');
                $("#lich_id").val(id);
                e.preventDefault();

                $.ajax({
                    url: '/admin/lichcat/nhanlich/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#tenkhachang').val(response.data.tenkhachang);
                        $('#emailkhachhang').val(response.data.emailkhachhang);
                        $('#ngaycat').val(response.data.ngaycat);
                        $('#giocat').val(response.data.giocat);
                        $('#combo_id').val(response.data.combo_id);
                        $('#gia_id').val(response.data.gia_id);
                        $('#trangthai').val(response.data.trangthai);
                        $('#phonekhachhang').val(response.data.phonekhachhang);

                    }

                });


            $("#xacnhan").click(function(){
                        var payload1 = {
                        'tenkhachang'              :   $('#tenkhachang').val(),
                        'emailkhachhang'               :   $('#emailkhachhang').val(),
                        'ngaycat'                :    $('#ngaycat').val(),
                        'giocat'             :   $('#giocat').val(),
                        'combo_id'             :   $('#combo_id').val(),
                        'gia_id'                   :    $('#gia_id').val(),
                        'trangthai'                   :    $('#trangthai').val(),
                        'tennhanvien'                   :    $('#tennhanvien').val(),
                        'phonekhachhang'                   :    $('#phonekhachhang').val(),
                    };
                        $.ajax({
                            url : '/admin/lichcat/xacnhan/' + id,
                            type: 'post',
                            data: payload1,
                            success: function($xxx){
                                if($xxx.status == true){
                                    toastr.success("Bạn đã gửi thông tin thành công !");
                                }
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
                $(".callDelete").click(function(){
                var id = $(this).data('delete');
                console.log(id);
                row = $(this);
                $("#nhavien_id").val(id);
                });
                $("#xoanhanvien").click(function(){
                    var id = $("#nhavien_id").val();
                    $.ajax({
                        url: '/admin/agent/xoanhanvien/' + id,
                        type: 'get',
                        success: function($data) {
                            toastr.success('Bạn đã xóa thành công nhân viên !');
                            $(row).closest('tr').remove();
                            $('#addNewCard').modal('hide');
                        }
                    });
                });

        });
    </script>
@endsection
