@extends('layouts.main')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Thống kê Lợi nhuận</h3>
        </div>
    </div>

    <!-- Thống kê nhanh -->
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="startDate">Từ ngày:</label>
            <input type="date" id="startDate" class="form-control" value="{{ request()->input('startDate') }}">
        </div>
        <div class="col-md-3">
            <label for="endDate">Đến ngày:</label>
            <input type="date" id="endDate" class="form-control" value="{{ request()->input('endDate') }}">
        </div>
        <div class="col-md-3 align-self-end">
            <button id="filterBtn" class="btn btn-primary w-100">Lọc</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Tổng doanh thu</h5>
                    <h3 class="text-center" id="totalOrders">{{ number_format($totalRevenue) }} VND</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Đơn hàng đã thanh toán</h5>
                    <h3 class="text-center" id="averageRatings">5</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Đơn hàng chưa thanh toán</h5>
                    <h3 class="text-center" id="canceledOrders">5</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ và bảng -->
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Nguồn doanh thu</h5>
                    <canvas id="revenuePieChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Doanh thu chi tiết</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID Khách</th>
                            <th>Doanh thu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $revenueDetails as $row )
                            <tr>
                                <td>{{ $row->customer_id }}</td>
                                <td>{{ number_format($row->totalRevenue) }} VNĐ</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById('filterBtn').addEventListener('click', function () {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            window.location.href = `/admin/report/revenue?startDate=${startDate}&endDate=${endDate}`;
        });

        const revenueCtx = document.getElementById('revenuePieChart').getContext('2d');
        const revenuePieChart = new Chart(revenueCtx, {
            type: 'pie',
            data: {
                labels: @json( $revenueByService->pluck('service_type'), JSON_THROW_ON_ERROR),
                datasets: [{
                    data: @json( $revenueByService->pluck('totalRevenue'), JSON_THROW_ON_ERROR),
                    backgroundColor: ['#28a745', '#007bff']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
