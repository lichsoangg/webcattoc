@extends('admin.share.master')
@section('page-title')
<div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Tạo Combo</h3>
      </div>
      <div class="col-6">
      </div>
    </div>
</div>
@endsection
@section('content')

<div class="container-fluid">
    <form method="post" action="{{ route('combo.Create') }}">
        @csrf
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form theme-form">

              <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label>Tên Combo</label>
                      <input class="form-control" name="tencombo" type="text" data-bs-original-title="" title="" required>
                    </div>
                  </div>
                <div class="col">
                  <div class="mb-3">
                    <label>Chức Năng</label>
                    <input class="form-control" name="chucnang" type="text" data-bs-original-title="" title="" required>
                  </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label>Giá Tiền</label>
                      <input class="form-control" name="giatien" type="number" data-bs-original-title="" title="" required>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row text-center">
                <div class="card-body">
                  <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Thêm Mới Combo</button>
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
