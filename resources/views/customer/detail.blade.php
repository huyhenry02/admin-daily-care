@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Thông tin nhân viên</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mã KH: KH-0001</div>
                </div>
                <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-4">
                                <table class="table w-100">
                                    <tbody>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Họ và tên: </span>
                                        </th>
                                        <td>
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">Nguyễn Văn A</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Email: </span>
                                        </th>
                                        <td>
                                            <span style="font-size: 1rem; color: #666; margin-left: 10px">nguyen_a@gmail.com</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Số điện thoại: </span>
                                        </th>
                                        <td colspan="2">
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">+846464646</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Số CCCD:  </span>
                                        </th>
                                        <td colspan="2">
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">022344343427</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <table class="table w-100">
                                    <tbody>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Trạng thái: </span>
                                        </th>
                                        <td>
                                            <span class="badge badge-success">Đang hoạt động</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Tên đăng nhập: </span>
                                        </th>
                                        <td>
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">nguyen_a</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Địa chỉ: </span>
                                        </th>
                                        <td colspan="2">
                                            <span style="font-size: 1rem; color: #666; margin-left: 10px">Hà nội</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row mb-3 mt-5">
                            <div class="col-6">
                                <h6 class="fw-semibold">Các đơn hàng của khách hàng: 7 đơn hàng</h6>
                            </div>
                        </div>
                        <div class="mb-4">

                            <table class="table table-bordered">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã ĐH</th>
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
                                                    <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>DH-0001</td>
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
                                                    <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>DH-0001</td>
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
                                                    <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>DH-0001</td>
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
                                                    <a class="dropdown-item" href="#">Xóa hợp đồng</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>DH-0001</td>
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
        </div>
    </div>
    <style>
        .approval-history-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .approval-history-list .list-group-item {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 15px;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .approval-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .approval-info .admin-name {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        .approval-info .badge {
            font-size: 13px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .badge-success {
            background-color: #28a745 !important;
            width: 100px;
        }

        .badge-danger {
            background-color: #dc3545 !important;
            width: 100px;
        }

        .badge-warning {
            background-color: #ffc107 !important;
            width: 100px;
        }

        .badge-primary {
            background-color: #007bff !important;
            width: 100px;
        }

        .approval-info .creator-name {
            font-style: italic;
            font-size: 14px;
            color: #555;
        }

        .approval-info .date-time {
            font-size: 13px;
            color: #777;
            margin-left: auto;
        }
    </style>
@endsection
