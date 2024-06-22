@extends('layouts.admin.master')

@section('title', 'Sửa giấy chứng nhận')

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

                                <h4 class="card-title mb-4">Sửa giấy chứng nhận</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Certificate_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Số chứng thư <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="sochungthu" class="form-control"
                                                value="{{ $certificate->sochungthu }}">
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
                                                value="{{ $certificate->shap }}">
                                            @error('shap')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Kích thước <span class="text-danger">*</span></label>
                                            <input type="text" name="kichthuoc" class="form-control"
                                                value="{{ $certificate->kichthuoc }}">
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
                                                value="{{ $certificate->weight }}">
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
                                                value="{{ $certificate->dotinhkhiet }}">
                                            @error('dotinhkhiet')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Cấp màu <span class="text-danger">*</span></label>
                                            <input type="text" name="color" class="form-control"
                                                value="{{ $certificate->color }}">
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
                                                value="{{ $certificate->dochetac }}">
                                            @error('dochetac')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Độ chói <span class="text-danger">*</span></label>
                                            <input type="text" name="dochoi" class="form-control"
                                                value="{{ $certificate->dochoi }}">
                                            @error('dochoi')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Độ phát lửa <span class="text-danger">*</span></label>
                                            <input type="text" name="dophatlua" class="form-control"
                                                value="{{ $certificate->dophatlua }}">
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
                                                value="{{ $certificate->dolaplanh }}">
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
                                                value="{{ $certificate->huynhquang }}">
                                            @error('huynhquang')
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
                                            <a href="{{ route('route_BackEnd_Certificate_List') }}"
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
