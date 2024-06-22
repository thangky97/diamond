@extends('layouts.admin.master')

@section('title', 'Sửa phiếu bảo hành')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="msg-box">
                            <?php //Hiển thị thông báo thành công
                            ?>
                            @if (Session::has('success'))
                                <div class="alert alert-success solid alert-dismissible fade show">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Sửa phiếu bảo hành</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Warranty_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Người dùng <span class="text-danger">*</span></label>
                                            <select name="user_id" id="" class="form-control">
                                                @foreach ($user_id as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ isset($news) && $news->user_id === $item->id ? 'selected' : '' }}>
                                                        {{ $item->username }}</option>
                                                @endforeach
                                                @error('user_id')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Sản phẩm <span class="text-danger">*</span></label>
                                            <select name="product_id" id="" class="form-control">
                                                @foreach ($product_id as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ isset($warranty) && $warranty->product_id === $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                                @error('product_id')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Thời gian (tháng) <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="time" class="form-control"
                                                value="{{ $warranty->time }}">
                                            @error('time')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Ngày bảo hành <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="date" class="form-control"
                                                value="{{ $warranty->date }}">
                                            @error('date')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mô tả <span class="text-danger">*</span></label>
                                        <div>
                                            <textarea name="description" data-parsley-type="text" id="summernote" class="form-control" rows="5">{{ $warranty->description }}</textarea>
                                            @error('description')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="text" name="updated_at" id="updated_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Cập nhật
                                            </button>
                                            <a href="{{ route('route_BackEnd_Warranty_List') }}"
                                                class="btn btn-secondary waves-effect">Huỷ</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Nội dung',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
