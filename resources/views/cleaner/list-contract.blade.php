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
                        <th scope="col" width="15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $contracts as $key => $contract )
                        <tr>
                            <td>{{ $key+1 }}</td>
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
                            <td class="text-center">
                                <a href="#"
                                   class="btn btn-sm btn-warning"
                                   title="Sửa">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('cleaner.deleteContract', $contract->id) }}"
                                   class="btn btn-sm btn-danger"
                                   title="Xóa">
                                    <i class="fa fa-trash"></i>
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
