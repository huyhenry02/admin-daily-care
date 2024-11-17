@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Dịch vụ theo giờ</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('service.showCreate') }}" class="btn btn-primary btn-round">Thêm mới Dịch vụ</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên dịch vụ</th>
                        <th scope="col">Số giờ thự hiện</th>
                        <th scope="col">Giá</th>
                        <th scope="col" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dịch vụ 4h - 100m2</td>
                        <td>4h</td>
                        <td>200.000 VNĐ</td>
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
                                        <a class="dropdown-item" href="">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dịch vụ 4h - 100m2</td>
                        <td>4h</td>
                        <td>200.000 VNĐ</td>
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
                                        <a class="dropdown-item" href="">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dịch vụ 4h - 100m2</td>
                        <td>4h</td>
                        <td>200.000 VNĐ</td>
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
                                        <a class="dropdown-item" href="">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dịch vụ 4h - 100m2</td>
                        <td>4h</td>
                        <td>200.000 VNĐ</td>
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
                                        <a class="dropdown-item" href="">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dịch vụ 4h - 100m2</td>
                        <td>4h</td>
                        <td>200.000 VNĐ</td>
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
                                        <a class="dropdown-item" href="">Xem chi tiết</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa hợp đồng</a>
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
