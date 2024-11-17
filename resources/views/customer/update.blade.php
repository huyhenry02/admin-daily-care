@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Sửa thông tin khách hàng</h3>
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
                                <label for="name">Họ và tên</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Nhập tên của bạn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Nhập Email của bạn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_name">Tên đăng nhập</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="user_name" name="user_name"
                                           placeholder="Nhập Tên đăng nhập của bạn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Nhập Mật khẩu">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                            <i class="fa fa-eye"></i> <!-- Eye icon to show/hide -->
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Số điện thoại</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                           placeholder="Nhập Số điện thoại của bạn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="identification">Số CCCD</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="identification" name="identification"
                                           placeholder="Nhập Số CCCD của bạn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Nhập Địa chỉ của bạn">
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
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
@endsection
