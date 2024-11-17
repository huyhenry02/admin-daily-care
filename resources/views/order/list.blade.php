@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Đơn hàng</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('order.showCreate') }}" class="btn btn-primary btn-round">Thêm mới Đơn hàng</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã ĐH</th>
                        <th scope="col">Tên Khách đặt</th>
                        <th scope="col">Loại dịch vụ</th>
                        <th scope="col">Trạng thái đơn hàng</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th class="text-center" scope="col" width="15%">Ngày tạo</th>
                        <th scope="col" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Xem thông tin</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Xem thông tin</a>
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>DH-0001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Dọn dẹp</td>
                        <td>Đang thực hiện</td>
                        <td>Chờ thanh toán</td>
                        <td class="text-center">
                            12-06-2024
                        </td>
                        <td>
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
                                        <a class="dropdown-item" href="#">Sửa thông tin</a>
                                        <a class="dropdown-item" href="#">Xóa đơn hàng</a>
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
