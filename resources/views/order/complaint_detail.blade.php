@php use App\Models\Complaint; @endphp
@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Thông tin khiếu nại</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0 d-flex">
            @if( $complaint->status === Complaint::STATUS_PENDING )
                <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal"
                        data-bs-target="#confirmModal">
                    Xác nhận
                </button>
                <button type="button" class="btn btn-danger btn-round ms-2" data-bs-toggle="modal"
                        data-bs-target="#rejectModal">
                    Từ chối
                </button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Mã Khiếu Nại:</strong>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $complaint->id }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Mã Đơn Hàng:</strong>
                        </div>
                        <div class="col-md-8">
                            <a href="{{ route('order.showDetail', $complaint->order_id) }}">{{ $complaint->order_id }}</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Người Khiếu Nại:</strong>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $complaint->complaintBy->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Nội Dung Khiếu Nại:</strong>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $complaint->description ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Bằng Chứng:</strong>
                        </div>
                        <div class="col-md-8">
                            <img src="{{ $complaint->evidence ?? '' }}" alt="Bằng chứng"
                                 style="max-width: 300px; max-height: 400px">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Trạng Thái:</strong>
                        </div>
                        <div class="col-md-8">
                            @if ($complaint->status === 'pending')
                                <span class="badge bg-warning text-dark">Đang chờ</span>
                            @elseif ($complaint->status === 'approved')
                                <span class="badge bg-success">Đã chấp nhận</span>
                            @else
                                <span class="badge bg-danger">Bị từ chối</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Quyết Định Của Admin:</strong>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $complaint->admin_decision ?? 'Chưa có' }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Ngày Tạo:</strong>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $complaint->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('modal.approve_complaint')
    @include('modal.reject_complaint')
@endsection
