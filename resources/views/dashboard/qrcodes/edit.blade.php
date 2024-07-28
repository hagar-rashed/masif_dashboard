@extends('dashboard.layouts.app')

@section('title', $qrcode->name)

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.qrcodes.index') }}">{{ __('models.qrcodes') }}</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{ $qrcode->name }}</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">{{ $qrcode->name }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateqrcodeForm" action="{{ route('admin.qrcodes.update', $qrcode->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">

                                            <!-- Name -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('models.name') }}</label>
                                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $qrcode->name) }}" />
                                                    @error('name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- UserType -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="user_type">{{ __('models.user_type') }}</label>
                                                    <input type="text" id="user_type" class="form-control" name="user_type" value="{{ old('user_type', $qrcode->user_type) }}" />
                                                    @error('user_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">{{ __('models.email') }}</label>
                                                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email', $qrcode->email) }}" />
                                                    @error('email')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone">{{ __('models.phone') }}</label>
                                                    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', $qrcode->phone) }}" />
                                                    @error('phone')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
 
                                            <!-- Village Name -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="village_name">{{ __('models.village_name') }}</label>
                                                    <input type="text" id="village_name" class="form-control" name="village_name" value="{{ old('village_name', $qrcode->village_name) }}" />
                                                    @error('village_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Date -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="date">{{ __('models.date') }}</label>
                                                    <input type="date" id="date" class="form-control" name="date" value="{{ old('date', $qrcode->date) }}" />
                                                    @error('date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Expiration Date -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="expiration_date">{{ __('models.expiration_date') }}</label>
                                                    <input type="date" id="expiration_date" class="form-control" name="expiration_date" value="{{ old('expiration_date', $qrcode->expiration_date) }}" />
                                                    @error('expiration_date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Code -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="code">{{ __('models.code') }}</label>
                                                    <input type="text" id="code" class="form-control" name="code" value="{{ old('code', $qrcode->code) }}" readonly />
                                                </div>
                                            </div>

                                            <!-- QR Code Image -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="qr_code">{{ __('models.qr_code') }}</label>
                                                    <div>
                                                        <img src="{{ asset('storage/' . $qrcode->qr_code) }}" alt="QR Code Image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">{{ __('models.update') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
        <script src="{{ asset('dashboard/assets/js/custom/validation/qrcodeForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
