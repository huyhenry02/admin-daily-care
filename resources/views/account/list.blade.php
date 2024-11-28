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
                                    <a href="#"
                                       class="btn btn-sm btn-danger"
                                       title="Xóa">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
