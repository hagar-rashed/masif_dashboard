@extends('dashboard.layouts.app')

@section('title', __('models.videos'))

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.videos.index') }}">{{ __('models.videos') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ $video->title }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="{{ route('admin.videos.create') }}"><i class="mr-1"
                                        data-feather="circle"></i><span class="align-middle">{{ __('models.add_n_video') }} </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="card-demo-example">
                    <div class="row match-height">
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                @php
                                    $url = $video->url;
                                    $url_components = parse_url($url);
                                    if (array_key_exists('query', $url_components)) {
                                        parse_str($url_components['query'], $params);
                                        $key = $params['v'];
                                    } else {
                                        $key = str_replace('/', '', $url_components['path']);
                                    }
                                @endphp


                                <iframe width="100%" height="500"
                                    src="https://www.youtube.com/embed/{{ $key }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>

                                <div class="card-body">
                                    <h4 class="card-title">{{ $video->title }}</h4>
                                    <p class="card-text">
                                        {{ $video->desc }}
                                    </p>
                                    <div class="gomaa">
                                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-primary"><i
                                                class="fa-solid fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"></i> {{ __('models.update') }}</a>
                                        {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary">السابقة <i class="fa-solid fa-arrow-left"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
