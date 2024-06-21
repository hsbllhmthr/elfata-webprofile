@if(Auth::user())
    @can('gallery check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="portfolio-showcase-wrapper section-padding">
                    <div class="container">
                        @if(Auth::user())
                            @can('gallery check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif
                        @isset ($gallery_image_section_style1)
                            <div class="row">
                                <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                            <h2>@php echo html_entity_decode($gallery_image_section_style1->title); @endphp</h2>
                                            <p>@php echo html_entity_decode($gallery_image_section_style1->description); @endphp</p>
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
                                                <h2>Awesome images grow your business value</h2>
                                                <p>Xmoze is a simple software that allows you to run your business easily. One software tool brings the whole business together.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset

                        @if (is_countable($gallery_images_style1) && count($gallery_images_style1) > 0)
                            <div class="row">
                                @foreach ($gallery_images_style1 as $gallery_image)
                                    <div class="col-md-6 col-xl-4 grid-item">
                                        @if(Auth::user())
                                            @can('gallery check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="gallery.edit">
                                                    <input type="hidden" name="single_id" value="{{ $gallery_image->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="portfolio-item-card">
                                            @if (!empty($gallery_image->section_image))
                                                <a href="{{ asset('uploads/img/gallery/'.$gallery_image->section_image) }}" class="d-block popup-link"><img src="{{ asset('uploads/img/gallery/'.$gallery_image->section_image) }}" alt="image"></a>
                                            @endif
                                            <div class="contents">
                                                <h5><a href="#">{{ $gallery_image->title }}</a></h5>
                                                <span>{{ $gallery_image->subtitle }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($gallery_image)
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
                    @can('gallery check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="gallery.index">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="gallery.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_gallery') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
