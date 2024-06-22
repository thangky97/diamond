@extends('layouts.admin.master')

@section('title', 'Thêm giấy chứng nhận')

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

                                <h4 class="card-title mb-4">Thêm giấy chứng nhận</h4>

                                <form class="custom-validation" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Số chứng thư <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="sochungthu" class="form-control"
                                                value="{{ old('sochungthu', isset($request['sochungthu']) ? $request['sochungthu'] : '') }}">
                                            @error('sochungthu')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Hình dạng và kiểu cắt <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="shap" class="form-control"
                                                value="{{ old('shap', isset($request['shap']) ? $request['shap'] : '') }}">
                                            @error('shap')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Kích thước <span class="text-danger">*</span></label>
                                            <input type="text" name="kichthuoc" class="form-control"
                                                value="{{ old('kichthuoc', isset($request['kichthuoc']) ? $request['kichthuoc'] : '') }}">
                                            @error('kichthuoc')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Trọng lượng <span class="text-danger">*</span></label>
                                            <input type="text" name="weight" class="form-control"
                                                value="{{ old('weight', isset($request['weight']) ? $request['weight'] : '') }}">
                                            @error('weight')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Độ tinh khiết <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="dotinhkhiet" class="form-control"
                                                value="{{ old('dotinhkhiet', isset($request['dotinhkhiet']) ? $request['dotinhkhiet'] : '') }}">
                                            @error('dotinhkhiet')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Cấp màu <span class="text-danger">*</span></label>
                                            <input type="text" name="color" class="form-control"
                                                value="{{ old('color', isset($request['color']) ? $request['color'] : '') }}">
                                            @error('color')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Độ chế tác <span class="text-danger">*</span></label>
                                            <input type="text" name="dochetac" class="form-control"
                                                value="{{ old('dochetac', isset($request['dochetac']) ? $request['dochetac'] : '') }}">
                                            @error('dochetac')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Độ chói <span class="text-danger">*</span></label>
                                            <input type="text" name="dochoi" class="form-control"
                                                value="{{ old('dochoi', isset($request['dochoi']) ? $request['dochoi'] : '') }}">
                                            @error('dochoi')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Độ phát lửa <span class="text-danger">*</span></label>
                                            <input type="text" name="dophatlua" class="form-control"
                                                value="{{ old('dophatlua', isset($request['dophatlua']) ? $request['dophatlua'] : '') }}">
                                            @error('dophatlua')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Độ lấp lánh <span class="text-danger">*</span></label>
                                            <input type="text" name="dolaplanh" class="form-control"
                                                value="{{ old('dolaplanh', isset($request['dolaplanh']) ? $request['dolaplanh'] : '') }}">
                                            @error('dolaplanh')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Huỳnh quang <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="huynhquang" class="form-control"
                                                value="{{ old('huynhquang', isset($request['huynhquang']) ? $request['huynhquang'] : '') }}">
                                            @error('huynhquang')
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
                                            <a href="{{ route('route_BackEnd_Certificate_List') }}"
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
