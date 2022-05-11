@extends('admin.share.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Danh Sách Combo</h3>
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
                                    <th class="text-center" scope="col">Tên Combo</th>
                                    <th class="text-center" scope="col">Chức Năng</th>
                                    <th class="text-center" scope="col">Giá Tiền</th>
                                    <th class="text-center" scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($danhsachcombo as $key => $value)
                                    <tr class="table table-bordered">
                                        <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                        <td class="text-center">{{ $value->tencombo }}</td>
                                        <td class="text-center">{{ $value->chucnang }}</td>
                                        <td class="text-center">{{ number_format($value->giatien, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center text-nowrap">
                                            <button data-delete={{$value->id}} type="button" class="btn btn-danger round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#addNewCard">Xóa</button>
                                            <button type="button" data-edit="{{ $value->id }}"
                                                class="btn btn-success ChinhSuaCombo" data-bs-toggle="modal"
                                                data-bs-target="#chinhsuacombo">
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
                            <input type="hidden" id="combo_id">
                            <label class="col-form-label" for="recipient-name">Bạn có muốn xóa combo này không ?</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Không</button>
                    <button class="btn btn-warning" id="xoacombo" type="button">Có</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="chinhsuacombo">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
            <div class="modal-content" data-select2-id="83">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                    <div class="text-center mb-2">
                        <input type="hidden" id="combo_id">
                        <h1 class="mb-1">Chỉnh sửa combo</h1>
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
                                                                      <label>Tên Combo</label>
                                                                      <input class="form-control" id="tencombo" name="tencombo" type="text" data-bs-original-title="" title="" required>
                                                                    </div>
                                                                  </div>
                                                                <div class="col">
                                                                  <div class="mb-3">
                                                                    <label>Chức Năng</label>
                                                                    <input class="form-control" id="chucnang" name="chucnang" type="text" data-bs-original-title="" title="" required>
                                                                  </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                      <label>Giá Tiền</label>
                                                                      <input class="form-control" id="giatien" name="giatien" type="number" data-bs-original-title="" title="" required>
                                                                    </div>
                                                                  </div>
                                                              </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-2 pt-50">
                                                <button type="submit" id="capnhapcombo"
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
        $(".callDelete").click(function(){
                var id = $(this).data('delete');
                console.log(id);
                row = $(this);
                $("#combo_id").val(id);
                });
                $("#xoacombo").click(function(){
                    var id = $("#combo_id").val();
                    $.ajax({
                        url: '/admin/combo/xoacombo/' + id,
                        type: 'get',
                        success: function($data) {
                            toastr.success('Bạn đã xóa thành công combo !');
                            $(row).closest('tr').remove();
                            $('#addNewCard').modal('hide');
                        }
                    });
                });

                $(".ChinhSuaCombo").click(function(e) {
                var id = $(this).data('edit');
                $("#combo_id").val(id);
                e.preventDefault();

                $.ajax({
                    url: '/admin/combo/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#tencombo').val(response.data.tencombo);
                        $('#chucnang').val(response.data.chucnang);
                        $('#giatien').val(response.data.giatien);

                    }

                });
                $("#capnhapcombo").click(function(){
                        var payload1 = {
                        'tencombo'              :   $('#tencombo').val(),
                        'chucnang'               :   $('#chucnang').val(),
                        'giatien'                :    $('#giatien').val(),
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
    });
</script>
@endsection
