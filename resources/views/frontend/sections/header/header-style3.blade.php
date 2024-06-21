<header class="header-1 style-2">

    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-2 col-sm-5 col-md-4 col-6">
                @if(Auth::user())
                    <div class="easier-mode">
                        <div class="easier-section-area">
                            @endif
                            <div class="logo">
                                @if (!empty($header_image_style3->section_image))
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('uploads/img/general/'.$header_image_style3->section_image) }}" alt="logo icon">
                                    </a>
                                @else
                                    <a href="#">
                                        <img src="{{ asset('uploads/img/dummy/your-logo.jpg') }}" alt="logo icon">
                                    </a>
                                @endif
                            </div>
                            @if(Auth::user())
                        </div>
                        <div class="easier-middle">
                            @can('setting check')
                                @php
                                    $url = request()->path();
                                    $modified_url = str_replace('/', '-bracket-', $url);
                                @endphp
                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="route" value="header-image.create">
                                    <input type="hidden" name="style" value="style3">
                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                    <button type="submit" class="custom-btn text-white"><i class="fa fa-edit text-white"></i> {{ __('content.logo') }}</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-10 text-end p-lg-0 d-none d-lg-flex justify-content-between align-items-center">
                @if(Auth::user())
                    @can('menu check')
                        <div class="easier-mode">
                            <div class="easier-section-area">
                                @endcan
                                @endif
                                <div class="menu-wrap">
                                    <div class="main-menu">
                                        <ul>
                                            @if (is_countable($menus) && count($menus) > 0)
                                                @foreach ($menus as $menu)
                                                    <li><a href="@if (!empty($menu->uri)) @if ((session()->has('language_name_from_dropdown') && $language->language_code == session()->get('language_code_from_dropdown')) || !session()->has('language_name_from_dropdown') ) {{ url($menu->uri) }} @elseif (session()->has('language_name_from_dropdown')) {{ url($menu->uri) }} @endif  @elseif (!empty($menu->url)) {{ $menu->url }} @else # @endif">{{ $menu->menu_name }}</a>
                                                        @if ($menu->submenus->count() > 0)
                                                            <ul class="sub-menu">
                                                                @foreach ($menu->submenus as $submenu)
                                                                    <li><a href="@if (!empty($submenu->uri)) @if ((session()->has('language_name_from_dropdown') && $language->language_code == session()->get('language_code_from_dropdown')) || !session()->has('language_name_from_dropdown') ) {{ url($submenu->uri) }} @elseif (session()->has('language_name_from_dropdown')) {{ url($submenu->uri) }} @endif  @elseif (!empty($submenu->url)) {{ $submenu->url }} @else # @endif">{{ $submenu->submenu_name }}</a></li>
                                                                @endforeach
                                                                @unset($submenu)
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                @unset($menu)

                                            @else
                                                <li><a href="#">demos</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Home 1</a></li>
                                                        <li><a href="#">Home 2</a></li>
                                                        <li><a href="#">Home 3</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">About</a> </li>
                                                <li><a href="#">Services</a></li>
                                                <li><a href="#">Pages</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">faq</a></li>
                                                        <li><a href="#">team</a></li>
                                                        <li><a href="#">portfolio</a></li>
                                                        <li><a href="#">pricing</a></li>
                                                        <li><a href="#">404</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">News</a></li>
                                                <li><a href="#">Contact</a></li>
                                            @endif
                                                @if (is_countable($display_dropdowns) && count($display_dropdowns) > 0)
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp

                                                    <li><a href="#">@if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif</a>
                                                        <ul class="sub-menu">
                                                            @foreach ($display_dropdowns as $display_dropdown)
                                                                <li><a href="{{ url('language/set-locale/'.$display_dropdown->id.'/'.$modified_url) }}">{{ $display_dropdown->language_name }}</a></li>
                                                            @endforeach
                                                            @unset ($display_dropdown)
                                                        </ul>
                                                    </li>
                                                @endif

                                        </ul>
                                    </div>
                                </div>
                                @if(Auth::user())
                            </div>
                            <div class="easier-middle">
                                @can('menu check')
                                    @php
                                        $url = request()->path();
                                        $modified_url = str_replace('/', '-bracket-', $url);
                                    @endphp
                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="route" value="menu.create">
                                        <input type="hidden" name="style" value="">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white">
                                            <i class="fa fa-plus text-white"></i> {{ __('content.menu') }}
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @endif
                    @if(Auth::user())
                        @can('setting check')
                            <div class="easier-mode">
                                <div class="easier-section-area">
                                    @endcan
                                    @endif
                                    <div class="header-right-element">
                                        @isset($external_url)
                                            @if (!empty($external_url->button_name))
                                                <a href="{{ $external_url->button_url }}" class="theme-btn black">{{ $external_url->button_name }}</a>
                                            @endif
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <a href="#" class="theme-btn bg-color">get started</a>
                                            @endif
                                        @endisset
                                    </div>
                                    @if(Auth::user())
                                </div>
                                <div class="easier-middle">
                                    @can('setting check')
                                        @php
                                            $url = request()->path();
                                            $modified_url = str_replace('/', '-bracket-', $url);
                                        @endphp
                                        <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                            @csrf
                                            <input type="hidden" name="route" value="external-url.create">
                                            <input type="hidden" name="style" value="">
                                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                            <button type="submit" class="custom-btn text-white">
                                                <i class="fa fa-plus text-white"></i> {{ __('content.external_url') }}
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endif
            </div>
            <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                <div class="mobile-nav-wrap">
                    <div id="hamburger"><i class="fal fa-bars"></i></div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav">
                            <i class="fal fa-times-circle"></i>
                        </button>
                        <nav class="sidebar-nav">
                            @if(Auth::user())
                                @can('menu check')
                                    <div class="easier-mode">
                                        <div class="easier-section-area">
                                            @endcan
                                            @endif
                                            <ul class="metismenu" id="mobile-menu">
                                                @if (is_countable($menus) && count($menus) > 0)
                                                    @foreach ($menus as $menu)
                                                        <li><a @if ($menu->submenus->count() > 0) class="has-arrow"  @endif href="@if (!empty($menu->uri)) @if ((session()->has('language_name_from_dropdown') && $language->language_code == session()->get('language_code_from_dropdown')) || !session()->has('language_name_from_dropdown') ) {{ url($menu->uri) }} @elseif (session()->has('language_name_from_dropdown')) {{ url($menu->uri) }} @endif  @elseif (!empty($menu->url)) {{ $menu->url }} @else # @endif">{{ $menu->menu_name }}</a>
                                                            @if ($menu->submenus->count() > 0)
                                                                <ul class="sub-menu">
                                                                    @foreach ($menu->submenus as $submenu)
                                                                        <li><a href="@if (!empty($submenu->uri)) @if ((session()->has('language_name_from_dropdown') && $language->language_code == session()->get('language_code_from_dropdown')) || !session()->has('language_name_from_dropdown') ) {{ url($submenu->uri) }} @elseif (session()->has('language_name_from_dropdown')) {{ url($submenu->uri) }} @endif  @elseif (!empty($submenu->url)) {{ $submenu->url }} @else # @endif">{{ $submenu->submenu_name }}</a></li>
                                                                    @endforeach
                                                                    @unset($submenu)
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                    @unset($menu)
                                                        @if (is_countable($display_dropdowns) && count($display_dropdowns) > 0)
                                                            @php
                                                                $url = request()->path();
                                                                $modified_url = str_replace('/', '-bracket-', $url);
                                                            @endphp
                                                            <li><a class="has-arrow" href="#">@if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif</a>
                                                                <ul class="sub-menu">
                                                                    @foreach ($display_dropdowns as $display_dropdown)
                                                                        <li><a href="{{ url('language/set-locale/'.$display_dropdown->id.'/'.$modified_url) }}">{{ $display_dropdown->language_name }}</a></li>
                                                                    @endforeach
                                                                    @unset ($display_dropdown)
                                                                </ul>
                                                            </li>
                                                        @endif

                                                @else
                                                    <li><a class="has-arrow" href="#">Homes</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="#">Homepage 1</a></li>
                                                            <li><a href="#">Homepage 2</a></li>
                                                            <li><a href="#">Homepage 3</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">about</a></li>
                                                    <li><a href="#">services</a></li>
                                                    <li>
                                                        <a class="has-arrow" href="#">Pages</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="#">faq</a></li>
                                                            <li><a href="#">team</a></li>
                                                            <li><a href="#">portfolio</a></li>
                                                            <li><a href="#">pricing</a></li>
                                                            <li><a href="#">404</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">News</a></li>
                                                    <li><a href="#">Contact</a></li>
                                                @endif
                                            </ul>
                                            @if(Auth::user())
                                        </div>
                                        <div class="easier-middle">
                                            @can('menu check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="menu.create">
                                                    <input type="hidden" name="style" value="">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="custom-btn text-white">
                                                        <i class="fa fa-plus text-white"></i> {{ __('content.menu') }}
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                @endif
                                @if(Auth::user())
                                    @can('setting check')
                                        <div class="easier-mode">
                                            <div class="easier-section-area">
                                                @endcan
                                                @endif
                                                @isset($external_url)
                                                    @if (!empty($external_url->button_name))
                                                        <a href="{{ $external_url->button_url }}" class="theme-btn d-block mt-4 text-center ms-0">{{ $external_url->button_name }}</a>
                                                    @endif
                                                @else
                                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                    <a href="#" class="theme-btn d-block mt-4 text-center ms-0">get started</a>
                                                    @endif
                                                @endisset
                                                @if(Auth::user())
                                            </div>
                                            <div class="easier-middle">
                                                @can('setting check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="external-url.create">
                                                        <input type="hidden" name="style" value="">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="custom-btn text-white">
                                                            <i class="fa fa-plus text-white"></i> {{ __('content.external_url') }}
                                                        </button>
                                                    </form>
                                    @endcan
                        </nav>
                    </div>
                    @endif
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</header>

