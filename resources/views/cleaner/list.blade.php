@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Nhân viên</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('cleaner.showCreate') }}" class="btn btn-primary btn-round">Thêm mới Nhân viên</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="10%">Mã NV</th>
                        <th scope="col">Họ và Tên</th>
                        <th scope="col" width="10%">Điểm Phạt</th>
                        <th scope="col" width="10%">Sao</th>
                        <th scope="col" width="15%">Trạng thái</th>
                        <th scope="col" width="15%">Khả năng làm việc</th>
                        <th class="text-center" scope="col" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>NV-0001</td>
                        <td>Nguyen Van A</td>
                        <td>8</td>
                        <td>4.6</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
                        <td>
                            - Dọn dẹp <br>
                            - Đi chợ
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                >
                                    Chọn hành động
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('cleaner.showDetail') }}">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>NV-0001</td>
                        <td>Nguyen Van A</td>
                        <td>8</td>
                        <td>4.6</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
                        <td>
                            - Dọn dẹp <br>
                            - Đi chợ
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                >
                                    Chọn hành động
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>NV-0001</td>
                        <td>Nguyen Van A</td>
                        <td>8</td>
                        <td>4.6</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
                        <td>
                            - Dọn dẹp <br>
                            - Đi chợ
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                >
                                    Chọn hành động
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>NV-0001</td>
                        <td>Nguyen Van A</td>
                        <td>8</td>
                        <td>4.6</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
                        <td>
                            - Dọn dẹp <br>
                            - Đi chợ
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                >
                                    Chọn hành động
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>NV-0001</td>
                        <td>Nguyen Van A</td>
                        <td>8</td>
                        <td>4.6</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
                        <td>
                            - Dọn dẹp <br>
                            - Đi chợ
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                >
                                    Chọn hành động
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
