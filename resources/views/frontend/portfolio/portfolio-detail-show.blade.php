<section class="project-details-wrapper section-padding">
    <div class="container">
        <div class="row align-items-center">

            @if(Auth::user())
                @can('portfolio check')
                    <div class="easier-mode">
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
                        <div class="easier-section-area">
                            @endcan
                            @endif

                            @if (is_countable($portfolio_images) && count($portfolio_images) > 0)
                                    <div class="col-xl-7 col-12 ">
                                        <div class="project-gallery me-xl-2">
                                            @foreach($portfolio_images as $item)
                                                <div class="single-portfolio-slide bg-cover" style="background-image: url({{ asset('uploads/img/portfolio/image/'.$item->section_image) }})"></div>
                                            @endforeach
                                            @unset ($item)
                                        </div>
                                    </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-xl-7 col-12 ">
                                        <div class="project-gallery me-xl-2">
                                            <div class="single-portfolio-slide bg-cover" style="background-image: url({{ asset('uploads/img/dummy/900x600.webp') }})"></div>
                                            <div class="single-portfolio-slide bg-cover" style="background-image: url({{ asset('uploads/img/dummy/900x600.webp') }})"></div>
                                            <div class="single-portfolio-slide bg-cover" style="background-image: url({{ asset('uploads/img/dummy/900x600.webp') }})"></div>
                                        </div>
                                    </div>
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
                                <input type="hidden" name="route" value="portfolio-image.create">
                                <input type="hidden" name="style" value="{{ $portfolio->id }}">
                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                <button type="submit" class="custom-btn text-white me-2 mb-2">
                                    <i class="fa fa-edit text-white"></i> {{ __('content.add_portfolio_image') }}
                                </button>
                            </form>

                        </div>
                    </div>
                @endcan
            @endif

            <div class="col-xl-5 col-12 mt-5 pe-xl-0 mt-xl-0">
                <div class="project-details-content">

                    @if(Auth::user())
                        @can('portfolio check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    @isset ($portfolio_content)
                                        <p class="mt-3">@php echo html_entity_decode($portfolio_content->description); @endphp</p>
                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <h3>About our creative art project</h3>
                                            <p class="mt-3">A creative work is a manifestationa creative effort including fine artwork (sculpture, paintings, drawing, sketching, performance art), dance, writing (literature), filmmaking, & great composition.</p>
                                            <p class="mt-3">By engaging in art activities, children practice a variety of skills and progress in all areas of development. Creative art helps to children grow in physical, social, cognitive, and emotional build development. Children also practice imagination and Put up an art ideas bulletin boardexperimentation as they invent.</p>
                                        @endif
                                    @endisset

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
                                        <input type="hidden" name="route" value="portfolio-content.create">
                                        <input type="hidden" name="style" value="{{ $portfolio->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_portfolio_content') }}
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endcan
                    @endif

                    @if(Auth::user())
                        @can('portfolio check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    @if (is_countable($portfolio_details) && count($portfolio_details) > 0)
                                        <ul>
                                            @foreach($portfolio_details as $item)
                                                @if(Auth::user())
                                                    @can('portfolio check')
                                                        <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                            @csrf
                                                            <input type="hidden" name="route" value="portfolio-detail.edit">
                                                            <input type="hidden" name="style" value="">
                                                            <input type="hidden" name="portfolio_id" value="{{ $portfolio->id }}">
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                            <button type="submit" class="me-2 custom-pure-button">
                                                                <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                @endif
                                                <li><b>{{ $item->title }}</b> <span>{{ $item->description }}</span></li>
                                            @endforeach
                                            @unset ($item)
                                        </ul>
                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <ul>
                                                <li><b>Client:</b> <span>Classic art Industries</span></li>
                                                <li><b>Category:</b> <span>Web Design</span></li>
                                                <li><b>Duration:</b> <span>1 Weeks</span></li>
                                            </ul>
                                        @endif
                                    @endif

                                    <div class="project-share d-flex align-items-center">
                                        <div class="title-heading"><b>{{ __('frontend.share_on') }}</b></div>
                                        <div class="share-links">
                                            <div style="display: none;" id="hiddenURLDiv"></div>
                                            <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link fa-facebook-f"></i></a>
                                        </div>
                                    </div>

                                    @isset ($portfolio_detail_section)
                                        @if (!empty($portfolio_detail_section->button_name))
                                            <div class="project-demo-btn mt-30">
                                                <a href="{{ $portfolio_detail_section->button_url }}" class="theme-btn">{{ $portfolio_detail_section->button_name }}</a>
                                            </div>
                                        @endif
                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="project-demo-btn mt-30">
                                            <a href="#" class="theme-btn">Visit Website</a>
                                        </div>
                                        @endif
                                    @endisset

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
                                        <input type="hidden" name="route" value="portfolio-detail.create">
                                        <input type="hidden" name="style" value="{{ $portfolio->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2 mb-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_portfolio_detail') }}
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endcan
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
