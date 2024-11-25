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
                <h5 class="card-title">Mã Đơn Hàng: {{ $order->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="fw-bold text-secondary mb-3">Thông tin chung</h6>
                        <table class="table table-bordered">
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
                        <h6 class="fw-bold text-secondary mb-3">Thông tin chi tiết</h6>
                        <table class="table table-bordered">
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
                            <tr>
                                <th>Tổng giá</th>
                                <td>{{ number_format($cleaningOrder->total_price) }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Tiền cọc</th>
                                <td>{{ number_format($cleaningOrder->deposit) }} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Thời gian bắt đầu</th>
                                <td>{{ $cleaningOrder->start_time }}</td>
                            </tr>
                            <tr>
                                <th>Có dụng cụ</th>
                                <td>{{ $cleaningOrder->has_tool ? 'Có' : 'Không' }}</td>
                            </tr>
                            <tr>
                                <th>Ghi chú</th>
                                <td>{{ $cleaningOrder->note ?? 'Không có' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
