@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="testimonial-carousel-wrapper section-padding fix">
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
                            <div class="col-lg-8">
                                @isset ($testimonial_section_style2)
                                    <div class="block-contents text-center text-lg-start">
                                        <div class="section-title">
                                            <h2 class="wow fadeInLeft" data-wow-duration="1.1s">@php echo html_entity_decode($testimonial_section_style2->title); @endphp</h2>
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-lg-8">
                                        <div class="block-contents text-center text-lg-start">
                                            <div class="section-title">
                                                <h2 class="wow fadeInLeft" data-wow-duration="1.1s">We have powerful user experience</h2>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endisset
                            </div>
                                <div class="col-lg-4 d-none d-lg-block text-center text-lg-end">
                                    <div class="testimoinial-nav red-color">
                                        <div class="testimonial-nav-prev">
                                            <i class="icon-arrow-left"></i>
                                        </div>
                                        <div class="testimonial-nav-next">
                                            <i class="icon-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        @if (is_countable($testimonials_style2) && count($testimonials_style2) > 0)
                            <div class="testimonial-nav-carousel-active">
                                @foreach ($testimonials_style2 as $item)
                                    <div class="single-testimoinal-item style-2">
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
                                        <div class="rating">
                                            @for ($t = 0; $t < $item->star; $t++)
                                                <i class="icon-star"></i>
                                            @endfor
                                            @for ($t = 0; $t < 5-$item->star; $t++)
                                                <i class="icon-star text-muted"></i>
                                            @endfor
                                        </div>
                                        <div class="feedback">
                                            {{ $item->description }}
                                        </div>
                                        <div class="client-info">
                                            <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/testimonial/'.$item->section_image) }}');"></div>
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
                                <div class="testimoinial-nav red-color">
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
                                <div class="single-testimoinal-item style-2">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="feedback">
                                        “Greatest appreciation to you and your team for the outstanding job you did for us. The website is just what we wanted, and we were thrilled with the speed your team exercises.”
                                    </div>
                                    <div class="client-info">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="client-name">
                                            <h6>Scott Swanson</h6>
                                            <span>Account executive</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimoinal-item style-2">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="feedback">
                                        “I love Xmoze , they're the best. When I started my business, I didn't know how where to start with my online branding. I contacted xmoze and hired them to develop my online business."
                                    </div>
                                    <div class="client-info">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="client-name">
                                            <h6>Karen Lynn</h6>
                                            <span>Software engineer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimoinal-item style-2">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="feedback">
                                        “Great results. Enjoyable to work with, and most importantly, enabled us to have the presence on the website we needed to conduct business in today's digital market world."
                                    </div>
                                    <div class="client-info">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="client-name">
                                            <h6>Sean Jacobs</h6>
                                            <span>Financial analyst</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimoinal-item style-2">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="feedback">
                                        “Greatest appreciation to you and your team for the outstanding job you did for us. The website is just what we wanted, and we were thrilled with the speed your team exercises.”
                                    </div>
                                    <div class="client-info">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="client-name">
                                            <h6>Scott Swanson</h6>
                                            <span>Account executive</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimoinal-item style-2">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="feedback">
                                        “I love Xmoze , they're the best. When I started my business, I didn't know how where to start with my online branding. I contacted xmoze and hired them to develop my online business."
                                    </div>
                                    <div class="client-info">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="client-name">
                                            <h6>Karen Lynn</h6>
                                            <span>Software engineer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimoinal-item style-2">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="feedback">
                                        “Great results. Enjoyable to work with, and most importantly, enabled us to have the presence on the website we needed to conduct business in today's digital market world."
                                    </div>
                                    <div class="client-info">
                                        <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                        <div class="client-name">
                                            <h6>Sean Jacobs</h6>
                                            <span>Financial analyst</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-block mt-5 mr-lg-0 d-lg-none text-center">
                                <div class="testimoinial-nav red-color">
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
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="testimonial.create">
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_testimonial') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
