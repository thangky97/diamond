@extends('layouts.admin.master')

@section('title', 'Thêm mã giảm giá')

@section('css')

@endsection

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

                                <h4 class="card-title mb-4">Thêm mã giảm giá</h4>

                                <form class="custom-validation" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mã giảm giá <span class="text-danger">*</span></label>
                                            <input type="text" name="code" class="form-control"
                                                value="{{ old('code', isset($request['code']) ? $request['code'] : '') }}">
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
                                                value="{{ old('name', isset($request['name']) ? $request['name'] : '') }}">
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
                                                value="{{ old('discount', isset($request['discount']) ? $request['discount'] : '') }}">
                                            @error('discount')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Trạng thái </label>
                                            <select name="status" class="form-select" id="validationCustom04">
                                                <option selected value="1">Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Ngày bắt đầu <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ old('start_date', isset($request['start_date']) ? $request['start_date'] : '') }}">
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
                                                value="{{ old('end_date', isset($request['end_date']) ? $request['end_date'] : '') }}">
                                            @error('end_date')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="text" name="created_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Thêm
                                            </button>
                                            <a href="{{ route('route_BackEnd_Warranty_List') }}"
                                                class="btn btn-secondary waves-effect">Quay lại</a>
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
