@extends('layouts.main')
@section('content')
    <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
        <div>
            <h3 class="fw-bold mb-3">Chỉnh sửa Thông tin app</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('advertisement.putAdvertisement', $advertisement->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thông tin cần lưu</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Nhập Tiêu đề"
                                               value="{{ old('title', $advertisement->title) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung</label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="content" rows="5" name="content"
                                                  placeholder="Nhập Nội dung">{{ old('content', $advertisement->content) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type">Loại</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="news" {{ old('type', $advertisement->type) === 'news' ? 'selected' : '' }}>Tin tức</option>
                                        <option value="banner" {{ old('type', $advertisement->type) === 'banner' ? 'selected' : '' }}>Banner</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Ảnh</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                               onchange="previewImage(event)">
                                    </div>
                                    <div class="mt-3">
                                        <img id="image-preview"
                                             src="{{ $advertisement->image ?? '#' }}"
                                             alt="Preview ảnh"
                                             style="max-width: 300px; {{ $advertisement->image ? '' : 'display: none;' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Lưu</button>
                    <button class="btn btn-danger">Hủy</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const preview = document.getElementById('image-preview');
            reader.onload = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
