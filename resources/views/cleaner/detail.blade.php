@php
    use App\Models\Cleaner;use App\Models\Contract;
@endphp
@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Thông tin nhân viên</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mã NV: NV-000{{ $cleaner->id }}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-4">
                            <table class="table w-100">
                                <tbody>
                                <tr>
                                    <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Họ và tên: </span>
                                    </th>
                                    <td>
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">{{ $cleaner->user->name ?? '' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Email: </span>
                                    </th>
                                    <td>
                                        <span
                                            style="font-size: 1rem; color: #666; margin-left: 10px">{{ $cleaner->user->email ?? '' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="fw-bold"
                                              style="font-size: 1.25rem; color: #333;">Số điện thoại: </span>
                                    </th>
                                    <td colspan="2">
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">{{ $cleaner->user->phone_number ?? '' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Số CCCD:  </span>
                                    </th>
                                    <td colspan="2">
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">{{ $cleaner->user->identification ?? '' }}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <table class="table w-100">
                                <tbody>
                                <tr>
                                    <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Trạng thái: </span>
                                    </th>
                                    <td>
                                        @if( $cleaner->status === Cleaner::STATUS_ACTIVE )
                                            <span class="badge bg-success">Đang hoạt động</span>
                                        @else
                                            <span class="badge bg-danger">Đã nghỉ việc</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="fw-bold"
                                              style="font-size: 1.25rem; color: #333;">Tên đăng nhập: </span>
                                    </th>
                                    <td>
                                            <span
                                                style="font-size: 1rem; color: #666; margin-left: 10px">{{ $cleaner->user->user_name ?? '' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                            <span class="fw-bold"
                                                  style="font-size: 1.25rem; color: #333;">Địa chỉ: </span>
                                    </th>
                                    <td colspan="2">
                                        <span
                                            style="font-size: 1rem; color: #666; margin-left: 10px">{{ $cleaner->user->address ?? '' }}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mb-4">
                        <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Khả năng nghiệp vụ: </span>
                        <p>
                            @if( $cleaner->can_cleaning === 1 )
                                - Dọn dẹp <br>
                            @endif
                            @if( $cleaner->can_market === 1 )
                                - Đi chợ <br>
                            @endif
                        </p>
                    </div>
                    <div class="mb-4">
                        <span class="fw-bold" style="font-size: 1.25rem; color: #333;">Mô tả CV: </span>
                        <p>
                            {{ $cleaner->cv ?? '' }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <span class="fw-bold" style="font-size: 1.25rem; color: #333;">File đính kèm CV: </span>
                        @if(!empty($cleaner->cv_file))
                            <a href="{{ $cleaner->cv_file }}"
                               target="_blank">
                                <i class="fas fa-file-pdf"></i>
                                <span>CV của nhân viên</span>
                            </a>
                        @endif

                    </div>
                    <div class="row mb-3 mt-5">
                        <div class="col-6">
                            <h6 class="fw-semibold">Các Hợp đồng của Nhân
                                Viên: {{ $cleaner->contracts()->count() ?? 0 }} hợp đồng</h6>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal"
                                    data-bs-target="#createContractModal" data-cleaner-id="{{ $cleaner->id }}">Thêm mới
                                hợp đồng
                            </button>

                        </div>
                    </div>
                    <div class="mb-4">

                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên hợp đồng</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Ngày kết thúc</th>
                                <th scope="col">Trạng thái</th>
                                <th class="text-center" scope="col" width="15%">File đính kkèm</th>
                                <th scope="col" width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $cleaner->contracts as $key => $contract )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $contract->name ?? '' }}</td>
                                    <td>{{ $contract->start_date ?? '' }}</td>
                                    <td>{{ $contract->end_date ?? '' }}</td>
                                    <td>
                                        @if( $contract->status === Contract::STATUS_ACTIVE )
                                            <span class="badge bg-success">Đang hoạt động</span>
                                        @else
                                            <span class="badge bg-danger">Đã kết thúc</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(!empty($contract->attachment_file))
                                            <a href="{{ $contract->attachment_file }}"
                                               target="_blank">
                                                <i class="fas fa-file-pdf"></i>
                                                <span>Hợp đồng lao động</span>
                                            </a>
                                        @endif
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
                                                    <button class="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editContractModal"
                                                            data-cleaner-id="{{ $cleaner->id }}"
                                                            data-contract-id="{{ $contract->id }}"
                                                            data-name="{{ $contract->name }}"
                                                            data-commission="{{ $contract->commission }}"
                                                            data-start-date="{{ $contract->start_date }}"
                                                            data-end-date="{{ $contract->end_date }}"
                                                            data-terms="{{ $contract->terms }}"
                                                            data-attachment-file="{{ $contract->attachment_file  }}"
                                                            data-status="{{ $contract->status }}">

                                                        Sửa thông tin
                                                    </button>

                                                    <a class="dropdown-item" href="{{ route('cleaner.deleteContract', $contract->id) }}">Xóa hợp đồng</a>
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
    @include('modal.create_contract')
    @include('modal.edit_contract')
    <style>
        .approval-history-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .approval-history-list .list-group-item {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 15px;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .approval-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .approval-info .admin-name {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        .approval-info .badge {
            font-size: 13px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .badge-success {
            background-color: #28a745 !important;
            width: 100px;
        }

        .badge-danger {
            background-color: #dc3545 !important;
            width: 100px;
        }

        .badge-warning {
            background-color: #ffc107 !important;
            width: 100px;
        }

        .badge-primary {
            background-color: #007bff !important;
            width: 100px;
        }

        .approval-info .creator-name {
            font-style: italic;
            font-size: 14px;
            color: #555;
        }

        .approval-info .date-time {
            font-size: 13px;
            color: #777;
            margin-left: auto;
        }
    </style>
@endsection
