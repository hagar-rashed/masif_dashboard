@extends('site.layouts.app')

@title(__('models.videos'))

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.videos'))

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ __('models.videos') }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png" alt="">
            <span>{{ __('models.videos') }} </span>
        </div>
    </div>
    <!-- end  sub-header  -->
@endsection

@section('content')
    <!-- start app ====
            ===============================
            ================================
            ============== --
            -->
    <main id="app">

        <!-- start videos -->
        <section class="videos mr-section">
            <div class="main-container">
                <div class="title-center">
                    <h2> {{ __('models.videos') }}</h2>
                </div>
                <div class="row">

                    @foreach ($videos as $video)
                        <div class="col-lg-4">
                            <a href="{{ route('site.videos.show', $video->id) }}">
                                <div class="sub-videos-index">
                                    <div class="img-videos-index">
                                        <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}">
                                        <div class="icon-videos-index">
                                            <div class="sub-icon-videos is-play" href="#">
                                                <div class="button-outer-circle has-scale-animation"></div>
                                                <div class="button-outer-circle has-scale-animation has-delay-short">
                                                </div>
                                                <div class="button-icon is-play">
                                                    <object data="" type="">
                                                        <svg height="20px" width="20px" fill="#D3AD64">
                                                            <polygon class="triangle" points="5,0 20,10 5,20"
                                                                viewBox="0 0 20 10"></polygon>
                                                            <path class="path" d="M5,0 L20,10 L5,20z" fill="none"
                                                                stroke="#D3AD64" stroke-width="1"></path>
                                                        </svg>
                                                    </object>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-videos-index">
                                        <h2>{{ $video->title }}</h2>
                                        <p>
                                            {{ Str::limit($video->desc, 70) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>
                                {{ $videos->links('vendor.pagination.default') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>



















    </main>

    <!-- end app ====
        =============================
        ==================================
        ==================== -->
@endsection
