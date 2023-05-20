@extends('site.layouts.app')

@title($article->title)

@description(isset($article->seo->desc) ? Str::limit($article->seo->desc, 160) : Str::limit($article->desc, 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', $article->title)

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ __('models.news') }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png"
                alt="">
            <a href="{{ route('site.articles.index') }}"> {{ __('models.news') }} </a> <img
                src="{{ url('site') }}/images/arrow-1.png" alt="">
            <span>{{ $article->title }} </span>
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
        <section class="blog-details mr-section">
            <div class="main-container">
                <div class="sub-blog-index">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="text-blog-index">
                                <h2>{{ $article->title }}</h2>
                                <h4> <img src="{{ url('site') }}/images/share-alt.png" alt="">
                                    {{ $article->date }}
                                </h4>
                                <p>
                                    {{ $article->desc }}
                                </p>

                                <div class="share-blog">
                                    <div class="title-start">
                                        <h2>{{ __('models.share') }}</h2>
                                    </div>


                                    {!! $share !!}
                                    {{--
                                    <ul>
                                        <li><a href=""> <i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href=""> <i class="fab fa-twitter"></i> </a></li>
                                        <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href=""> <i class="fab fa-telegram-plane"></i></a></li>
                                        <li><a href=""> <i class="fab fa-instagram"></i></a></li>
                                    </ul> --}}
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="main-img-blog-index">
                                <div class="img-blog-index">
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>
        <!-- end blog  -->

    </main>

    <!-- end app ====
            =============================
            ==================================
            ==================== -->

    @push('js')
        <script src="{{ asset('js/share.js') }}"></script>
    @endpush
@endsection
