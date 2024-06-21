@if(Auth::user())
    @can('blog check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="news-wrapper section-padding fix">
                    <div class="container">
                        @if(Auth::user())
                            @can('blog check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif
                        @if (is_countable($blogs_paginate_style) && count($blogs_paginate_style) > 0)
                            <div class="row">
                                @foreach ($blogs_paginate_style as $item)
                                    <div class="col-md-6 col-xl-4 col-12">
                                        @if(Auth::user())
                                            @can('blog check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="blog.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="single-news-card wow fadeInUp">
                                            <div class="news-thumb bg-cover" style="@if (!empty($item->section_image)) background-image: url('{{ asset('uploads/img/blog/thumbnail/'.$item->section_image) }}'); @endif"></div>
                                            <div class="contents">
                                                <div class="post-meta d-flex">
                                                    <div class="post-cat">
                                                        <a href="#">{{ $item->category_name }}</a>
                                                    </div>
                                                    <div class="post-date">
                                                        <span>{{ Carbon\Carbon::parse($item->created_at)->format('d.m.Y') }}</span>
                                                    </div>
                                                </div>
                                                <h4><a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h4>
                                                <p>{{ $item->short_description }}</p>
                                                <a href="{{ route('default-blog-detail-show', ['slug' => $item->slug]) }}" class="read-more-link">{{ __('frontend.read_more') }} <i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="row mt-80">
                                <div class="col-xl-12 justify-content-center">
                                    {{ $blogs_paginate_style->links() }}
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row">
                                <div class="col-md-6 col-xl-4 col-12">
                                    <div class="single-news-card wow fadeInUp">
                                        <div class="news-thumb bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/415x300.webp') }}');"></div>
                                        <div class="contents">
                                            <div class="post-meta d-flex">
                                                <div class="post-cat">
                                                    <a href="#">Sponsored</a>
                                                </div>
                                                <div class="post-date">
                                                    <span>Dec. 8, 2024</span>
                                                </div>
                                            </div>
                                            <h4><a href="#">What Is The Crypto Volatility Index (CVI)?</a></h4>
                                            <p>The Crypto Volatility Index (CVI) is a decentralized solution used as a benchmark to track...</p>
                                            <a href="#" class="read-more-link">read more <i class="icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 col-12">
                                    <div class="single-news-card wow fadeInUp" data-wow-delay=".2s">
                                        <div class="news-thumb bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/415x300.webp') }}');"></div>
                                        <div class="contents">
                                            <div class="post-meta d-flex">
                                                <div class="post-cat">
                                                    <a href="#">Business</a>
                                                </div>
                                                <div class="post-date">
                                                    <span>Nov. 4, 2024</span>
                                                </div>
                                            </div>
                                            <h4><a href="#">How SocialGood Is Offering 100% Crypto</a></h4>
                                            <p>SocialGood takes on wealth inequality by allowing shoppers to earn crypto assets on their online...</p>
                                            <a href="#" class="read-more-link">read more <i class="icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 col-12">
                                    <div class="single-news-card wow fadeInUp" data-wow-delay=".4s">
                                        <div class="news-thumb bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/415x300.webp') }}');"></div>
                                        <div class="contents">
                                            <div class="post-meta d-flex">
                                                <div class="post-cat">
                                                    <a href="#">Marketing</a>
                                                </div>
                                                <div class="post-date">
                                                    <span>Oct. 13, 2024</span>
                                                </div>
                                            </div>
                                            <h4><a href="#">S&P Index Funds launched as Crypto</a></h4>
                                            <p>Digital assets company Securitize has unveiled two tokenized funds in partnership...</p>
                                            <a href="#" class="read-more-link">read more <i class="icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endif
                    </div>
                </section>

                @if(Auth::user())
                    @can('blog check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="blog.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="blog.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_blog') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
