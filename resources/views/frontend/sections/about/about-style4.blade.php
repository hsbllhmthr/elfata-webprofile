@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($about_section_style4)
                    <section class="content-block section-padding">
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
                                <div class="col-lg-5 mb-3 mb-lg-0  pe-lg-0 col-12">
                                    <div class="animated-img-wrapper">
                                        @if (!empty($about_section_style4->section_image))
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style4->section_image) }}" alt="image">
                                        @endif
                                        @if (!empty($about_section_style4->section_image_2))
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style4->section_image_2) }}" alt="image">
                                        @endif
                                        @if (!empty($about_section_style4->section_image_3))
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style4->section_image_3) }}" alt="image">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1 mt-5 mt-lg-0 col-12 ps-lg-5 pe-lg-5">
                                    <div class="block-contents ms-xl-3">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>@php echo html_entity_decode($about_section_style4->title); @endphp</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">@php echo html_entity_decode($about_section_style4->description); @endphp</p>
                                        @if (!empty($about_section_style4->item))
                                            @php
                                                $str = $about_section_style4->item;
                                                $array_items = explode(",",$str);
                                            @endphp
                                            <ul class="checked-list">
                                                @foreach ($array_items as $item)
                                                    <li class="wow fadeInUp" data-wow-delay=".5s">{{ $item }}</li>
                                                @endforeach
                                                @unset ($item)
                                            </ul>
                                        @endif
                                        @if(!empty($about_section_style4->button_name))
                                            <a href="{{ $about_section_style4->button_url }}" class="theme-btn second-color mt-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">{{ $about_section_style4->button_name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="content-block section-padding">
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
                                <div class="col-lg-5 mb-3 mb-lg-0  pe-lg-0 col-12">
                                    <div class="animated-img-wrapper">
                                        <img src="{{ asset('uploads/img/dummy/545x455.webp') }}" alt="image">
                                        <img src="{{ asset('uploads/img/dummy/185x180.webp') }}" alt="image">
                                        <img src="{{ asset('uploads/img/dummy/240x240.webp') }}" alt="image">
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1 mt-5 mt-lg-0 col-12 ps-lg-5 pe-lg-5">
                                    <div class="block-contents ms-xl-3">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>Manage data & get instant outgrowth</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Xmoze is a simple software that allows you to run your business easily. One software tool brings success.</p>
                                        <ul class="checked-list">
                                            <li class="wow fadeInUp" data-wow-delay=".5s">Calculate input output results easily</li>
                                            <li class="wow fadeInUp" data-wow-delay=".7s">Prevent waste and increase income</li>
                                            <li class="wow fadeInUp" data-wow-delay=".9s">Calculate stocks easily & plan for the future</li>
                                        </ul>
                                        <a href="#" class="theme-btn second-color mt-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">Get Started</a>
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
                    <input type="hidden" name="style" value="style4">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
