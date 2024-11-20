@php
    use App\Models\Cleaner;use App\Models\Contract;
@endphp
@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Hợp đồng</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Mã HĐ</th>
                        <th scope="col">Tên hợp đồng</th>
                        <th scope="col">Tên Nhân viên</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">File đính kkèm</th>
                        <th scope="col" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $contracts as $key => $contract )
                        <tr>
                            <td>HD-000{{ $key+1 }}</td>
                            <td>{{ $contract->name ?? '' }}</td>
                            <td>{{ $contract->cleaner?->user?->name ?? '' }}</td>
                            <td>{{ $contract->start_date  ?? '' }}</td>
                            <td>{{ $contract->end_date  ?? '' }}</td>
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
                                            <a class="dropdown-item" href="#">Sửa thông tin</a>
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
@endsection
