@php use App\Models\Cleaner; @endphp
@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Nhân viên</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('cleaner.showCreate') }}" class="btn btn-primary btn-round">Thêm mới Nhân viên</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10%">Mã NV</th>
                        <th scope="col">Họ và Tên</th>
                        <th scope="col">Số dư tài khoản</th>
                        <th scope="col" width="10%">Điểm Phạt</th>
                        <th scope="col" width="10%">Sao</th>
                        <th scope="col" width="15%">Trạng thái</th>
                        <th scope="col" width="15%">Khả năng làm việc</th>
                        <th class="text-center" scope="col" width="15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $cleaners as $key => $cleaner )
                        <tr>
                            <td>{{ $cleaner->user_id ?? '' }}</td>
                            <td>{{ $cleaner->user->name ?? '' }}</td>
                            <td>
                                {{ number_format($cleaner->account_balance ?? 0) }} VNĐ
                            </td>
                            <td>{{ $cleaner->point ?? 0 }}</td>
                            <td>{{ $cleaner->rating ?? 0 }}</td>
                            <td>
                                @if( $cleaner->status === Cleaner::STATUS_ACTIVE )
                                    <span class="badge bg-success">Đang hoạt động</span>
                                @else
                                    <span class="badge bg-danger">Đã nghỉ việc</span>
                                @endif
                            </td>
                            <td>
                                @if( $cleaner->can_cleaning === 1 )
                                    - Dọn dẹp <br>
                                @endif
                                @if( $cleaner->can_market === 1 )
                                    - Đi chợ <br>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('cleaner.showUpdate', $cleaner->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Sửa">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('cleaner.showDetail', $cleaner->id) }}"
                                   class="btn btn-sm btn-primary"
                                   title="Xem">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#"
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
