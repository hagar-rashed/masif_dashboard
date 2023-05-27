@extends('site.layouts.app')

@title('New Cairo')

@description(Str::limit(getSetting('about', app()->getLocale()), 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', __('models.solutions'))

@section('content')
    <section class="solutions">
        <div class="main-container">

            @foreach ($solutions as $solution)
                <div class="sub-solutions sub-aboutus">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="text-aboutus">
                                <h2 class="title-start1">{{ $solution->name }}</h2>
                                <p>
                                    {{ $solution->desc }}
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="img-aboutus">
                                <object data="{{ asset('storage/' . $solution->image) }}" type="">
                                    <img src="{{ asset('storage/' . $solution->image) }}" alt="">
                                </object>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="sub-solutions sub-aboutus">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus">
                            <h2 class="title-start1">شبكة البيانات "سلبية ونشطة"</h2>
                            <p>نحن نقدم كابلات البنية التحتية لشبكة البيانات لمكونات DN النشطة ليتم دمجها مع
                                جميع أنظمة التيار الخفيف من خلال توفير الملصقات وتركيبها وربطها. </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img-aboutus">
                            <object data="svg/h-3.svg" type="">
                                <img src="svg/h-3.svg" alt="">
                            </object>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-solutions sub-aboutus">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus">
                            <h2 class="title-start1">نظام كاميرات المراقبة CCTV</h2>
                            <p>لقد قمنا بتطوير حلول الدوائر التلفزيونية المغلقة المتكاملة من البداية إلى النهاية
                                ، مع التركيز على توفير نظام إدارة أمن موحد وموحد لضمان الأمن والمراقبة أيضًا BMA
                                (تطبيقات إدارة المباني) التي يمكن الوصول إليها بسهولة من منصة واحدة.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img-aboutus">
                            <object data="svg/h-5.svg" type="">
                                <img src="svg/h-5.svg" alt="">
                            </object>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-solutions sub-aboutus">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus">
                            <h2 class="title-start1">نظام هاتف PBX و IP</h2>
                            <p>دمج PBX القديم الخاص بك مع VOIP PBX للاستفادة من ميزة VOIP بسهولة وتحقيق اتصال
                                فعال من حيث التكلفة من خلال الاستفادة من المعدات الموجودة وإضافة المزيد من
                                الامتدادات وسهولة التركيب والإدارة.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img-aboutus">
                            <object data="svg/h-4.svg" type="">
                                <img src="svg/h-4.svg" alt="">
                            </object>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-solutions sub-aboutus">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus">
                            <h2 class="title-start1">نظام الإذاعه الداخليه</h2>
                            <p>نحن التاجر المشهور والمورد لمجموعة عالية الجودة من العلامات التجارية الدولية
                                المختلفة مع القدرة على التكامل مع BMA أخرى. نحن نقدم أنظمة مخاطبة عامة مصممة
                                لتكون قوية وتفي باحتياجات تعزيز الصوت لديك. معدات PA سهلة الاستخدام وسهلة
                                التشغيل. أيضا ، نحن نقدم دعم العملاء على نطاق واسع.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img-aboutus">
                            <object data="svg/h-7.svg" type="">
                                <img src="svg/h-7.svg" alt="">
                            </object>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-solutions sub-aboutus">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus">
                            <h2 class="title-start1">SMARTV / IPTV</h2>
                            <p>نحن نقدم منصة تطبيقات فريدة ومخصصة للتطبيقات التفاعلية لمدمجي الأنظمة والتي تتيح
                                تسليم مجموعة واسعة من التطبيقات المخصصة.
                                يمكن لـ SMATV الذي يجعل جميع الشاشات في بناء المجتمع أن يشارك هوائي القمر
                                الصناعي المثبت مما يلغي الحاجة إلى واحد منفصل لكل مستخدم. يسمح لك بتخصيص برامجك
                                وفقًا لاحتياجات ورغبات جمهورك.
                                كما أصبح نظام IPTV أكثر شعبية في الفنادق والعقارات التجارية الحديثة. يتم تقديم
                                خدمات التلفزيون الرقمي عبر الإنترنت باستخدام بروتوكول الإنترنت.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img-aboutus">
                            <object data="svg/h-2.svg" type="">
                                <img src="svg/h-2.svg" alt="">
                            </object>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-solutions sub-aboutus">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-aboutus">
                            <h2 class="title-start1">انظمة حماية</h2>
                            <p>نحن نقدم جودة عالية لأجهزة الكشف عن المعادن بأفضل الأسعار المعتمدة للمعدات
                                المصنعه لنظام الأمان للشركات ، من أجل أمان عالي الفعالية يمكن استخدامها مع
                                (بوابة للكشف عن المعادن وكاشف معادن يدوي).</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img-aboutus">
                            <object data="svg/h-1.svg" type="">
                                <img src="svg/h-1.svg" alt="">
                            </object>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    @include('site.includes.clients')

@endsection
