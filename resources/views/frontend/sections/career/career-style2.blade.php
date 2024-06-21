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
                        @if (is_countable($careers_paginate_style) && count($careers_paginate_style) > 0)
                            <div class="row text-center text-lg-start">
                                @foreach ($careers_paginate_style as $item)
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
                                <div class="row mt-80">
                                    <div class="col-xl-12 justify-content-center">
                                        {{ $careers_paginate_style->links() }}
                                    </div>
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
