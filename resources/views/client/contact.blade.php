@extends('layouts.client.master')

@section('title', 'Liên hệ')

@section('content')

    <section class="contact_section layout_padding">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Liên hệ với chúng tôi
                </h2>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success solid alert-dismissible fade show">
                    <span><i class="fas fa-check"></i></span>
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            @endif
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267015.646895824!2d107.2055546458202!3d11.152413542576744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b2a11844fb9%3A0xbed3d5f0a6d6e0fe!2zVFLGr-G7nE5HIMSQ4bqgSSBI4buMQyBHSUFPIFRIw5RORyBW4bqsTiBU4bqiSSBUUC5IQ00gW0PGoCBT4bueIDNd!5e0!3m2!1svi!2s!4v1690616755207!5m2!1svi!2s"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form id="formlienhe" name="formlienhe" action="{{ route('route_FrontEnd_Contact_Create') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="text" placeholder="Tên" name="name" />
                            @error('name')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input type="email" placeholder="Email"name="email" />
                            @error('email')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input type="text" placeholder="Số điện thoại" name="phone" />
                            @error('phone')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Nội dung" name="content" />
                            @error('content')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex ">
                            <button class ="detail-box" type="submit"
                                style="background-color: #FF0000; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;">Gửi
                                phản hồi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
