@extends('layouts.admin.master')

@section('title', 'Sửa mã giảm giá')

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

                                <h4 class="card-title mb-4">Sửa mã giảm giá</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Voucher_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mã <span class="text-danger">*</span></label>
                                            <input type="text" name="code" class="form-control"
                                                value="{{ $voucher->code }}">
                                            @error('code')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Tên chương trình <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $voucher->name }}">
                                            @error('name')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Giảm giá <span class="text-danger">*</span></label>
                                            <input type="number" name="discount" class="form-control"
                                                value="{{ $voucher->discount }}">
                                            @error('discount')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Trạng thái </label>
                                            <select name="status" class="form-select" id="validationCustom04">
                                                <option value="1"
                                                    {{ isset($voucher) && $voucher->status === 1 ? 'selected' : '' }}>
                                                    Hoạt động</option>
                                                <option value="0"
                                                    {{ isset($voucher) && $voucher->status === 0 ? 'selected' : '' }}>
                                                    Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Ngày bắt đầu <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ $voucher->start_date }}">
                                            @error('start_date')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Ngày kết thúc <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="end_date" class="form-control"
                                                value="{{ $voucher->end_date }}">
                                            @error('end_date')
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
                                            <a href="{{ route('route_BackEnd_Voucher_List') }}"
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
