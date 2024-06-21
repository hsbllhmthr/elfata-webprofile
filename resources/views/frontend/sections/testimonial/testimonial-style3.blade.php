@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="testimonial-carousel-wrapper section-bg section-padding fix">
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
                        <div class="row fix align-items-center">
                            @isset ($testimonial_section_style3)
                                <div class="col-lg-8">
                                    <div class="block-contents fw500 text-center text-lg-start">
                                        <div class="section-title">
                                            <h2 class="wow fadeInLeft" data-wow-duration="1.1s">@php echo html_entity_decode($testimonial_section_style3->title); @endphp</h2>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-lg-8">
                                        <div class="block-contents fw500 text-center text-lg-start">
                                            <div class="section-title">
                                                <h2 class="wow fadeInLeft" data-wow-duration="1.1s">We have powerful user experience</h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset
                            <div class="col-lg-4 d-none d-lg-block text-center text-lg-end">
                                <div class="testimoinial-nav style-2">
                                    <div class="testimonial-nav-prev">
                                        <i class="icon-arrow-left"></i>
                                    </div>
                                    <div class="testimonial-nav-next">
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (is_countable($testimonials_style3) && count($testimonials_style3) > 0)
                            <div class="testimonial-nav-carousel-active">
                                @foreach ($testimonials_style3 as $item)
                                    <div class="single-testimoinal-box">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="testimonial.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        @if (!empty($item->section_image))
                                            <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/testimonial/'.$item->section_image) }}');"></div>
                                        @endif
                                        <div class="feedback">
                                            {{ $item->description }}
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>{{ $item->name }}</h6>
                                                <span>{{ $item->job }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="col-lg-4 d-block mt-5 mr-lg-0 d-lg-none text-center">
                                <div class="testimoinial-nav style-2">
                                    <div class="testimonial-nav-prev">
                                        <i class="icon-arrow-left"></i>
                                    </div>
                                    <div class="testimonial-nav-next">
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="testimonial-nav-carousel-active">
                                    <div class="single-testimoinal-box">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="feedback">
                                            “This app has made my banking work much easier which saves me a lot of time, I have become a fan of it.”
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>Scott Swanson</h6>
                                                <span>Account executive</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-testimoinal-box">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="feedback">
                                            “By using online banking, I can easily keep track of various expenses, which saves me a lot of money.”
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>Karen Lynn</h6>
                                                <span>Marketing Expert</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-testimoinal-box">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="feedback">
                                            “I can now complete banking work from anywhere anytime, making my business work more dynamic.”
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>Sean Jacobs</h6>
                                                <span>Businessman</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-testimoinal-box">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="feedback">
                                            “This app has made my banking work much easier which saves me a lot of time, I have become a fan of it.”
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>Scott Swanson</h6>
                                                <span>Account executive</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-testimoinal-box">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="feedback">
                                            “By using online banking, I can easily keep track of various expenses, which saves me a lot of money.”
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>Karen Lynn</h6>
                                                <span>Marketing Expert</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-testimoinal-box">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="feedback">
                                            “I can now complete banking work from anywhere anytime, making my business work more dynamic.”
                                        </div>
                                        <div class="client-info">
                                            <div class="client-name">
                                                <h6>Sean Jacobs</h6>
                                                <span>Businessman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-block mt-5 mr-lg-0 d-lg-none text-center">
                                    <div class="testimoinial-nav style-2">
                                        <div class="testimonial-nav-prev">
                                            <i class="icon-arrow-left"></i>
                                        </div>
                                        <div class="testimonial-nav-next">
                                            <i class="icon-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

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
                    <input type="hidden" name="route" value="testimonial.create">
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="testimonial.create">
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_testimonial') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
