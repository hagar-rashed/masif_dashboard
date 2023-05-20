@extends('site.layouts.app')

@title(__('models.books'))

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.books'))

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ __('models.books') }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png" alt="">
            <span>{{ __('models.books') }} </span>
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
        <section class="books mr-section">
            <div class="main-container">
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
                                            <li> {{ __('models.publisher') }} <span> {{ $book->publisher }} </span></li>
                                            <li> {{ __('models.edition') }} <span> {{ $book->edition }} </span></li>
                                            <li> {{ __('models.physical_desc') }} <span> {{ $book->physical_desc }}
                                                </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach



                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>
                                {{ $books->links('vendor.pagination.default') }}
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
