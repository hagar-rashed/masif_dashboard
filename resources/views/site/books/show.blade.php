@extends('site.layouts.app')

@title($book->title)

@description(isset($book->seo->desc) ? Str::limit($book->seo->desc, 160) : Str::limit($book->desc, 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', $book->title)

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ $book->title }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png"
                alt="">
            <span> <a href="{{ route('site.books.index') }}"> {{ __('models.books') }} </a> <img
                    src="{{ url('site') }}/images/arrow-1.png" alt=""> <span></span>
                {{ $book->title }} </span>
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

        <!-- start books-details -->
        <section class="books-details mr-section">
            <div class="main-container">
                <div class="sub-books-details">
                    <div class="sub-book-index">
                        <div class="img-book-index">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                        </div>
                        <div class="text-books-index">
                            <h2>{{ $book->title }}</h2>
                            <ul>

                                <li> {{ __('models.author') }} <span> {{ $book->author }}</span></li>
                                <li> {{ __('models.publisher') }} <span> {{ $book->publisher }} </span></li>
                                <li> {{ __('models.edition') }} <span> {{ $book->edition }} </span></li>
                                <li> {{ __('models.physical_desc') }} <span> {{ $book->physical_desc }}
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="text-books-details">
                    <div class="title-start">
                        <h2>{{ __('models.about_book') }}</h2>
                    </div>
                    <p>
                        {{ $book->desc }}
                    </p>


                    <div class="btn-books">
                        <a href="{{ route('site.books.downloadBook', $book->id) }}" class="ctm-btn">
                            {{ __('models.download_book') }} <img src="{{ url('site') }}/images/bn1.png" alt="">
                        </a>
                        <a href="{{ asset('storage/' . $book->file) }}" target="_blank" class="ctm-btn">
                            {{ __('models.read_book') }} <img src="{{ url('site') }}/images/bn2.png" alt=""></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end books-details -->

    </main>

    <!-- end app ====
                        =============================
                        ==================================
                        ==================== -->
@endsection
