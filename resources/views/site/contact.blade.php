@extends('site.layouts.app')

@title(getSetting('main_name', app()->getLocale()))

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.contact_us'))

@section('sub-header')
    <!-- start sub-header  -->
    <div class="sub-header">
        <div class="title-pages">
            <h1>{{ __('models.contact_us') }}</h1>
        </div>
        <div class="navigation-header">
            <a href="{{ route('site.home') }}"> {{ __('models.home') }} </a> <img src="{{ url('site') }}/images/arrow-1.png" alt="">
            <span>{{ __('models.contact_us') }}</span>
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

        <section class="contactus">
            <div class="main-container">
                <form action="{{ route('site.contact.sendContact') }}" method="POST" id="contactForm">
                    @csrf
                    <p>
                        {{ __('models.contact_desc') }}
                    </p>


                    <div class="input-form">
                        <label for=""> {{ __('models.fullname') }} </label>
                        <input type="text" class="form-control" placeholder=" {{ __('models.enter_fullname') }} " name="fullname">
                    </div>
                    <div class="input-form">
                        <label for="">{{ __('models.phone') }}</label>
                        <input type="tel" class="form-control" placeholder="{{ __('models.enter_phone') }}" name="phone">
                    </div>
                    <div class="input-form">
                        <label for="">{{ __('models.email') }}</label>
                        <input type="email" class="form-control" placeholder="{{ __('models.enter_email') }}" name="email">
                    </div>
                    <div class="input-form">
                        <label for="">{{ __('models.message') }} </label>
                        <textarea name="message" id="" cols="" rows="" class="form-control"
                            placeholder="{{ __('models.enter_message') }}"></textarea>
                    </div>

                    <div class="btn-contactus">
                        <button class="ctm-btn"> {{ __('models.send') }} </button>
                    </div>
                </form>
            </div>
        </section>



    </main>

    <!-- end app ====
            =============================
            ==================================
            ==================== -->

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"
            integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_ar.min.js"></script>

        <script src="{{ url('site') }}/js/custom/contactForm.js"></script>
    @endpush
@endsection
