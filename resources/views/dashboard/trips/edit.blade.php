@extends('dashboard.layouts.app')

@section('title', $trip->name)

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
                                            href="{{ route('admin.services.index') }}">{{ __('models.services') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ $trip->name }}</a>
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
                                    <h2 class="card-title">{{ $trip->name }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateserviceForm"
                                        action="{{ route('updateTrip', $trip->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">



                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('models.title_ar') }}</label>
                                                    <input type="text" id="name_ar" class="form-control"
                                                        name="name" value="{{ old('name_ar', $trip->location) }}" />
                                                    @error('name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_en">{{ __('models.title_en') }}</label>
                                                    <input type="text" id="name_en" class="form-control"
                                                        name="name_en" value="{{ old('name_en', $service->name_en) }}" />
                                                    @error('name_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> --}}

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">{{ __('models.desc_ar') }}</label>
                                                    <textarea class="form-control" name="desc" dir="rtl" rows="10">{{ old('desc', $trip->desc) }}</textarea>
                                                    @error('desc')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en">{{ __('models.desc_en') }}</label>
                                                    <textarea class="form-control" name="desc_en" dir="ltr" rows="10">{{ old('desc_en', $service->desc_en) }}</textarea>
                                                    @error('desc_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> --}}

                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1">{{ __('models.update') }}</button>
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
