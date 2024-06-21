@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($banner_style1)
                    <section class="hero-welcome-wrapper hero-1">
                        <div class="single-slide text-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7 col-12 col-lg-10 offset-lg-1 offset-xl-0">
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
                                            <h1>@php echo html_entity_decode($banner_style1->title); @endphp</h1>
                                            <p>@php echo html_entity_decode($banner_style1->description); @endphp</p>
                                            @if (!empty($banner_style1->button_image))
                                                <a href="{{ $banner_style1->button_image_url }}" class="app-download-btn"><img src="{{ asset('uploads/img/banner/'.$banner_style1->button_image) }}" alt="button image"></a>
                                            @endif
                                            @if (!empty($banner_style1->button_image_2))
                                                <a href="{{ $banner_style1->button_image_url_2 }}" class="app-download-btn"><img src="{{ asset('uploads/img/banner/'.$banner_style1->button_image_2) }}" alt="button image"></a>
                                            @endif
                                            @if (!empty($banner_style1->button_image_3))
                                                <a href="{{ $banner_style1->button_image_url_3 }}" class="app-download-btn"><img src="{{ asset('uploads/img/banner/'.$banner_style1->button_image_3) }}" alt="button image"></a>
                                            @endif
                                            <div class="tri-arrow">
                                                <img src="{{ asset('uploads/img/dummy/icons/tir-shape.svg') }}" alt="icon image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-12 text-xl-end col-lg-10 offset-lg-1 offset-xl-0">
                                        <div class="hero-mobile mt-5 mt-xl-0">
                                            @if (!empty($banner_style1->section_image))
                                                <img src="{{ asset('uploads/img/banner/'.$banner_style1->section_image) }}" alt="image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="hero-welcome-wrapper hero-1">
                        <div class="single-slide text-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7 col-12 col-lg-10 offset-lg-1 offset-xl-0">
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
                                            <h1>Secure solutions for digital assets and money easily</h1>
                                            <p>The easiest, safest and fastest app for cryptocurrency. banks for international money transfers and online money transfer services considered the safest way.</p>
                                            <a href="#" class="app-download-btn"><img src="{{ asset('uploads/img/dummy/apple.png') }}" alt="button image"></a>
                                            <a href="#" class="app-download-btn"><img src="{{ asset('uploads/img/dummy/android.png') }}" alt="button image"></a>
                                            <div class="tri-arrow">
                                                <img src="{{ asset('uploads/img/dummy/icons/tir-shape.svg') }}" alt="icon image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-12 text-xl-end col-lg-10 offset-lg-1 offset-xl-0">
                                        <div class="hero-mobile mt-5 mt-xl-0">
                                            <img src="{{ asset('uploads/img/dummy/445x685.webp') }}" alt="image">
                                        </div>
                                    </div>
                                </div>
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
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_banner') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
