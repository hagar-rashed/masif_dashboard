<header class="header active">
    <div class="top-par">
        <div class="main-container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="element">
                        <ul>
                            <li><a href="{{ route('site.home') }}"> الرئيسية</a></li>
                            <li><a href="aboutus.html"> من نحن </a></li>
                            <li><a href="solutions.html">حلول</a></li>
                            <li><a href="sectors.html">قطاعات</a></li>
                            <li><a href="partners.html">شركاء</a></li>
                            <li><a href="clients.html">عملاء</a></li>
                            <li><a href="jobs.html">وظائف</a></li>
                            <li><a href="news.html">الاخبار </a></li>
                            <li><a href="contactus.html">اتصل بنا</a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="language">
                        <a href=""> العربية <i class="bi bi-caret-down-fill"></i></a>
                        <div class="dropdowm-language">
                            <ul>
                                <li> <a href="">عربي</a></li>
                                <li> <a href=""> English </a></li>
                            </ul>
                        </div>
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
</header>
