@php use App\Models\Order; @endphp
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
                    @foreach( $orders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>DH-000{{ $key+1 }}</td>
                            <td>{{ $order->customer?->name ?? '' }}</td>
                            <td>
                                @switch( $order->service_type)
                                    @case( Order::SERVICE_TYPE_MARKET )
                                        Đi chợ hộ
                                        @break
                                    @case( Order::SERVICE_TYPE_CLEAN )
                                        Dọn dẹp
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @switch( $order->status)
                                    @case( Order::STATUS_PENDING )
                                        Chờ xác nhận
                                        @break
                                    @case( Order::STATUS_GOING )
                                        Đang di chuyển
                                        @break
                                    @case( Order::STATUS_PROCESSING )
                                        Đang thực hiện
                                        @break
                                    @case( Order::STATUS_COMPLETED )
                                        Đã hoàn thành
                                        @break
                                    @case( Order::STATUS_COMPLAINING )
                                        Khiếu nại
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @switch( $order->pay_status)
                                    @case( Order::PAY_STATUS_PENDING )
                                        Chờ thanh toán
                                        @break
                                    @case( Order::PAY_STATUS_DEPOSITED )
                                        Đã đặt cọc
                                        @break
                                    @case( Order::PAY_STATUS_PAID )
                                        Đã thanh toán
                                        @break
                                    @case( Order::PAY_STATUS_RETURN_AMOUNT )
                                        Đã hoàn tiền
                                        @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                {{ $order->created_at ? $order->created_at->format('H:m d-m-Y') : '' }}
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
                                            <a class="dropdown-item" href="#">Xem chi tiết</a>
                                            <a class="dropdown-item" href="#">Sửa thông tin</a>
                                            <a class="dropdown-item" href="#">Xóa đơn hàng</a>
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
