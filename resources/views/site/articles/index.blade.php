@extends('site.layouts.app')

@title(__('models.news'))

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.news'))

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ __('models.news') }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png"
                alt="">
            <span>{{ __('models.news') }} </span>
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

        <!-- start blog  -->
        <section class="blog mr-section">
            <div class="main-container">

                @foreach ($articles as $article)
                    <div class="sub-blog-index">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="text-blog-index">
                                    <h2>{{ $article->title }}</h2>
                                    <h4> <img src="{{ url('site') }}/images/share-alt.png" alt="">
                                        {{ $article->date }}
                                    </h4>
                                    <p>
                                        {{ Str::limit($article->desc, 372) }}
                                    </p>


                                    <div class="btn-text-blog-index">
                                        <a href="{{ route('site.articles.show', $article->id) }}" class="ctm-btn">
                                            {{ __('models.read_article') }} </a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="main-img-blog-index">
                                    <div class="img-blog-index">
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination">
                    <ul>
                        {{ $articles->links('vendor.pagination.default') }}
                    </ul>
                </div>

            </div>
        </section>
        <!-- end blog  -->


        <section class="scraps mr-section">
            <div class="main-container">
                <div class="title-start">
                    <h2> اهم القصاصات </h2>
                </div>


                <div class="main-scraps">
                    <div class="owl-carousel owl-theme maincarousel" id="slider_2">

                        @foreach ($scraps as $scrap)
                            <div class="item">
                                <div class="sub-scraps">
                                    <a href="{{ route('site.articles.scrap', $scrap->id) }}">
                                        <div class="img-scraps">
                                            <img src="{{ asset('storage/' . $scrap->image) }}"
                                                alt="{{ Str::limit($scrap->desc, 100) }}">
                                        </div>
                                        <h2>
                                            {{ Str::limit($scrap->desc, 100) }}
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        @endforeach


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
