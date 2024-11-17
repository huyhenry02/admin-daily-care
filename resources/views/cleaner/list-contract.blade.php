@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Hợp đồng</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="" class="btn btn-primary btn-round">Thêm mới Hợp đồng</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Mã HĐ</th>
                        <th scope="col">Tên hợp đồng</th>
                        <th scope="col">Tên Nhân viên</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>HĐ-0001</td>
                        <td>Hợp đồng lao động</td>
                        <td>Nguyen Van A</td>
                        <td>12-03-2023</td>
                        <td>12-03-2026</td>
                        <td><span class="badge badge-success">Đang hoạt động</span></td>
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
