<!-- start header =====
        ============ -->
<header class="header active {{ Route::currentRouteName() != 'site.home' ? 'header-pages' : '' }}" id="scroll-1">

    <!-- start top-par -->
    <div class="top-par">
        <div class="main-container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="element">
                        <ul>
                            <li><a href="{{ route('site.home') }}">{{ __('models.home') }} </a></li>
                            <li><a href="{{ route('site.about') }}"> {{ __('models.about') }} </a></li>
                            <li><a href="{{ route('site.books.index') }}">{{ __('models.books') }}</a></li>
                            <li><a href="{{ route('site.videos.index') }}"> {{ __('models.videos') }} </a></li>
                            <li><a href="{{ route('site.articles.index') }}">{{ __('models.news') }}</a></li>
                            <li><a href="{{ route('site.contact') }}">{{ __('models.contact_us') }} </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2  col-md-6">
                    <div class="icons-top-ber">
                        <ul>
                            <li>
                                <a href="" data-toggle="modal" data-target=".bd-example-modal-lg"> <img
                                        src="{{ url('site') }}/images/icon1.png" alt=""></a>
                            </li>
                            <li>

                                @if (App::getLocale() == 'ar')
                                    <a href="{{ route('language', 'en') }}">
                                        EN
                                    </a>
                                @else
                                    <a href="{{ route('language', 'ar') }}">
                                        عربى
                                    </a>
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="menu-div">
                <div class="content" id="times-ican">
                    <a href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end top-par -->


    @yield('sub-header')


</header>
<!-- end header =====
        ============== -->
