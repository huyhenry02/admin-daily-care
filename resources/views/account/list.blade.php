@php
use App\Models\User;
 @endphp
@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách tài khoản</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-primary btn-round">Thêm mới tài khoản</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" width="10%">STT</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Quyền</th>
                            <th class="text-center" scope="col" width="10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $accounts as $key => $account )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $account->name ?? '' }}</td>
                                <td>{{ $account->email ?? '' }}</td>
                                <td>
                                    @switch( $account->role_type)
                                        @case( User::ROLE_ADMIN )
                                        Admin
                                        @break
                                        @case( User::ROLE_CUSTOMER )
                                        Khách hàng
                                        @break
                                        @case( User::ROLE_CLEANER )
                                        Nhân viên
                                        @break
                                    @endswitch
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
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
