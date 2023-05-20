@extends('site.layouts.app')

@title(getSetting('main_name', app()->getLocale()))

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.home'))

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="row pg-none">
            <div class="col-lg-7">
                <div class="text-sub-header">
                    <h2> {{ __('models.about_the') }} </h2>
                    <h4>{{ getSetting('main_name', app()->getLocale()) }}</h4>
                    {!! getSetting('about', app()->getLocale()) !!}
                    <a href="{{ route('site.about') }}" class="ctm-btn"> {{ __('models.know_more') }}</a>
                </div>
            </div>


            <div class="col-lg-5">
                <div class="main-sub-header">
                    <div class="img-sub-header">
                        <img src="{{ asset('storage/' . getSetting('main_image')) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end  sub-header  -->
@endsection

@section('content')
    <!-- start app ====
                    ===============================
                    ================================
                    ==============
                    -->
    <main id="app">

        <!-- start books index === -->
        <section class="books-index mr-section">
            <div class="main-container">
                <div class="title-start">
                    <h2> {{ __('models.most_important_literature') }} </h2>
                </div>

                <div class="main-books-index">
                    <div class="owl-carousel owl-theme maincarousel" id="slider_1">

                        @foreach ($books as $book)
                            <div class="item">
                                <a href="{{ route('site.books.show', $book->id) }}">
                                    <div class="sub-book-index">
                                        <div class="img-book-index">
                                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                                        </div>
                                        <div class="text-books-index">
                                            <h2> {{ $book->title }} </h2>
                                            <ul>

                                                <li> {{ __('models.author') }} <span> {{ $book->author }}</span></li>
                                                <li> {{ __('models.publisher') }} <span> {{ $book->publisher }} </span>
                                                </li>
                                                <li> {{ __('models.edition') }} <span> {{ $book->edition }} </span></li>
                                                <li> {{ __('models.physical_desc') }} <span> {{ $book->physical_desc }}
                                                    </span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- end books index === -->

        <!-- start videos-index -->
        <section class="videos-index  mr-section">
            <div class="main-container">
                <div class="title-center">
                    <h2> {{ __('models.videos') }}</h2>
                </div>

                <div class="main-videos-index">
                    <div class="row">

                        @foreach ($videos as $video)
                            <div class="col-lg-4 col-md-6 col-sm-6 ">
                                <a href="videos-details.html">
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
                                            <p> {{ Str::limit($video->desc, 100) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- end videos-index -->



        <!-- start blog-index  -->
        <section class="blog-index">
            <div class="main-container">
                <div class="title-start">
                    <h2> {{ __('models.news') }} </h2>
                </div>

                <div class="main-blog-index">
                    <div class="owl-carousel owl-theme maincarousel" id="slider-blog">

                        @foreach ($articles as $article)
                            <div class="item">
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
                                                    <a href="{{ route('site.articles.show', $article->id) }}"
                                                        class="ctm-btn"> {{ __('models.read_article') }} </a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="main-img-blog-index">
                                                <div class="img-blog-index">
                                                    <img src="{{ asset('storage/' . $article->image) }}"
                                                        alt="{{ $article->title }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- end blog-index  -->



    </main>

    <!-- end app ====
                                                            =============================
                                                            ==================================
                                                            ==================== -->
@endsection
