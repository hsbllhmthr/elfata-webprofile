@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @if (isset($about_section_style7) || (is_countable($about_section_features_style7) && count($about_section_features_style7)) > 0)
                    <section class="promo-content-block fix section-padding">
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
                                <div class="col-xl-6 col-12">
                                    <div class="video-cta">
                                        @if (!empty($about_section_style7->section_image))
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style7->section_image) }}" alt="about image">
                                        @endif
                                        @if ($about_section_style7->video_type == 'youtube')
                                            <div class="video-play-btn">
                                                <a href="{{ $about_section_style7->video_url }}" class="popup-video play-video"><i class="icon-play"></i></a>
                                            </div>
                                        @else
                                            <div class="video-play-btn">
                                                <a href="{{ $about_section_style7->video_url }}" class="play-video"><i class="icon-play"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 ps-xl-5 mt-5 mt-xl-0 ">
                                    <div class="block-contents ms-xl-5">
                                        <div class="section-title mb-4">
                                            <h2 class="wow fadeInUp">@php echo html_entity_decode($about_section_style7->title); @endphp</h2>
                                            <p class="wow fadeInUp pt-15" data-wow-delay=".3s">@php echo html_entity_decode($about_section_style7->description); @endphp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           @if (is_countable($about_section_features_style7) && count($about_section_features_style7) > 0)
                                <div class="row section-padding mtm-30 d-flex justify-content-between pb-0">
                                    @foreach ($about_section_features_style7 as $item)
                                        <div class="col-xxl-3 col-xl-4 col-md-6 @if (!$loop->first) offset-xxl-1 ps-xl-0 @endif">
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="about.edit_feature">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="single-about-features">
                                                @if ($item->type == 'image')
                                                   @if (!empty($item->section_image))
                                                        <div class="icon">
                                                            <img src="{{ asset('uploads/img/about/'.$item->section_image) }}" alt="feature icon">
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="icon">
                                                       <i class="{{ $item->icon }} custom-size-80"></i>
                                                    </div>
                                                @endif
                                                <div class="content">
                                                    <h3>@php echo html_entity_decode($item->title); @endphp</h3>
                                                    <p>@php echo html_entity_decode($item->description); @endphp</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @unset ($item)
                                </div>
                            @endif
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="promo-content-block fix section-padding">
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
                                <div class="col-xl-6 col-12">
                                    <div class="video-cta">
                                        <img src="{{ asset('uploads/img/dummy/705x475.webp') }}" alt="about image">
                                        <div class="video-play-btn">
                                            <a href="https://www.youtube.com/watch?v=E1xkXZs0cAQ" class="popup-video play-video"><i class="icon-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 ps-xl-5 mt-5 mt-xl-0 ">
                                    <div class="block-contents ms-xl-5">
                                        <div class="section-title mb-4">
                                            <h2 class="wow fadeInUp">The story behind how our company was founded</h2>
                                            <p class="wow fadeInUp pt-15" data-wow-delay=".3s">It is our experience that equips us, our emotions that drive us, and our creativity that sets us apart.</p>
                                            <p class="mt-3">
                                                To help keep our clients focused on the complex modern marketing world, we create digital integrated campaigns. We believe that small businesses create the most unique attractive and meaningful place to work.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row section-padding mtm-30 d-flex justify-content-between pb-0">
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="single-about-features">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/64x64.jpg') }}" alt="feature icon">
                                        </div>
                                        <div class="content">
                                            <h3>Creative Thinking</h3>
                                            <p>Creative thinking is the ability to consider something in a new way.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 offset-xxl-1 col-md-6 ps-xl-0">
                                    <div class="single-about-features">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/64x64.jpg') }}" alt="feature icon">
                                        </div>
                                        <div class="content">
                                            <h3>Skilled Team</h3>
                                            <p>We have a skilled team. Those who work through their own experience</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 offset-xxl-1 col-md-6 ps-xl-0">
                                    <div class="single-about-features">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/64x64.jpg') }}" alt="feature icon">
                                        </div>
                                        <div class="content">
                                            <h3>Maximum Service</h3>
                                            <p>Maximum service has been in the creative industry for over 30 years.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                @endif

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
                    <input type="hidden" name="style" value="style7">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
