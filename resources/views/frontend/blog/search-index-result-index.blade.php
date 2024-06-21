@if(Auth::user())
    @can('blog check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @if (is_countable($blogs_paginate_style) && count($blogs_paginate_style) > 0)
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
                            <div class="row">
                                @foreach ($blogs_paginate_style as $blog)
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
                                                    <input type="hidden" name="single_id" value="{{ $blog->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="single-news-card wow fadeInUp">
                                            <div class="news-thumb bg-cover" style="@if (!empty($blog->section_image)) background-image: url('{{ asset('uploads/img/blog/thumbnail/'.$blog->section_image) }}'); @endif"></div>
                                            <div class="contents">
                                                <div class="post-meta d-flex">
                                                    <div class="post-cat">
                                                        <a href="">{{ $blog->category_name }}</a>
                                                    </div>
                                                    <div class="post-date">
                                                        <span>{{ Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</span>
                                                    </div>
                                                </div>
                                                <h4><a href="{{ route('default-blog-detail-show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h4>
                                                <p>{{ $blog->short_description }}</p>
                                                <a href="{{ route('default-blog-detail-show', ['slug' => $blog->slug]) }}" class="read-more-link">{{ __('frontend.read_more') }} <i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($blog)
                            </div>
                        </div>
                    </section>
                @else
                    <section class="news-wrapper section-padding fix">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="blog-sidebar-wrapper fw500">
                                        <div class="single-sidebar-wid search-box-widgets">
                                            <h5 class="inner-header-title mrb-15">{{ __('frontend.nothing_found') }}</h5>
                                            <form action="{{ route('default-blog-search-index') }}" method="POST">
                                                @csrf

                                                <input type="text" name="search" placeholder="{{ __('frontend.type_to_search') }}" required>
                                                <button type="submit"><i class="fal fa-search"></i></button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                @if(Auth::user())
                    @can('blog check')
            </div>
            <div class="easier-middle">
                @php
                    $modified_url = '/'
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
            </div>
        </div>
    @endcan
@endif
