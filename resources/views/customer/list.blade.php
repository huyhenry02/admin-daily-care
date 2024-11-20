@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Khách hàng</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10%">Mã KH</th>
                        <th scope="col">Họ và Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col" width="15%">Số đơn hàng</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $customers as $key => $customer )
                        <tr>
                            <td>KH-000{{ $key+1 }}</td>
                            <td>{{ $customer->name ?? '' }}</td>
                            <td>{{ $customer->email ?? '' }}</td>
                            <td>{{ $customer->address ?? '' }}</td>
                            <td>{{ $customer->orders()->count() ?? 0 }}</td>
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
                                            <a class="dropdown-item" href="{{ route('customer.showDetail', $customer->id) }}">Xem chi
                                                tiết</a>
                                            <a class="dropdown-item" href="{{ route('customer.showUpdate') }}">Sửa thông tin</a>
                                            <a class="dropdown-item" href="#">Xóa tài khoản</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
