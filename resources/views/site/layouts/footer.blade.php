<!-- start footer ==============================
        ============================== -->
<footer>
    <div class="footer">
        <div class="main-container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo-footer">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('storage/' . getSetting('footer_logo')) }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="element-footer">
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

                <div class="col-lg-1">
                    <a href="#scroll-1" id="scroll">
                        <div class="arrow-top">
                            <img src="{{ url('site') }}/images/arrow2.png" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="main-container">
        <div class="end-page">
            <a href="https://jaadara.com/">
                {{ __('models.made_with') }}
                <i class="bi bi-heart-fill"></i>
                {{ __('models.jadara') }}
            </a>
            <p>
                {{ __('models.all_rights') }}
                <script>
                    document.write(new Date().getFullYear())
                </script>
                {{ __('models.reserved_to') . ' ' . getSetting('main_name', app()->getLocale()) }}
            </p>
        </div>
    </div>

</footer>
<!-- end footer=========================
        ===========================  -->






</div>



<!-- search  -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="search_header">
                <form action="">
                    <div class="input-search">
                        <input type="text" placeholder="{{ __('models.search') }}" id="input_search"
                            data-url="{{ route('site.search') }}" name="search" class="form-control">
                        <button> <i class="bi bi-search"></i> </button>
                    </div>
                </form>

                <div class="details_search" style="display: none;">
                    <ul id="search_result">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>









<!-- start menu responsive ===
        ======== -->
<div class="bg_menu ">
</div>
<div class="menu_responsive" id="menu-div">

    <div class="element_menu_responsive">
        <ul>
            <li><a href="{{ route('site.home') }}">{{ __('models.home') }} </a></li>
            <li><a href="{{ route('site.about') }}"> {{ __('models.about') }} </a></li>
            <li><a href="{{ route('site.books.index') }}">{{ __('models.books') }}</a></li>
            <li><a href="{{ route('site.videos.index') }}"> {{ __('models.videos') }} </a></li>
            <li><a href="{{ route('site.articles.index') }}">{{ __('models.news') }}</a></li>
            <li><a href="{{ route('site.contact') }}">{{ __('models.contact_us') }} </a></li>
            <li> <a class="click-dropdown-mune" href=""> {{ __('models.lang') }}</a> </li>
        </ul>
    </div>

    <div class="dropdowm-language-mune">
        <ul>
            <li>
                <a href="{{ route('language', 'ar') }}">
                    عربى
                </a>
            </li>
            <li>
                <a href="{{ route('language', 'en') }}">
                    English
                </a>
            </li>
        </ul>
    </div>

    <div class="remove-mune">
        <span></span>
    </div>


</div>

<!-- end menu responsive ===
        ======== -->

</div>

@include('site.layouts.script')



</body>
<!-- end-body
=================== -->

</html>
