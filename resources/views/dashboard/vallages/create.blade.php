@extends('dashboard.layouts.app')

@section('title', __('models.add_n_service'))

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.vallages.index') }}">{{ __('models.values') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.add_n_value') }}</a>
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
                                    <h2 class="card-title">{{ __('models.add_n_value') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createserviceForm" action="{{ route('admin.vallages.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_ar">{{ __('models.title_ar') }}</label>
                                                    <input type="text" id="name_ar" class="form-control" name="name_ar" value="{{ old('name_ar') }}" />
                                                    @error('name_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_en">{{ __('models.title_en') }}</label>
                                                    <input type="text" id="name_en" class="form-control" name="name_en" value="{{ old('name_en') }}" />
                                                    @error('name_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="location">{{ __('models.location') }}</label>
                                                    <textarea class="form-control" name="location" rows="10">{{ old('location') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="lat">{{ __('models.lat') }}</label>
                                                    <textarea class="form-control" name="lat" rows="10">{{ old('lat') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="lng">{{ __('models.lng') }}</label>
                                                    <textarea class="form-control" name="lng" rows="10">{{ old('lng') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="services_ar">{{ __('models.services_ar') }}</label>
                                                    <textarea class="form-control" name="services_ar" rows="10">{{ old('services_ar') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="services_en">{{ __('models.services_en') }}</label>
                                                    <textarea class="form-control" name="services_en" rows="10">{{ old('services_en') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="owner_name_ar">{{ __('models.owner_name_ar') }}</label>
                                                    <textarea class="form-control" name="owner_name_ar" rows="10">{{ old('owner_name_ar') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="owner_name_en">{{ __('models.owner_name_en') }}</label>
                                                    <textarea class="form-control" name="owner_name_en" rows="10">{{ old('owner_name_en') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en">{{ __('models.desc_en') }}</label>
                                                    <textarea class="form-control" name="desc_en" rows="10">{{ old('desc_en') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en">{{ __('models.desc_ar') }}</label>
                                                    <textarea class="form-control" name="desc_ar" rows="10">{{ old('desc_ar') }}</textarea>
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/serviceForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
