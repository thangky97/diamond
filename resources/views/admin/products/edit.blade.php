@extends('layouts.admin.master')

@section('title', 'Sửa sản phẩm')

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

                                <h4 class="card-title mb-4">Sửa sản phẩm</h4>

                                <form class="custom-validation"
                                    action="{{ route('route_BackEnd_Products_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Mã SP <span class="text-danger">*</span></label>
                                        <input type="text" name="code" class="form-control"
                                            value="{{ $product->code }}">
                                        @error('code')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tên SP <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $product->name }}">
                                        @error('name')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Giá <span class="text-danger">*</span></label>
                                        <input type="text" name="price" class="form-control"
                                            value="{{ $product->price }}">
                                        @error('price')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Giảm giá </label>
                                        <input type="number" name="discount" class="form-control"
                                            value="{{ $product->discount }}">
                                        @error('discount')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Ship </label>
                                        <input type="number" name="ship" class="form-control"
                                            value="{{ $product->ship }}">
                                        @error('ship')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Danh mục sản phẩm <span
                                                class="text-danger">*</span></label>
                                        <select name="cate_id" id="" class="form-control">
                                            @foreach ($cate_id as $cate)
                                                <option value="{{ $cate->id }}"
                                                    {{ isset($product) && $product->cate_id === $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->name }}</option>
                                            @endforeach
                                            @error('cate_id')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <textarea name="short_description" class="form-control" rows="1">{{ $product->short_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                        @error('description')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images" class="form-file-input form-control">
                                                @if (isset($product) && $product->image)
                                                    <img src="{{ asset($product->image ? '' . Storage::url($product->image) : $product->name) }}"
                                                        alt="{{ $product->name }}" width="100">
                                                @endif
                                                @error('images')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh 1 <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images1" class="form-file-input form-control">
                                                @if (isset($product) && $product->image1)
                                                    <img src="{{ asset($product->image1 ? '' . Storage::url($product->image1) : $product->name) }}"
                                                        alt="{{ $product->name }}" width="100">
                                                @endif
                                                @error('images1')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh 2 <span class="text-danger">*</span></label>
                                        <div>
                                            <div class="form-file">
                                                <input type="file" name="images2"
                                                    class="form-file-input form-control">
                                                @if (isset($product) && $product->image2)
                                                    <img src="{{ asset($product->image2 ? '' . Storage::url($product->image2) : $product->name) }}"
                                                        alt="{{ $product->name }}" width="100">
                                                @endif
                                                @error('images2')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái </label>
                                        <select name="status" class="form-select" id="validationCustom04">
                                            <option value="1"
                                                {{ isset($product) && $product->status === 1 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="2"
                                                {{ isset($product) && $product->status === 2 ? 'selected' : '' }}>
                                                Không hoạt động</option>
                                            <option value="0"
                                                {{ isset($product) && $product->status === 0 ? 'selected' : '' }}>
                                                Khóa</option>
                                        </select>
                                        @error('status')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="text" name="updated_at"
                                        value="{{ date('Y-m-d H:i:s', strtotime('now')) }}" hidden>
                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Cập nhật
                                            </button>
                                            <a href="{{ route('route_BackEnd_Products_List') }}"
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
