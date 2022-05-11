@extends('admin.share.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Danh Sách Nhân Viên</h3>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <table  id="datatable" class="table table-bordered">
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
                                    <th class="text-center" scope="col">Tên Nhân Viên</th>
                                    <th class="text-center" scope="col">Địa Chỉ</th>
                                    <th class="text-center" scope="col">Số Điện Thoại</th>
                                    <th class="text-center" scope="col">Giới Tính</th>
                                    <th class="text-center" scope="col">Vị trí</th>
                                    <th class="text-center" scope="col">Hình Đại Diện</th>
                                    <th class="text-center" scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $vitri = ['Nhân Viên Cắt Tóc', 'Nhân Viên Gội Đầu', 'Nhân Viên Thu Ngân', 'Bảo Vệ'];
                                @endphp
                                @foreach ($danhsachnhanvien as $key => $value)
                                    <tr class="table table-bordered">
                                        <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                        <td class="text-center">{{ $value->hovaten }}</td>
                                        <td class="text-center">{{ $value->diachi }}</td>
                                        <td class="text-center">0{{ $value->sodienthoai }}</td>
                                        <td class="text-center">{{ $value->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                        <td class="text-center" value="{{ $value->vitri }}">
                                            {{ $vitri[$value->vitri] }}</td>
                                            <td class="oke  "><img style="width:100px; height:100px" src="{{$value->hinhanh}}"></td>
                                        <td class="text-center text-nowrap">
                                            <button data-delete={{$value->id}} type="button" class="btn btn-danger round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#addNewCard">Xóa</button>
                                            <button type="button" data-edit="{{ $value->id }}"
                                                class="btn btn-success ChinhSuaNhanVien" data-bs-toggle="modal"
                                                data-bs-target="#chinhsuasinhvien">
                                                Chỉnh sữa
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
        </table>
    </div>
    <div class="modal fade" id="addNewCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <input type="hidden" id="nhavien_id">
                            <label class="col-form-label" for="recipient-name">Bạn có muốn xóa nhân viên này không ?</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Không</button>
                    <button class="btn btn-warning" id="xoanhanvien" type="button">Có</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="chinhsuasinhvien">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
            <div class="modal-content" data-select2-id="83">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                    <div class="text-center mb-2">
                        <input type="hidden" id="nhanvien_id">
                        <h1 class="mb-1">Chỉnh sửa nhân viên</h1>
                    </div>
                    <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form theme-form">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label>Họ Và Tên</label>
                                                                        <input class="form-control" name="hovaten"
                                                                            id="hovaten" type="text"
                                                                            data-bs-original-title="" title="" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label>Địa Chỉ</label>
                                                                        <input class="form-control" name="diachi"
                                                                            id="diachi" type="text"
                                                                            data-bs-original-title="" title="" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="mb-3">
                                                                        <label>Số Điện Thoại</label>
                                                                        <input class="form-control" name="sodienthoai"
                                                                            id="sodienthoai" type="number"
                                                                            data-bs-original-title="" title="" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="mb-3">
                                                                        <label>Giới Tính</label>
                                                                        <select class="form-select" name="gioitinh"
                                                                            id="gioitinh">
                                                                            <option selected="" disabled="" value="">Chọn
                                                                            </option>
                                                                            <option value="1">Nam</option>
                                                                            <option value="0">Nữ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="mb-3">
                                                                        <label>Vị trí</label>
                                                                        <select class="form-select" name="vitri"
                                                                            id="vitri">
                                                                            <option selected="" disabled="" value="">Chọn
                                                                            </option>
                                                                            <option value="0">Nhân viên cắt tóc</option>
                                                                            <option value="1">Nhân viên gội đầu</option>
                                                                            <option value="2">Nhân viên thu ngân</option>
                                                                            <option value="3">Bảo Vệ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Hình Ảnh Nhân Viên</label>
                                                                <div class="input-group">
                                                                  <input name="hinhanh" id="hinhanh" class="form-control" required>
                                                                  <a id="lfm" data-input="hinhanh" data-preview="holderhinhanh" class="lfm btn btn-light">
                                                                  Choose
                                                                  </a>
                                                                  <img id="hinhanh1" style="width:200px; height:200px" id="holderhinhanh" class="card-img-top">
                                                              </div>

                                                              </div>

                                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                                                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                                                <script>
                                                                    $('.lfm').filemanager('image');
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-2 pt-50">
                                                <button type="submit" id="capnhapnhanvien"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Cập
                                                    Nhập</button>
                                                <button type="reset" class="btn btn-outline-secondary waves-effect"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    Cancel
                                                </button>

                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
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
            $(".ChinhSuaNhanVien").click(function(e) {

                var id = $(this).data('edit');
                $("#nhanvien_id").val(id);
                e.preventDefault();

                $.ajax({
                    url: '/admin/agent/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#hovaten').val(response.data.hovaten);
                        $('#diachi').val(response.data.diachi);
                        $('#sodienthoai').val(response.data.sodienthoai);
                        $('#gioitinh').val(response.data.gioitinh);
                        $('#vitri').val(response.data.vitri);
                        $('#hinhanh').val(response.data.hinhanh);
                        $('#hinhanh1').attr('src',response.data.hinhanh);


                    }

                });


            $("#capnhapnhanvien").click(function(){
                        var payload1 = {
                        'hovaten'              :   $('#hovaten').val(),
                        'diachi'               :   $('#diachi').val(),
                        'sodienthoai'                :    $('#sodienthoai').val(),
                        'gioitinh'             :   $('#gioitinh').val(),
                        'vitri'             :   $('#vitri').val(),
                        'hinhanh'                   :    $('#hinhanh').val(),
                    };
                        $.ajax({
                            url : '/admin/combo/capnhap/' + id,
                            type: 'post',
                            data: payload1,
                            success: function($xxx){
                                if($xxx.status == true){
                                    toastr.success("Bạn đã cập nhập thành công !");
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
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".ChinhSuaNhanVien").click(function(){
            var hinhanh = $('#hinhanh').attr('src')
        });
        });

    </script>
@endsection
