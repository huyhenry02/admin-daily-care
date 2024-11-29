@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Dịch vụ theo giờ</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('service.showCreate') }}" class="btn btn-primary btn-round">Thêm mới Dịch vụ</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên dịch vụ</th>
                        <th scope="col">Số giờ thự hiện</th>
                        <th scope="col">Giá</th>
                        <th scope="col" width="15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $services as $key => $service )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $service->name ?? '' }}</td>
                            <td>{{ $service->hour }}h</td>
                            <td>
                                {{ number_format($service->price) }} VNĐ
                            </td>
                            <td class="text-center">
                                <a href="{{ route('service.delete', $service->id) }}"
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
