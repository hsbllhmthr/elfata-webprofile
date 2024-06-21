@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($about_section_style1)
                    <section class="content-block section-padding section-bg">
                        <div class="container">
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
                            <div class="row align-items-center">
                                @if (!empty($about_section_style1->section_image))
                                    <div class="col-xl-5 pe-lg-0 col-lg-5 col-12">
                                        <div class="block-img wow fadeInLeft" data-wow-duration="1.1s">
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style1->section_image) }}" alt="about image">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-6 col-lg-7 offset-xl-1 col-12 ps-lg-5 pe-xl-5">
                                    <div class="block-contents ms-xl-3 mt-5 mt-lg-0">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                            <h2>@php echo html_entity_decode($about_section_style1->title); @endphp</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">@php echo html_entity_decode($about_section_style1->description); @endphp</p>
                                        @if(!empty($about_section_style1->button_name))
                                            <a href="{{ $about_section_style1->button_url }}" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">{{ $about_section_style1->button_name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="content-block section-padding section-bg">
                        <div class="container">
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
                            <div class="row align-items-center">
                                <div class="col-xl-5 pe-lg-0 col-lg-5 col-12">
                                    <div class="block-img wow fadeInLeft" data-wow-duration="1.1s">
                                        <img src="{{ asset('uploads/img/dummy/540x570.webp') }}" alt="about image">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7 offset-xl-1 col-12 ps-lg-5 pe-xl-5">
                                    <div class="block-contents ms-xl-3 mt-5 mt-lg-0">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                            <h2>Earn interest from your crypto assets</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">The most popular crypto app of today. In which you can easily get convenient interest on sending & receiving money.</p>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">As this guide explains, investing in cryptocurrency comes with a ton of benefits. You do want to make sure you vet a currency before investing in it.</p>
                                        <a href="#" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">Get Started</a>
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
                    <input type="hidden" name="route" value="about.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
