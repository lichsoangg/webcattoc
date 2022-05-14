@extends('admin.share.master')
@section('page-title')
<div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Thêm Mới Nhân Viên</h3>
      </div>
      <div class="col-6">
      </div>
    </div>
</div>
@endsection
@section('content')

<div class="container-fluid">
    <form method="post" action="/admin/agent">
        @csrf
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form theme-form">
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label>Họ Và Tên</label>
                    <input class="form-control" name="hovaten" type="text" data-bs-original-title="" title="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label>Địa Chỉ</label>
                    <input class="form-control" name="diachi" type="text" data-bs-original-title="" title="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="mb-3">
                    <label>Số Điện Thoại</label>
                    <input class="form-control" name="sodienthoai" type="number" data-bs-original-title="" title="" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="mb-3">
                    <label>Giới Tính</label>
                    <select class="form-select" name="gioitinh">
                        <option selected="" disabled="" value="">Chọn</option>
                      <option value="1">Nam</option>
                      <option value="0">Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="mb-3">
                    <label>Vị trí</label>
                    <select class="form-select" name="vitri">
                    <option selected="" disabled="" value="">Chọn</option>
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
                    <input id="image" name="hinhanh" class="form-control" required>
                    <a data-input="image" data-preview="holder-icon" class="lfm btn btn-light">
                        Choose
                    </a>
                </div>
                <img id="holder-icon" class="img-thumbnail">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                <script>
                    $('.lfm').filemanager('image');
                </script>
            </div>
            </div>
            <div class="row text-center">
                <div class="card-body">
                  <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Thêm Mới Nhân Viên</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
  </div>
@endsection
