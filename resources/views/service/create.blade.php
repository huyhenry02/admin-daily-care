@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Thêm mới dịch vụ dọn dẹp</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thông tin cần lưu</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Tên dịch vụ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Nhập Tên dịch vụ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hour">Số giờ thực hiện</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="email" name="hour"
                                           placeholder="Nhập Số giờ thực hiện">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá dịch vụ</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="price"
                                           placeholder="Nhập Giá dịch vụ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button class="btn btn-success">Lưu</button>
                <button class="btn btn-danger">Hủy</button>
            </div>
        </div>
    </div>
@endsection
