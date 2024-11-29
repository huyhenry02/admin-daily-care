@extends('layouts.main')
@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Thống kê Đơn hàng</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
        </div>
    </div>

    <!-- Bộ lọc thời gian -->
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="startDate">Từ ngày:</label>
            <input type="date" id="startDate" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="endDate">Đến ngày:</label>
            <input type="date" id="endDate" class="form-control">
        </div>
        <div class="col-md-3 align-self-end">
            <button id="filterBtn" class="btn btn-primary w-100">Lọc</button>
        </div>
    </div>

    <!-- Tổng quan -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Tổng đơn hàng</h5>
                    <h3 class="text-center" id="totalOrders">{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Lượt đánh giá trung bình</h5>
                    <h3 class="text-center" id="averageRatings">0</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Đơn hàng bị hủy</h5>
                    <h3 class="text-center" id="canceledOrders">{{ $canceledOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ -->
    <div class="row mt-4">
        <!-- Biểu đồ tròn -->
        <div class="col-md-3">
            <div class="chart-section container">
                <h4 class="text-center">Trạng thái Đơn hàng</h4>
                <canvas id="statusPieChart"></canvas>
            </div>
        </div>

        <!-- Biểu đồ cột -->
        <div class="col-md-9">
            <div class="chart-section container">
                <canvas id="ordersChart" style="height: 400px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById('filterBtn').addEventListener('click', function() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            window.location.href = `/admin/report/order?startDate=${startDate}&endDate=${endDate}`;
        });
        const statusCtx = document.getElementById('statusPieChart').getContext('2d');
        const statusPieChart = new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: @json($orderStatusCounts->pluck('status')),
                datasets: [{
                    data: @json($orderStatusCounts->pluck('count')),
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#3556dc']
                }]
            }
        });

        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ordersCtx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Số lượng đơn hàng',
                    data: @json($monthlyData),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
