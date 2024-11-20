@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Danh sách Thông tin app</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{route('advertisement.showCreate') }}" class="btn btn-primary btn-round">Thêm mới</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-stats card-round">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Loại thông tin</th>
                        <th scope="col" width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $advertisements as $index => $advertisement)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $advertisement->title ?? '' }}</td>
                            <td>{{ $advertisement->content ?? '' }}</td>
                            <td>
                                <img src="{{ $advertisement->image }}"
                                     alt="Hình ảnh"
                                     style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                            </td>
                            <td>
                                {{ $advertisement->type === 'news' ? 'Tin tức' : 'Banner' }}
                            </td>
                            <td>
                                <a href="{{ route('advertisement.showUpdate', $advertisement->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Sửa">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('advertisement.delete', $advertisement->id) }}"
                                   class="btn btn-sm btn-danger"
                                   title="Xóa">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if($advertisements->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
