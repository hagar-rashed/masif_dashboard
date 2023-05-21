<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('storage/' . getSetting('logo')) }}" width="150px" alt="">
                </a>

            </li>

        </ul>
    </div>
    <div class="divider"></div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ isActiveRoute('admin.home') }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.home') }}"><i class="fa-solid fa-house"></i><span
                        class="menu-title text-truncate">{{ __('models.home') }}</span></a>
            </li>
        </ul>

        {{-- articles --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.articles.index', 'admin.articles.create', 'admin.articles.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.articles.index') }}"><i
                        class="fa-solid fa-newspaper"></i><span
                        class="menu-title text-truncate">{{ __('models.news') }}</span></a>
            </li>
        </ul>

        {{-- services --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.services.index', 'admin.services.create', 'admin.services.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.services.index') }}"><i
                        class="fa-solid fa-bookmark"></i><span
                        class="menu-title text-truncate">{{ __('models.services') }}</span></a>
            </li>
        </ul>

        {{-- videos --}}
        {{-- <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.videos.index', 'admin.videos.create', 'admin.videos.edit', 'admin.videos.show']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.videos.index') }}"><i
                        class="fa-solid fa-video"></i><span class="menu-title text-truncate">{{ __('models.videos') }}</span></a>
            </li>
        </ul> --}}

        {{-- contacts --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ areActiveRoutes(['admin.contacts.index', 'admin.contacts.show']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.contacts.index') }}"><i
                        class="fa-solid fa-inbox"></i><span
                        class="menu-title text-truncate">{{ __('models.contact_msgs') }}</span></a>
            </li>
        </ul>

        {{-- settings --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ isActiveRoute('admin.settings.edit') }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.settings.edit') }}"><i class="fa-solid fa-gear"></i><span
                        class="menu-title text-truncate">{{ __('models.settings') }}</span></a>
            </li>
        </ul>

    </div>
</div>
<!-- END: Main Menu-->
