@if(Auth::user())
    @can('career check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="services-wrapper fix section-padding">
                    <div class="container">
                        @if(Auth::user())
                            @can('career check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif
                            @isset ($career_section_style1)
                                <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                            <h2>@php echo html_entity_decode($career_section_style1->section_title); @endphp</h2>
                                            <p>@php echo html_entity_decode($career_section_style1->title); @endphp</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                        <div class="block-contents">
                                            <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                                <h2>Careers</h2>
                                                <p>Our Careers</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset

                            @if (is_countable($careers_style1) && count($careers_style1) > 0)
                                <div class="row text-center text-lg-start">
                                    @foreach ($careers_style1 as $item)
                                        <div class="col-md-6 col-xl-4 col-12">
                                            @if(Auth::user())
                                                @can('career check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="career.edit">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="service-box-item">
                                                @if ($item->type == 'image')
                                                    @if (!empty($item->section_image))
                                                        <div class="icon">
                                                            <img src="{{ asset('uploads/img/career/'.$item->section_image) }}" alt="icon image">
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="icon">
                                                        <i class="{{ $item->icon }} custom-font-size-64"></i>
                                                    </div>
                                                @endif
                                                <div class="content">
                                                    <h4>{{ $item->title }} <sup>{{ $item->category_name }}</sup></h4>
                                                    <p>{{ $item->short_description }}</p>
                                                    @if (!empty($item->button_name))
                                                        <a href=" {{ $item->button_url }}"> {{ $item->button_name }} <i class="far fa-chevron-right"></i></a>
                                                    @else
                                                        <a href="{{ route('default-career-detail-show', $item->career_slug) }}">{{ __('frontend.view_details') }} <i class="far fa-chevron-right"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @unset ($item)
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="row text-center text-lg-start">
                                        <div class="col-md-6 col-xl-4 col-12">
                                            <div class="service-box-item">
                                                <div class="icon">
                                                    <img src="{{ asset('uploads/img/dummy/icons/block-chain.svg') }}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>Automated Reports</h4>
                                                    <p>Many desktop publishing packages and web page editors now use as their default model</p>
                                                    <a href="#">View Details <i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 col-12">
                                            <div class="service-box-item">
                                                <div class="icon">
                                                    <img src="{{ asset('uploads/img/dummy/icons/mukut.svg') }}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>User Journey Flow</h4>
                                                    <p>Many desktop publishing packages and web page editors now use as their default model</p>
                                                    <a href="#">View Details <i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 col-12">
                                            <div class="service-box-item">
                                                <div class="icon">
                                                    <img src="{{ asset('uploads/img/dummy/icons/secure.svg') }}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>Management & Security</h4>
                                                    <p>Many desktop publishing packages and web page editors now use as their default model</p>
                                                    <a href="#">View Details <i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 col-12">
                                            <div class="service-box-item">
                                                <div class="icon">
                                                    <img src="{{ asset('uploads/img/dummy/icons/marketing.svg') }}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>Digital Marketing</h4>
                                                    <p>Many desktop publishing packages and web page editors now use as their default model</p>
                                                    <a href="#">View Details <i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 col-12">
                                            <div class="service-box-item">
                                                <div class="icon">
                                                    <img src="{{ asset('uploads/img/dummy/icons/display.svg') }}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>Reporting & Analysis</h4>
                                                    <p>Many desktop publishing packages and web page editors now use as their default model</p>
                                                    <a href="#">View Details <i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-4 col-12">
                                            <div class="service-box-item">
                                                <div class="icon">
                                                    <img src="{{ asset('uploads/img/dummy/icons/micro.svg') }}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>Wireframe Creation</h4>
                                                    <p>Many desktop publishing packages and web page editors now use as their default model</p>
                                                    <a href="#">View Details <i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @isset ($career_section_style1)
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="{{ $career_section_style1->button_url }}" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">{{ $career_section_style1->button_name }}</a>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">Get Started</a>
                                    </div>
                                </div>
                            @endisset

                    </div>
                </section>

                @if(Auth::user())
                    @can('career check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="career.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="career.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_career') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
