<div class="blog-details-wrapper section-padding mtm-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-12 pe-xl-5">
                <div class="blog-content">

                    @if(Auth::user())
                        @can('blog check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    @isset ($blog)
                                        @if (!empty($blog->section_image_2))
                                            <img src="{{ asset('uploads/img/blog/'.$blog->section_image_2) }}" alt="blog image">
                                        @endif

                                        <div class="post-meta d-flex">
                                            <div class="post-cat">
                                                <a href="#">{{ $blog->category_name }}</a>
                                            </div>
                                            <div class="post-date">
                                                <span>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM') }}. {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }}, {{ Carbon\Carbon::parse($blog->created_at)->format('Y') }}</span>
                                            </div>
                                        </div>

                                        <p class="mt-4">@php echo html_entity_decode($blog->description); @endphp</p>

                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <img src="{{ asset('uploads/img/dummy/820x500.webp') }}" alt="blog image">

                                            <div class="post-meta d-flex">
                                                <div class="post-cat">
                                                    <a href="#">Sponsored</a>
                                                </div>
                                                <div class="post-date">
                                                    <span>Dec. 8, 2024</span>
                                                </div>
                                            </div>

                                            <h3 class="pt-md-4">The Crypto Volatility Index (CVI) is a decentralized solution used as a benchmark to track the volatility from cryptocurrency option prices and the overall crypto market. </h3>
                                            <p class="mt-4">For those who are not familiar with the term, the VIX is an index that measures volatility in the stock market based on the implied volatility of S&P 500 Index options; it’s also referred to as the “Market Fear Index.”</p>
                                            <p class="mt-4 mb-4">In a similar way, the CVI helps users track and trade the 30-day implied volatility of Ether (ETH) Bitcoin (BTC) by using the Black-Scholes options pricing model  foster an index that fluctuates between 0 and 200. Black-Scholes is a pricing model used to determine the fair price or theoretical value for a call or a put option based on six variables volatility type of optiont & underlying stock pricing and risk-free  rate.</p>

                                            <h4>What Does the Platform Hold for the Future?</h4>
                                            <p class="mt-4">Along with the recent migration from USDT to USDC and a recent integration with investing.com, the founders of CVI have announced the implementation of new and exciting features for the protocoler.</p>
                                            <p class="mt-4">The first, is the launch of volatility tokens via CVOL (Crypto vola & ETHVOL (Ethereum Volatility token). These tokens can be understood as being a wrapper for opening a long position on CVI and a tradable on Ethereum compatible DEXs. The tokens maintain their peg to the value of the underlying following a rebase mechanism with a similar architecture to that of tokens like Ampleforth. The volatility tokens can be used to benefit from arbitrage trading strategies on other compatible DEXs.</p>
                                            <blockquote>
                                                <p>“Learning how cryptocurrency works is like learning a new language. It is incredibly difficult at the beginning, but once it clicks it will stick with you forever.”</p>
                                                <cite>― Olawale Daniel</cite>
                                            </blockquote>
                                        @endif
                                    @endisset

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
                                        <input type="hidden" name="route" value="blog.edit">
                                        <input type="hidden" name="style" value="{{ $blog->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_blog') }}
                                        </button>
                                    </form>

                                </div>

                            </div>
                        @endcan
                    @endif

                    @if(Auth::user())
                        @can('blog check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    @if (is_countable($blog_images) && count($blog_images) > 0)
                                        @foreach ($blog_images as $blog_image)
                                            @if(Auth::user())
                                                @can('blog check')
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="blog-image.edit">
                                                        <input type="hidden" name="style" value="">
                                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                        <input type="hidden" name="id" value="{{ $blog_image->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <img src="{{ asset('uploads/img/blog/image/'.$blog_image->section_image) }}" class="@if (!$loop->last) me-lg-3 @endif" alt="blog image">
                                        @endforeach
                                        @unset($blog_image)
                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <img src="{{ asset('uploads/img/dummy/385x280.webp') }}" class="me-lg-3" alt="blog image">
                                            <img src="{{ asset('uploads/img/dummy/385x280.webp') }}" alt="blog image">
                                        @endif
                                    @endif

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
                                        <input type="hidden" name="route" value="blog-image.create">
                                        <input type="hidden" name="style" value="{{ $blog->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_blog_image') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endcan
                    @endif

                    @if(Auth::user())
                        @can('blog check')
                            <div class="easier-mode">
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
                                <div class="easier-section-area">
                                    @endcan
                                    @endif

                                    @if (is_countable($blog_details) && count($blog_details) > 0)
                                        <ul>
                                            @foreach ($blog_details as $blog_detail)
                                                @if(Auth::user())
                                                    @can('blog check')
                                                        <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                            @csrf
                                                            <input type="hidden" name="route" value="blog-detail.edit">
                                                            <input type="hidden" name="style" value="">
                                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                            <input type="hidden" name="id" value="{{ $blog_detail->id }}">
                                                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                            <button type="submit" class="me-2 custom-pure-button">
                                                                <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                @endif
                                                <li>{{ $blog_detail->description }}</li>
                                            @endforeach
                                            @unset($blog_detail)
                                        </ul>
                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <ul>
                                                <li>The Index allows DeFi users to either hedge against or profit from volatility in the crypto market.</li>
                                                <li>The index functions as a crypto version of the VIX (The S&P 500 Volatility Index), a real-time for market index representing the market's expectations for volatility forover the coming 30 days.</li>
                                                <li>COTI is the project behind the development and deployment of the CVI, which has at launched a decentralized trading system that enables a permissionless way to & positions on the index.</li>
                                            </ul>
                                        @endif
                                    @endif

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
                                        <input type="hidden" name="route" value="blog-detail.create">
                                        <input type="hidden" name="style" value="{{ $blog->id }}">
                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                        <button type="submit" class="custom-btn text-white me-2">
                                            <i class="fa fa-edit text-white"></i> {{ __('content.add_blog_detail') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endcan
                    @endif

                </div>

                @if (isset($previous) || isset($next))
                    <div class="related-post-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-xl-4 col-12">
                                @isset ($previous)
                                    <div class="single-related-post">
                                        <p><i class="icon-arrow-left me-1"></i> {{ __('frontend.prev_post') }}</p>
                                        <a href="{{ route('default-blog-detail-show', ['slug' => $previous->slug]) }}">{{ $previous->title }}</a>
                                    </div>
                                @endisset
                            </div>

                            <div class="col-md-6 col-xl-4 mt-md-0 mt-4 offset-xl-4 col-12 text-md-end">
                                @isset ($next)
                                    <div class="single-related-post">
                                        <p>{{ __('frontend.next_post') }} <i class="icon-arrow-right me-1"></i></p>
                                        <a href="{{ route('default-blog-detail-show', ['slug' => $next->slug]) }}">{{ $next->title }}</a>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                @endif

                <div class="share-post-wrapper d-flex justify-content-between align-items-center">
                    <div class="share-title">
                        <h5 class="mb-0">{{ __('frontend.copy_link_and_share') }}</h5>
                    </div>

                    <div class="share-links">
                        <div style="display: none;" id="hiddenURLDiv"></div>
                        <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link fa-facebook-f"></i></a>
                    </div>
                </div>



            </div>
            <div class="col-xl-4 col-12">
                <div class="blog-sidebar-wrapper fw500">
                    <div class="single-sidebar-wid search-box-widgets">
                        <form action="{{ route('default-blog-search-index') }}" method="POST">
                            @csrf

                            <input type="text" name="search" placeholder="{{ __('frontend.type_to_search') }}" required>
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>

                    <div class="single-sidebar-wid">
                        @if(Auth::user())
                            @can('blog check')
                                <div class="easier-mode">
                                    <div class="easier-section-area">
                                        @endcan
                                        @endif

                                        <div class="wid-title">
                                            <h5>{{ __('frontend.categories') }}</h5>
                                        </div>
                                        <div class="widget_categories">
                                            <ul>
                                                @foreach ($blog_count_categories as $blog_count_category)
                                                    @if (isset($blog_count_category->category->category_slug))
                                                        <li><a href="{{ route('default-blog-category-index', $blog_count_category->category->category_slug) }}">{{$blog_count_category->category->category_name }} ({{ $blog_count_category->category_count }})</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

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
                                            <input type="hidden" name="route" value="blog-category.create">
                                            <input type="hidden" name="style" value="">
                                            <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                            <button type="submit" class="custom-btn text-white me-2">
                                                <i class="fa fa-edit text-white"></i> {{ __('content.add_blog_category') }}
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @endcan
                        @endif
                    </div>

                    @if (count($recent_posts) > 0)
                        <div class="single-sidebar-wid">
                            <div class="wid-title">
                                <h5>{{ __('frontend.recent_posts') }}</h5>
                            </div>
                            <div class="recent-posts">
                                @foreach ($recent_posts as $recent_post)
                                    <div class="single-post-item">
                                        <a href="{{ route('default-blog-detail-show', ['slug' => $recent_post->slug]) }}">{{ $recent_post->title }}</a>
                                        <span>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMM') }}. {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }}, {{ Carbon\Carbon::parse($recent_post->created_at)->format('Y') }}</span>
                                    </div>
                                @endforeach
                                @unset ($recent_post)
                            </div>
                        </div>
                    @endif

                    @if (!empty($blog->tag))
                        @php
                            $str = $blog->tag;
                            $array_tags = explode(",",$str);
                        @endphp
                        <div class="single-sidebar-wid">
                            <div class="wid-title">
                                <h5>{{ __('frontend.tags') }}</h5>
                            </div>
                            <div class="tagcloud">
                                @foreach ($array_tags as $tag)
                                    <a href="{{ route('default-blog-tag-index', $tag) }}">{{ $tag }}</a>
                                @endforeach
                                @unset ($tag)
                            </div>
                        </div>
                    @endif

                </div>

                @isset ($fixed_page_setting)
                    @if ($fixed_page_setting->subscribe_section == 'enable')
                        @include('frontend.sections.subscribe.subscribe-style2')
                    @endif
                @else
                    @include('frontend.sections.subscribe.subscribe-style2')
                @endisset

            </div>
        </div>
    </div>
</div>
