@extends('layouts.main')
@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Thống kê Khách hàng</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0"></div>
    </div>

    <!-- Thống kê nhanh -->
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

    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Tổng doanh thu</h5>
                    <h3 class="text-center" id="totalOrders">6.000.000 VND</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Đơn hàng đã thanh toán</h5>
                    <h3 class="text-center" id="averageRatings">64</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Đơn hàng chưa thanh toán</h5>
                    <h3 class="text-center" id="canceledOrders">8</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Biểu đồ và bảng -->
    <div class="row">
        <!-- Biểu đồ tròn -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Nguồn doanh thu</h5>
                    <canvas id="revenuePieChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Bảng doanh thu -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Doanh thu chi tiết</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th id="sortCustomerId" style="cursor: pointer;">ID Khách</th>
                            <th id="sortRevenue" style="cursor: pointer;">Doanh thu <span>&#9650;</span></th>
                        </tr>
                        </thead>
                        <tbody id="revenueTable">
                        <!-- Dữ liệu sẽ được load động -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const revenueCtx = document.getElementById('revenuePieChart').getContext('2d');
        const revenuePieChart = new Chart(revenueCtx, {
            type: 'pie',
            data: {
                labels: ['Dọn dẹp', 'Đi chợ'],
                datasets: [{
                    data: [60, 20],
                    backgroundColor: ['#28a745', '#007bff']
                }]
            },
            options: {
                responsive: true
            }
        });

        const revenueData = [
            { id: 1, revenue: 50000 },
            { id: 2, revenue: 150000 },
            { id: 3, revenue: 250000 },
            { id: 4, revenue: 50000 },
            { id: 5, revenue: 100000 }
        ];

        const renderTable = (data) => {
            const tableBody = document.getElementById('revenueTable');
            tableBody.innerHTML = '';
            data.forEach(row => {
                tableBody.innerHTML += `<tr><td>${row.id}</td><td>${row.revenue.toLocaleString()} VNĐ</td></tr>`;
            });
        };

        let sortAscending = true;
        const sortTable = () => {
            revenueData.sort((a, b) => sortAscending ? a.revenue - b.revenue : b.revenue - a.revenue);
            sortAscending = !sortAscending;
            renderTable(revenueData);
        };

        document.getElementById('sortRevenue').addEventListener('click', sortTable);

        document.addEventListener('DOMContentLoaded', () => {
            renderTable(revenueData);
        });
    </script>
@endsection
