@php use App\Models\Complaint; @endphp
@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Khiếu nại của khách hàng</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Đơn hàng</th>
                        <th scope="col">Người khiếu nại</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" width="5%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $complaints as $key => $complaint)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>ĐH-000{{ $complaint->order_id }}</td>
                            <td>{{ $complaint->complaintBy?->name ?? '' }}</td>
                            <td>{{ $complaint->description ?? '' }}</td>
                            <td>
                                @if( $complaint->status === Complaint::STATUS_PENDING)
                                    <span class="badge bg-warning">Chờ xử lý</span>
                                @elseif( $complaint->status === Complaint::STATUS_APPROVED)
                                    <span class="badge bg-success">Đã xác nhận</span>
                                @elseif( $complaint->status === Complaint::STATUS_REJECTED)
                                    <span class="badge bg-danger">Từ chối khiếu nại</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('order.showDetailComplaint', $complaint->id) }}"
                                   class="btn btn-primary-outline">
                                    <i class="fas fa-eye"></i>
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
