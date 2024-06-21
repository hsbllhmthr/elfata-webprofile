@if(Auth::user())
    @can('portfolio check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @if (count($recent_portfolios) > 0)
                    <section class="recent-project-wrapper fix pt-0 section-padding">
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
                            <div class="rp-title">
                                <h2 class="mtm-5">{{ __('frontend.recent_projects') }}</h2>
                            </div>

                            <div class="recent-project-carousel">
                               @foreach ($recent_portfolios as $item)
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
                                    <div class="single-project-card">
                                        @if (!empty($item->section_image))
                                            <a href="{{ asset('uploads/img/portfolio/'.$item->section_image) }}" class="project-thumb bg-cover popup-link" style="background-image: url({{ asset('uploads/img/portfolio/'.$item->section_image) }})"></a>
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
                                @endforeach
                                @unset ($item)
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="recent-project-wrapper fix pt-0 section-padding">
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
                            <div class="rp-title">
                                <h2 class="mtm-5">Recent Projects</h2>
                            </div>

                            <div class="recent-project-carousel">
                                <div class="single-project-card">
                                    <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="project-thumb bg-cover popup-link" style="background-image: url({{ asset('uploads/img/dummy/420x400.webp') }})"></a>
                                    <div class="contents">
                                        <h5><a href="#">Work station</a></h5>
                                        <span>UI/UX Design</span>
                                    </div>
                                </div>
                                <div class="single-project-card">
                                    <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="project-thumb bg-cover popup-link" style="background-image: url({{ asset('uploads/img/dummy/420x400.webp') }})"></a>
                                    <div class="contents">
                                        <h5><a href="#">Flowers in vases</a></h5>
                                        <span>Photography</span>
                                    </div>
                                </div>
                                <div class="single-project-card">
                                    <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="project-thumb bg-cover popup-link" style="background-image: url({{ asset('uploads/img/dummy/420x400.webp') }})"></a>
                                    <div class="contents">
                                        <h5><a href="#">Creative art work</a></h5>
                                        <span>Branding</span>
                                    </div>
                                </div>
                                <div class="single-project-card">
                                    <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="project-thumb bg-cover popup-link" style="background-image: url({{ asset('uploads/img/dummy/420x400.webp') }})"></a>
                                    <div class="contents">
                                        <h5><a href="#">art design</a></h5>
                                        <span>Creative</span>
                                    </div>
                                </div>
                                <div class="single-project-card">
                                    <a href="{{ asset('uploads/img/dummy/420x400.webp') }}" class="project-thumb bg-cover popup-link" style="background-image: url({{ asset('uploads/img/dummy/420x400.webp') }})"></a>
                                    <div class="contents">
                                        <h5><a href="#">Open books</a></h5>
                                        <span>Creative</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                @endif

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

