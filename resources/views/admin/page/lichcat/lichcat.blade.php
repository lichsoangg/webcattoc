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
                                    <th class="text-center" scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lichcat as $key => $value)
                                    <tr class="table table-bordered">
                                        <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                        <td class="text-center">{{ $value->tenkhachang }}</td>
                                        <td class="text-center">{{ $value->ngaycat }}</td>
                                        <td class="text-center">{{ $value->giocat }}</td>
                                        <td class="text-center">{{ $value->combo_id }}</td>
                                        <td class="text-center">{{ number_format($value->gia_id, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center">Đã thanh toán</td>
                                        <td class="text-center text-nowrap">
                                            <button data-delete={{$value->id}} type="button" class="btn btn-success round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#addNewCard">Nhận Lịch</button>
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
    {{-- <div class="modal fade" id="addNewCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </div> --}}
@endsection
