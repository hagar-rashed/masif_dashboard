@extends('dashboard.layouts.app')

@section('title', __('models.add_n_client'))

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
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.clients.index') }}">{{ __('models.clients') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.add_n_client') }}</a>
                                    </li>
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
                                    <h2 class="card-title">{{ __('models.add_n_client') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createclientForm"
                                        action="{{ route('admin.clients.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">                                                
                                                <div class="form-group">
                                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                                    <input type="text" id="name" name="name" value="{{ old ('name') }}" class="form-control" placeholder="Enter Name">
                                                    @error('name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="user_name" class="form-label">{{ __('User Name') }}</label>
                                                    <input type="text" id="user_name" name="user_name" value="{{ old ('user_name') }}" class="form-control" placeholder="Enter User Name">
                                                    @error('user_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                                    <input type="email" id="email" name="email" value="{{ old ('email') }}" class="form-control" placeholder="Enter Email">
                                                    @error('email')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                  <label for="password" class="form-label">{{ __('Password') }}</label>
                                                  <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                                                   @error('password')
                                                    <span class="alert alert-danger">
                                                        <small class="errorTxt">{{ $message }}</small>
                                                    </span>
                                                   @enderror
                                                </div>
 
                                                <div class="form-group">
                                                    <label for="code" class="form-label">{{ __('Code') }}</label>
                                                    <input type="text" id="code" name="code" value="{{ old ('code') }}" class="form-control" placeholder="Enter Code">
                                                    @error('code')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <!-- Image Field -->
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">{{ __('models.image') }}</label>
                                                <input class="form-control image" accept="image/png, image/jpeg" type="file" id="formFile" name="image">
                                                @error('image')
                                                <span class="alert alert-danger">
                                                    <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                                <div class="form-group prev">
                                                    <img src="" style="width: 100px"
                                                        class="img-thumbnail preview-formFile" alt="">
                                                </div>
                                            </div>

                          
               
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">{{ __('models.save') }}</button>
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/clientForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
