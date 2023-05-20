@extends('site.layouts.app')

@title(getSetting('main_name', app()->getLocale()))

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.about'))

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ __('models.about') }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png"
                alt="">
            <span>{{ __('models.about') }}</span>
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
        <section class="aboutus">
            <div class="main-container">
                <div class="text-aboutus mr-section">
                    <div class="title-center">
                        <h2>{{ __('models.about_him') }}</h2>
                    </div>
                    {!! getSetting('about', app()->getLocale()) !!}
                </div>
            </div>




            <div class="about-him mr-section">
                <div class="main-container">
                    <div class="title-center">
                        <h2> {{ __('models.talk') }} </h2>
                    </div>
                    <div class="owl-carousel owl-theme maincarousel" id="slider_him">

                        @foreach ($talks as $talk)
                            <div class="item">
                                <div class="text-about-him">
                                    <p>{{ $talk->desc }}</p>
                                    <h2> {{ $talk->name }} </h2>
                                    <span>{{ $talk->job_title }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="live-aboutus mr-section">
                <div class="main-container">
                    <div class="title-start">
                        <h2> {{ __('models.his_life') }} </h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="text-live-aboutus">
                                <ul>
                                    @foreach ($dataLife as $data)
                                        <li>{{ $data->desc }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="img-live-aboutus">
                                <div class="main-img-blog-index">
                                    <div class="img-blog-index">
                                        <img src="{{ asset('storage/' . getSetting('about_image')) }}"
                                            alt="{{ getSetting('main_name', app()->getLocale()) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="activity-aboutus">
                <div class="main-container">
                    <div class="title-start">
                        <h2>{{ __('models.his_activities') }}</h2>
                    </div>

                    <div class="text-activity-aboutus">
                        <ul>
                            @foreach ($activites as $activity)
                                <li>{{ $activity->desc }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


            <div class="important-work mr-section">
                <div class="main-container">
                    <div class="title-start">
                        <h2> {{ __('models.important_work') }}</h2>
                    </div>
                    <div class="row">

                        @foreach ($books as $book)
                            <div class="col-lg-6">
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


    </main>

    <!-- end app ====
                        =============================
                        ==================================
                        ==================== -->
@endsection
