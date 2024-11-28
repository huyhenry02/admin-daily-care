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
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name ?? '' }}</td>
                            <td>{{ $customer->email ?? '' }}</td>
                            <td>{{ $customer->address ?? '' }}</td>
                            <td>{{ $customer->orders()->count() ?? 0 }}</td>
                            <td class="text-center">
                                <a href="{{ route('customer.showDetail', $customer->id) }}"
                                   class="btn btn-sm btn-primary"
                                   title="Xem">
                                    <i class="fa fa-eye"></i>
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
