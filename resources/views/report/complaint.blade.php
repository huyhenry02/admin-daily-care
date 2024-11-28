@extends('layouts.main')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Báo cáo khiếu nại</h3>
        </div>
    </div>

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
                    <h5 class="text-center">Tổng số khiếu nại</h5>
                    <h3 class="text-center" id="totalComplaints">{{ $totalComplaints }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Chờ xử lý</h5>
                    <h3 class="text-center" id="pendingComplaints">{{ $pendingComplaints }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="text-center">Đã xử lý</h5>
                    <h3 class="text-center" id="resolvedComplaints">{{ $resolvedComplaints }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Người khiếu nại</h5>
                    <canvas id="complaintPieChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Nhân viên bị khiếu nại</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Mã nhân viên</th>
                            <th id="sortEmployeeComplaints" style="cursor: pointer;">Số lần</th>
                        </tr>
                        </thead>
                        <tbody id="employeeComplaintTable">
                        @foreach ($employeeComplaints as $complaint)
                            <tr>
                                <td>{{ $complaint->complaint_by_id }}</td>
                                <td>{{ $complaint->count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Khách hàng bị khiếu nại</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Mã khách hàng</th>
                            <th id="sortCustomerComplaints" style="cursor: pointer;">Số lần</th>
                        </tr>
                        </thead>
                        <tbody id="customerComplaintTable">
                        @foreach ($customerComplaints as $complaint)
                            <tr>
                                <td>{{ $complaint->complaint_by_id }}</td>
                                <td>{{ $complaint->count }}</td>
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
        document.getElementById('filterBtn').addEventListener('click', function() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            window.location.href = `/admin/report/complaint?startDate=${startDate}&endDate=${endDate}`;
        });
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('complaintPieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Khách hàng', 'Nhân viên'],
                    datasets: [{
                        data: [{{ $complaintByCustomer }}, {{ $complaintByEmployee }}],
                        backgroundColor: ['#28a745', '#007bff'],
                    }]
                },
                options: { responsive: true }
            });
        });
    </script>
@endsection
