@extends('dashboard.layouts.app')

@section('title', $article->title)

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
                                            href="{{ route('admin.articles.index') }}">{{ __('models.news') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ $article->title }}</a>
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
                                    <h2 class="card-title">{{ $article->title }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateArticleForm"
                                        action="{{ route('admin.articles.update', $article->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="formFile"
                                                        class="form-label">{{ __('models.image') }}</label>
                                                    <input class="form-control image" accept="image/png, image/jpeg"
                                                        type="file" id="formFile" name="image">
                                                    @error('image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{ asset('storage/' . $article->image) }}"
                                                        style="width: 100px" class="img-thumbnail preview-formFile"
                                                        alt="">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="category_id">{{ __('models.category') }}</label>

                                                    <select class="form-control" name="category_id" id="category_id">
                                                        <option value="">{{ __('models.select') }}</option>

                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('category_id')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_ar">{{ __('models.title_ar') }}</label>
                                                    <input type="text" id="title_ar" class="form-control"
                                                        name="title_ar"
                                                        value="{{ old('title_ar', $article->title_ar) }}" />
                                                    @error('title_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_en">{{ __('models.title_en') }}</label>
                                                    <input type="text" id="title_en" class="form-control"
                                                        name="title_en"
                                                        value="{{ old('title_en', $article->title_en) }}" />
                                                    @error('title_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_ar">{{ __('models.desc_ar') }}</label>
                                                    <textarea class="form-control" name="desc_ar" id="desc_ar" rows="10">{{ old('desc_ar', $article->desc_ar) }}</textarea>
                                                    @error('desc_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en">{{ __('models.desc_en') }}</label>
                                                    <textarea class="form-control" name="desc_en" id="desc_en" rows="10">{{ old('desc_en', $article->desc_en) }}</textarea>
                                                    @error('desc_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1">{{ __('models.update') }}</button>
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/articleForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#desc_ar').summernote({
                    lang: 'ar-Eg'
                });
                $('#desc_en').summernote({
                    lang: 'en-US'
                });
            });
        </script>
    @endpush
@endsection
