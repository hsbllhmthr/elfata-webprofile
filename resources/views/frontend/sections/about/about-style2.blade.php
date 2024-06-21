@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="promo-content-block fix section-padding section-bg">
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
                        <div class="row">
                            @isset ($about_section_style2)
                                <div class="col-xl-6 col-12">
                                    <div class="video-cta">
                                        @if (!empty($about_section_style2->section_image))
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style2->section_image) }}" alt="about image">
                                        @endif
                                        @if ($about_section_style2->video_type == 'youtube')
                                            <div class="video-play-btn">
                                                <a href="{{ $about_section_style2->video_url }}" class="popup-video play-video"><i class="icon-play"></i></a>
                                            </div>
                                        @else
                                            <div class="video-play-btn">
                                                <a href="{{ $about_section_style2->video_url }}" class="play-video"><i class="icon-play"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-xl-6 col-12">
                                        <div class="video-cta">
                                            <img src="{{ asset('uploads/img/dummy/705x475.webp') }}" alt="about image">
                                            <div class="video-play-btn">
                                                <a href="https://www.youtube.com/watch?v=E1xkXZs0cAQ" class="popup-video play-video"><i class="icon-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset
                            <div class="col-xl-6 col-12 ps-xl-5 mt-5 mt-xl-0 ">
                                @isset ($about_section_style2)
                                    <div class="block-contents">
                                        <div class="section-title mb-4">
                                            <h2 class="wow fadeInUp">@php echo html_entity_decode($about_section_style2->title); @endphp</h2>
                                            <p class="wow fadeInUp pt-15" data-wow-delay=".3s">@php echo html_entity_decode($about_section_style2->description); @endphp</p>
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="block-contents">
                                            <div class="section-title mb-4">
                                                <h2 class="wow fadeInUp">A software for easy business monitoring</h2>
                                                <p class="wow fadeInUp pt-15" data-wow-delay=".3s">It is a software in which you can easily control and monitor the whole business. Xmoz is an easy way to manage your business.</p>
                                            </div>
                                        </div>
                                    @endif
                                @endisset
                                @if (is_countable($about_section_counters_style2) && count($about_section_counters_style2) > 0)
                                    <div class="funfacts d-flex">
                                        @foreach ($about_section_counters_style2 as $item)
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="about.edit_counter">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="single-funfact wow fadeInUp" data-wow-delay=".5s">
                                                <h3><span>{{ $item->counter }}</span>{{ $item->extra_text }}</h3>
                                                <p>@php echo html_entity_decode($item->title); @endphp</p>
                                            </div>
                                        @endforeach
                                        @unset ($item)
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="funfacts d-flex">
                                            <div class="single-funfact wow fadeInUp" data-wow-delay=".5s">
                                                <h3><span>250</span>+</h3>
                                                <p>Happy clients</p>
                                            </div>
                                            <div class="single-funfact wow fadeInUp" data-wow-delay=".8s">
                                                <h3><span>99</span>%</h3>
                                                <p>Customer satisfaction</p>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @isset ($about_section_style2)
                                    @if(!empty($about_section_style2->button_name))
                                        <a href="{{ $about_section_style2->button_url }}" class="theme-btn second-color mt-30 wow fadeInUp" data-wow-delay="1s">{{ $about_section_style2->button_name }}</a>
                                    @endif
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <a href="#" class="theme-btn second-color mt-30 wow fadeInUp" data-wow-delay="1s">Discover More</a>
                                    @endif
                                @endisset
                            </div>
                        </div>
                    </div>
                </section>

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
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
