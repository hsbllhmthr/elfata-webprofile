@if(Auth::user())
    @can('portfolio check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="portfolio-showcase-wrapper section-padding">
                    <div class="container">
                        @if(Auth::user())
                            @can('portfolio check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif
                        @isset ($portfolio_section_style1)
                            <div class="row">
                                <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                            <h2>@php echo html_entity_decode($portfolio_section_style1->title); @endphp</h2>
                                            <p>@php echo html_entity_decode($portfolio_section_style1->description); @endphp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                        <div class="block-contents">
                                            <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                                <h2>Awesome portfolio grow your business value</h2>
                                                <p>A Business Portfolio Accurately Describes The Strengths Of A Company & Helps The Company Utilize The Most Attractive.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset

                        @if (is_countable($portfolios_style1) && count($portfolios_style1) > 0)
                            <div class="row">
                                @foreach ($portfolios_style1 as $item)
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        @if(Auth::user())
                                            @can('portfolio check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="portfolio.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="portfolio-item-card">
                                            @if (!empty($item->section_image))
                                                <a href="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" class="d-block popup-link"><img src="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" alt="image"></a>
                                            @endif
                                            <div class="contents">
                                                @if (!empty($item->url))
                                                    <h5><a href="{{ $item->url }}">{{ $item->title }}</a></h5>
                                                @else
                                                    <h5><a href="{{ route('default-portfolio-detail-show', ['portfolio_slug' => $item->portfolio_slug]) }}">{{ $item->title }}</a></h5>
                                                @endif
                                                <span>{{ $item->category_name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        <div class="portfolio-item-card">
                                            <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="d-block popup-link"><img src="{{ asset('uploads/img/dummy/420x400.webp') }}" alt="image"></a>
                                            <div class="contents">
                                                <h5><a href="#">Creative art work</a></h5>
                                                <span>Branding</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        <div class="portfolio-item-card">
                                            <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="d-block popup-link"><img src="{{ asset('uploads/img/dummy/420x400.webp') }}" alt="image"></a>
                                            <div class="contents">
                                                <h5><a href="#">Flowers in vases</a></h5>
                                                <span>Photography</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        <div class="portfolio-item-card">
                                            <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="d-block popup-link"><img src="{{ asset('uploads/img/dummy/420x400.webp') }}" alt="image"></a>
                                            <div class="contents">
                                                <h5><a href="#">art design</a></h5>
                                                <span>Creative</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        <div class="portfolio-item-card">
                                            <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="d-block popup-link"><img src="{{ asset('uploads/img/dummy/420x400.webp') }}" alt="image"></a>
                                            <div class="contents">
                                                <h5><a href="#">Open books</a></h5>
                                                <span>Creative</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        <div class="portfolio-item-card">
                                            <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="d-block popup-link"><img src="{{ asset('uploads/img/dummy/420x400.webp') }}" alt="image"></a>
                                            <div class="contents">
                                                <h5><a href="#">Creative art work</a></h5>
                                                <span>Branding</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        <div class="portfolio-item-card">
                                            <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="d-block popup-link"><img src="{{ asset('uploads/img/dummy/420x400.webp') }}" alt="image"></a>
                                            <div class="contents">
                                                <h5><a href="#">Work station</a></h5>
                                                <span>UI/UX Design</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @isset ($portfolio_section_style1)
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="{{ $portfolio_section_style1->button_url }}" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">{{ $portfolio_section_style1->button_name }}</a>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">Get Started</a>
                                    </div>
                                </div>
                            @endif
                        @endisset
                    </div>
                </section>

                @if(Auth::user())
                    @can('portfolio check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="portfolio.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}</button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="portfolio.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_portfolio') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="portfolio.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fas fa-briefcase text-white"></i> {{ __('content.portfolio') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
