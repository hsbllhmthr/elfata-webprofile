@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($banner_style2)
                    <section class="hero-welcome-wrapper hero-2">
                        <div class="single-slide text-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 text-center text-xl-start col-12">
                                        @if(Auth::user())
                                            @can('section check')
                                                <!-- hover effect for mobile devices  -->
                                                <div class="click-icon d-md-none text-center">
                                                    <button class="custom-btn text-white">
                                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                                    </button>
                                                </div>
                                            @endcan
                                        @endif
                                        <div class="hero-contents">
                                            <h1>@php echo html_entity_decode($banner_style2->title); @endphp</h1>
                                            <p>@php echo html_entity_decode($banner_style2->description); @endphp</p>
                                            @if (!empty($banner_style2->button_name))
                                                <a href="{{ $banner_style2->button_url }}" class="theme-btn red-color">{{ $banner_style2->button_name }}</a>
                                            @endif
                                            @if (!empty($banner_style2->button_name_2))
                                                <a href="{{ $banner_style2->button_url_2 }}" class="theme-btn minimal-btn">{{ $banner_style2->button_name_2 }}</a>
                                            @endif
                                            @if (!empty($banner_style2->button_name_3))
                                                <a href="{{ $banner_style2->button_url_3 }}" class="theme-btn minimal-btn">{{ $banner_style2->button_name_3 }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-12 text-center text-xl-end">
                                        <div class="hero-img-wrapper">
                                            @if (!empty($banner_style2->section_image))
                                                <img src="{{ asset('uploads/img/banner/'.$banner_style2->section_image) }}" alt="banner image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-lines">
                                <img src="{{ asset('uploads/img/dummy/icons/hero-line.png') }}" alt="icon image">
                                <img src="{{ asset('uploads/img/dummy/icons/hero-white-line.png') }}" alt="icon image">
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="hero-welcome-wrapper hero-2">
                        <div class="single-slide text-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 text-center text-xl-start col-12">
                                        <div class="hero-contents">
                                            @if(Auth::user())
                                                @can('section check')
                                                    <!-- hover effect for mobile devices  -->
                                                    <div class="click-icon d-md-none text-center">
                                                        <button class="custom-btn text-white">
                                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                                        </button>
                                                    </div>
                                                @endcan
                                            @endif
                                            <h1>Manage your business on a new system</h1>
                                            <p>Advanced software for managing your business. Through which business can be controlled very easily as required.</p>
                                            <a href="#" class="theme-btn red-color">Start Free Trial</a>
                                            <a href="#" class="theme-btn minimal-btn">Learn More</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-12 text-center text-xl-end">
                                        <div class="hero-img-wrapper">
                                            <img src="{{ asset('uploads/img/dummy/710x725.webp') }}" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-lines">
                                <img src="{{ asset('uploads/img/dummy/icons/hero-line.png') }}" alt="icon image">
                                <img src="{{ asset('uploads/img/dummy/icons/hero-white-line.png') }}" alt="icon image">
                            </div>
                        </div>
                    </section>
                    @endif
                @endisset

                @if(Auth::user())
                    @can('section check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="banner.create">
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_banner') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
