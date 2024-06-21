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
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_countable($portfolio_count_categories) && count($portfolio_count_categories) > 0)
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="{{ url($page_builder->page_uri) }}" class="current mb-2">{{ __('frontend.all') }}</a>
                                        @foreach ($portfolio_count_categories as $portfolio_count_category)
                                            @if (isset($portfolio_count_category->portfolio_category->portfolio_category_slug))
                                                <a class="mb-2" href="{{ route('default-portfolio-category-index', $portfolio_count_category->portfolio_category->portfolio_category_slug) }}">{{$portfolio_count_category->portfolio_category->category_name }} ({{ $portfolio_count_category->category_count }})</a>
                                            @endif
                                        @endforeach
                                        @unset ($portfolio_count_category)
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="text-center mb-5 custom-category-link">
                                            <a href="#" class="link-dark">Creative</a>
                                            <a href="#" class="link-secondary">Business</a>
                                            <a href="#" class="link-secondary">UI / UX Design</a>
                                            <a href="#" class="link-secondary">Marketing</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        @if (is_countable($portfolios_paginate_style) && count($portfolios_paginate_style) > 0)
                            <div class="row">
                                @foreach ($portfolios_paginate_style as $item)
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

                                    <div class="row mt-80">
                                        <div class="col-xl-12 justify-content-center">
                                            {{ $portfolios_paginate_style->links() }}
                                        </div>
                                    </div>

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
