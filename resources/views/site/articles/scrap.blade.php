@extends('site.layouts.app')

@title($scrap->desc)

@description(isset($scrap->seo->desc) ? Str::limit($scrap->seo->desc, 160) : Str::limit($scrap->desc, 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.scrap_details'))

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
            <span>{{ __('models.scrap_details') }} </span>
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
                                {{-- <h2></h2> --}}
                                <p>
                                    {{ $scrap->desc }}
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
                                <div class="img-s-index">
                                    <img src="{{ asset('storage/' . $scrap->image) }}"
                                        alt="{{ Str::limit($scrap->desc, 100) }}">
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
