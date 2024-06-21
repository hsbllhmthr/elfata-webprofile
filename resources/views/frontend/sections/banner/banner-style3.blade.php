@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="hero-welcome-wrapper hero-3 fw500">
                    <div class="single-slide">
                        <div class="container">
                            @if(Auth::user())
                                @can('section check')
                                    <!-- hover effect for mobile devices  -->
                                    <div class="click-icon d-md-none text-center">
                                        <button class="custom-btn text-white">
                                            <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                        </button>
                                    </div>
                                @endcan
                            @endif
                            <div class="row align-items-center">
                                @isset ($banner_style3)
                                    @if (!empty($banner_style3->section_image))
                                        <div class="col-xl-5 col-12 text-xl-start mt-5 mt-xl-0 text-center order-2 order-xl-1">
                                            <div class="hero-mobile">
                                                <img src="{{ asset('uploads/img/banner/'.$banner_style3->section_image) }}" alt="image">
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="col-xl-5 col-12 text-xl-start mt-5 mt-xl-0 text-center order-2 order-xl-1">
                                            <div class="hero-mobile">
                                                <img src="{{ asset('uploads/img/dummy/330x665.webp') }}" alt="image">
                                            </div>
                                        </div>
                                    @endif
                                @endisset
                                <div class="col-xl-7 ps-xl-5 text-center text-xl-start col-12 order-1 order-xl-2">
                                    <div class="hero-contents">
                                        @isset ($banner_style3)
                                            <h1>@php echo html_entity_decode($banner_style3->title); @endphp</h1>
                                            <p>@php echo html_entity_decode($banner_style3->description); @endphp</p>
                                            @if (!empty($banner_style3->button_image))
                                                <a href="{{ $banner_style3->button_image_url }}" class="app-download-btn"><img src="{{ asset('uploads/img/banner/'.$banner_style3->button_image) }}" alt="button image"></a>
                                            @endif
                                            @if (!empty($banner_style3->button_image_2))
                                                <a href="{{ $banner_style3->button_image_url_2 }}" class="app-download-btn"><img src="{{ asset('uploads/img/banner/'.$banner_style3->button_image_2) }}" alt="button image"></a>
                                            @endif
                                            @if (!empty($banner_style3->button_image_3))
                                                <a href="{{ $banner_style3->button_image_url_3 }}" class="app-download-btn"><img src="{{ asset('uploads/img/banner/'.$banner_style3->button_image_3) }}" alt="button image"></a>
                                            @endif
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                <h1>Online banking solution for the next generation</h1>
                                                <p>Nowadays the simplest and most popular online banking solution for that saves time by speeding up your banking work apart from and also this you can do banking anytime, anywhere.</p>
                                                <a href="#" class="app-download-btn"><img src="{{ asset('uploads/img/dummy/apple.png') }}" alt="button image"></a>
                                                <a href="#" class="app-download-btn"><img src="{{ asset('uploads/img/dummy/android.png') }}" alt="button image"></a>
                                            @endif
                                        @endisset
                                        <div class="client-feedback-wrapper">
                                            @if (is_countable($banner_clients_style3) && count($banner_clients_style3))
                                                <div class="client-faces">
                                                    @foreach ($banner_clients_style3 as $banner_client)
                                                        @if (!empty($banner_client->section_image))
                                                            <div class="single-face bg-cover" style="background-image: url('{{ asset('uploads/img/banner/'.$banner_client->section_image) }}')"></div>
                                                        @endif
                                                    @endforeach
                                                    @unset ($banner_client)
                                                </div>
                                            @else
                                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                    <div class="client-faces">
                                                        <div class="single-face bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/35x35.png') }}')"></div>
                                                        <div class="single-face bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/35x35.png') }}')"></div>
                                                        <div class="single-face bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/35x35.png') }}')"></div>
                                                        <div class="single-face bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/35x35.png') }}')"></div>
                                                        <div class="single-face bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/35x35.png') }}')"></div>
                                                    </div>
                                                @endif
                                            @endif
                                            @isset ($banner_client_section_style3)
                                                <h6>@php echo html_entity_decode($banner_client_section_style3->title); @endphp</h6>
                                                <div class="rating">
                                                    <span class="icon-star"></span> @php echo html_entity_decode($banner_client_section_style3->description); @endphp
                                                </div>
                                            @else
                                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                    <h6>Satisfied global clients</h6>
                                                    <div class="rating">
                                                        <span class="icon-star"></span> 4.5 Global rating
                                                    </div>
                                                @endif
                                            @endisset
                                            <div class="hero-arrow">
                                                <img src="{{ asset('uploads/img/dummy/icons/hero-arrow.png') }}" alt="icon image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @if(Auth::user())
                    @can('section check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="banner.create">
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_banner') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
