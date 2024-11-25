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
                    <h3 class="text-center" id="totalOrders">0</h3>
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
                    <h3 class="text-center" id="canceledOrders">0</h3>
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
            <div class="form-inline mb-3">
                <label for="timeFilter" class="mr-2">Chọn loại thời gian:</label>
                <select id="timeFilter" class="form-control">
                    <option value="month">Theo tháng</option>
                    <option value="quarter">Theo quý</option>
                    <option value="year">Theo năm</option>
                </select>
            </div>

            <div class="chart-section container">
                <canvas id="ordersChart" style="height: 400px;"></canvas>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dummy data
        const updateStats = () => {
            document.getElementById('totalOrders').innerText = 120;
            document.getElementById('averageRatings').innerText = 4.5;
            document.getElementById('canceledOrders').innerText = 5;
        };

        const statusCtx = document.getElementById('statusPieChart').getContext('2d');
        const statusPieChart = new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: ['Hoàn tất', 'Đang xử lý', 'Đã hủy'],
                datasets: [{
                    data: [80, 30, 5],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                }]
            }
        });

        const ordersCtx = document.getElementById('ordersChart').getContext('2d');

        // Tạo dữ liệu mẫu cho các loại thời gian
        const chartData = {
            month: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                data: [10, 20, 15, 25, 30, 40, 50, 45, 35, 30, 25, 20]
            },
            quarter: {
                labels: ['Quý 1', 'Quý 2', 'Quý 3', 'Quý 4'],
                data: [45, 90, 75, 50]
            },
            year: {
                labels: ['2021', '2022', '2023'],
                data: [120, 200, 150]
            }
        };

        let ordersChart = new Chart(ordersCtx, {
            type: 'bar',
            data: {
                labels: chartData.month.labels,
                datasets: [{
                    label: 'Số lượng đơn hàng',
                    data: chartData.month.data,
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

        document.getElementById('timeFilter').addEventListener('change', (e) => {
            const filter = e.target.value;
            ordersChart.data.labels = chartData[filter].labels;
            ordersChart.data.datasets[0].data = chartData[filter].data;
            ordersChart.update();
        });

    </script>
@endsection
