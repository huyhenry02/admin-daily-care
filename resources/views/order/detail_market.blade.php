<div
    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
>
    <div>
        <h3 class="fw-bold mb-3">Thông tin đơn hàng</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header">
                <h5 class="card-title">Mã Đơn Hàng: ĐH-000{{ $order->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="fw-bold text-secondary mb-3">Thông tin chung</h6>
                        <table class="table table-bordered" style="height: 93%">
                            <tbody>
                            <tr>
                                <th style="width: 30%;">Khách hàng</th>
                                <td>{{ $order->customer->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Người dọn dẹp</th>
                                <td>{{ $order->cleaner->user->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Loại dịch vụ</th>
                                <td>{{ $order->service_type === 'market' ? 'Đi chợ' : 'Dọn dẹp' }}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái đơn hàng</th>
                                <td>{{ ucfirst($order->status) }}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái thanh toán</th>
                                <td>{{ ucfirst($order->pay_status) }}</td>
                            </tr>
                            <tr>
                                <th>Ngày phản hồi</th>
                                <td>{{ $order->feedback_date ?? 'Chưa có' }}</td>
                            </tr>
                            <tr>
                                <th>Đánh giá</th>
                                <td>{{ $order->rating ? $order->rating . ' / 5' : 'Chưa đánh giá' }}</td>
                            </tr>
                            <tr>
                                <th>Ghi chú</th>
                                <td>{{ $order->feedback ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <th>Thời gian tạo</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bold text-secondary mb-3">Thông tin chi tiết Đơn Hàng</h6>
                        <table class="table table-bordered" style="height: 30%">
                            <tbody>
                            <tr>
                                <th style="width: 30%;">Tên khách hàng</th>
                                <td>{{ $order->name_customer }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $order->phone_customer }}</td>
                            </tr>
                            <tr>
                                <th>Loại nhà</th>
                                <td>
                                    @if($order->home_type === 'apartment')
                                        Căn hộ
                                    @elseif($order->home_type === 'villa')
                                        Biệt thự
                                    @else
                                        Nhà phố
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{ $order->address }}</td>
                            </tr>

                            </tbody>
                        </table>
                        <table class="table table-bordered" style="height: 40%">
                            <tbody>
                            <tr>
                                <th>Tiền cọc</th>
                                <td>{{ number_format($marketOrder->deposit_price) }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Giá dịch vụ</th>
                                <td>{{ number_format($marketOrder->service_price) }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Giá dự kiến</th>
                                <td>{{ number_format($marketOrder->expect_price) }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Giá đã mua</th>
                                <td>{{ number_format($marketOrder->bought_price) }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Trạng thái đơn hàng</th>
                                <td>{{ ucfirst($marketOrder->status) }}</td>
                            </tr>
                            <tr>
                                <th>Thời gian giao hàng</th>
                                <td>{{ $marketOrder->delivery_time }}</td>
                            </tr>
                            <tr>
                                <th>Ghi chú</th>
                                <td>{{ $marketOrder->note ?? 'Không có' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <h6 class="fw-semibold">Các sản phẩm phải mua</h6>
                    </div>
                </div>
                <div class="mb-4">

                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col" width="10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $marketOrder->marketOrderDetails as $key => $product )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name_product ?? '' }}</td>
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
                                                <a class="dropdown-item" href="#">Xóa sản phẩm</a>
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
    </div>
</div>
