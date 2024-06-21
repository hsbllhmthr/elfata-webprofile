@if ($page_builder->page_name == null && isset($blog))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $blog->title }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $blog->title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
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
                        <input type="hidden" name="route" value="blog.edit">
                        <input type="hidden" name="style" value="{{ $blog->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'portfolio-index' && isset($portfolio_section))

    @if(Auth::user())
        @can('portfolio check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        @isset ($portfolio_section)
                                            <h1>{{ $portfolio_section->breadcrumb_title }}</h1>
                                        @else
                                            <h1>{{ __('content.our_portfolios') }}</h1>
                                        @endisset
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            @isset ($portfolio_section)
                                                @php
                                                    $str = $portfolio_section->breadcrumb_item;
                                                    $array_items = explode(",",$str);
                                                @endphp
                                                @foreach ($array_items as $item)
                                                    @if (!$loop->last)
                                                        <li class="breadcrumb-item">@php echo html_entity_decode($item); @endphp</li>
                                                    @else
                                                        <li class="breadcrumb-item text-white active" aria-current="page">@php echo html_entity_decode($item); @endphp</li>
                                                    @endif
                                                @endforeach
                                                @unset($item)
                                            @else
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                                <li class="breadcrumb-item text-white active" aria-current="page">{{ __('content.our_portfolios') }}</li>
                                            @endisset
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
                    </div>
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
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'portfolio-detail-show' && isset($portfolio))

    @if(Auth::user())
        @can('service check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $portfolio->title }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $portfolio->title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
                    </div>
                    @if(Auth::user())
                        @can('service check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="portfolio.edit">
                        <input type="hidden" name="style" value="{{ $portfolio->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-index' && isset($blog_section))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        @isset ($blog_section)
                                            <h1>{{ $blog_section->breadcrumb_title }}</h1>
                                        @else
                                            <h1>{{ __('content.our_blogs') }}</h1>
                                        @endisset
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            @isset ($blog_section)
                                                @php
                                                    $str = $blog_section->breadcrumb_item;
                                                    $array_items = explode(",",$str);
                                                @endphp
                                                @foreach ($array_items as $item)
                                                    @if (!$loop->last)
                                                        <li class="breadcrumb-item">@php echo html_entity_decode($item); @endphp</li>
                                                    @else
                                                        <li class="breadcrumb-item text-white active" aria-current="page">@php echo html_entity_decode($item); @endphp</li>
                                                    @endif
                                                @endforeach
                                                @unset($item)
                                            @else
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                                <li class="breadcrumb-item text-white active" aria-current="page">{{ __('content.our_blogs') }}</li>
                                            @endisset
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
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
                        <input type="hidden" name="route" value="blog.index">
                        <input type="hidden" name="style" value="">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-category-index' && isset($category))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $category->category_name }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $category->category_name }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
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
                        <button type="submit" class="custom-btn text-white"><i class="fa fa-edit text-white"></i> {{ __('content.categories') }}</button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-tag-index' && isset($tag_name))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $tag_name }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $tag_name }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
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
                        <input type="hidden" name="route" value="blog.index">
                        <input type="hidden" name="style" value="">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white"><i class="fa fa-edit text-white"></i> {{ __('content.blogs') }}</button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'service-index' && isset($service))

    @if(Auth::user())
        @can('page builder check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $service->title }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $service->title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
                    </div>
                    @if(Auth::user())
                        @can('page builder check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'service-detail-show' && isset($service))

    @if(Auth::user())
        @can('service check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $service->title }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $service->title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
                    </div>
                    @if(Auth::user())
                        @can('service check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="service.edit">
                        <input type="hidden" name="style" value="{{ $service->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@elseif ($page_builder->page_name == 'blog-detail-show' && isset($blog))

    @if(Auth::user())
        @can('blog check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $blog->title }}</h1>
                                    </div>
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $blog->title }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
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
                        <input type="hidden" name="route" value="blog.edit">
                        <input type="hidden" name="style" value="{{ $blog->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@else

    @if(Auth::user())
        @can('page builder check')
            <div class="easier-mode">
                <div class="easier-section-area">
                    @endcan
                    @endif
                    <div class="page-banner-wrap bg-cover text-capitalize">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6 ps-xl-0 pe-xl-0 offset-xl-3 col-lg-8 offset-lg-2 text-center text-white">
                                    <div class="page-heading">
                                        <h1>{{ $page_builder->breadcrumb_title }}</h1>
                                    </div>
                                    @php
                                        $str = $page_builder->breadcrumb_item;
                                        $array_items = explode(",",$str);
                                    @endphp
                                    <nav class="justify-content-center">
                                        <ol class="breadcrumb custom-breadcrumb">
                                            @foreach ($array_items as $item)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">@php echo html_entity_decode($item); @endphp</li>
                                                @else
                                                    <li class="breadcrumb-item text-white active" aria-current="page">@php echo html_entity_decode($item); @endphp</li>
                                                @endif
                                            @endforeach
                                            @unset($item)
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="page-banner-shape">
                                <img src="{{ asset('uploads/img/dummy/icons/banner-shape.png') }}" alt="shape icon">
                            </div>
                        </div>
                    </div>
                    @if(Auth::user())
                        @can('page builder check')
                </div>
                <div class="easier-middle">
                    @php
                        $url = request()->path();
                        $modified_url = str_replace('/', '-bracket-', $url);
                    @endphp
                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="route" value="page-builder.edit">
                        <input type="hidden" name="style" value="{{ $page_builder->id }}">
                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                        <button type="submit" class="custom-btn text-white">
                            <i class="fa fa-edit text-white"></i> {{ __('content.edit_breadcrumb_and_page_seo') }}
                        </button>
                    </form>
                </div>
            </div>
        @endcan
    @endif

@endif
