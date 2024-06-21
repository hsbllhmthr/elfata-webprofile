@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                    <section class="testimonial-wrapper section-padding fix">
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
                            @isset ($testimonial_section_style1)
                                <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title wow fadeInDown" data-wow-duration="1.2s">
                                            <h2>@php echo html_entity_decode($testimonial_section_style1->title); @endphp</h2>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title wow fadeInDown" data-wow-duration="1.2s">
                                            <h2>A place of trust for millions of people</h2>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endisset
                                @if (is_countable($testimonials_style1) && count($testimonials_style1) > 0)
                                    <div class="col-12 col-xl-12">
                                        <div class="testimonial-carousel-active">
                                            @foreach ($testimonials_style1 as $item)
                                                <div class="single-testimoinal-item">
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
                                                    <div class="client-info">
                                                        @if (!empty($item->section_image))
                                                            <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/testimonial/'.$item->section_image) }}');"></div>
                                                        @endif
                                                        <div class="client-name">
                                                            <h6>{{ $item->name }}</h6>
                                                            <span>{{ $item->job }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="feedback">
                                                        {{ $item->description }}
                                                    </div>
                                                    <div class="rating">
                                                        @for ($t = 0; $t < $item->star; $t++)
                                                            <i class="icon-star"></i>
                                                        @endfor
                                                        @for ($t = 0; $t < 5-$item->star; $t++)
                                                            <i class="icon-star text-muted"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            @endforeach
                                            @unset ($item)
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-12 col-xl-12">
                                        <div class="testimonial-carousel-active">
                                            <div class="single-testimoinal-item">
                                                <div class="client-info">
                                                    <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                                    <div class="client-name">
                                                        <h6>Scott Swanson</h6>
                                                        <span>Account executive</span>
                                                    </div>
                                                </div>
                                                <div class="feedback">
                                                    “I have gained a strong knowledge about the architecture of Bitcoin. It helps me to easily transact and keep accounts.”
                                                </div>
                                                <div class="rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="single-testimoinal-item">
                                                <div class="client-info">
                                                    <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                                    <div class="client-name">
                                                        <h6>Karen Lynn</h6>
                                                        <span>Software engineer</span>
                                                    </div>
                                                </div>
                                                <div class="feedback">
                                                    “Excellent app for coin technology and it built on top of potential work. And there are programming assignments record.”
                                                </div>
                                                <div class="rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="single-testimoinal-item">
                                                <div class="client-info">
                                                    <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                                    <div class="client-name">
                                                        <h6>Sean Jacobs</h6>
                                                        <span>Financial analyst</span>
                                                    </div>
                                                </div>
                                                <div class="feedback">
                                                    “Greatest appreciation to you and your team for the outstanding job you did for us. The app is just what we wanted.”
                                                </div>
                                                <div class="rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="single-testimoinal-item">
                                                <div class="client-info">
                                                    <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                                    <div class="client-name">
                                                        <h6>Scott Swanson</h6>
                                                        <span>Account executive</span>
                                                    </div>
                                                </div>
                                                <div class="feedback">
                                                    “I have gained a strong knowledge about the architecture of Bitcoin. It helps me to easily transact and keep accounts.”
                                                </div>
                                                <div class="rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="single-testimoinal-item">
                                                <div class="client-info">
                                                    <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                                    <div class="client-name">
                                                        <h6>Karen Lynn</h6>
                                                        <span>Software engineer</span>
                                                    </div>
                                                </div>
                                                <div class="feedback">
                                                    “Excellent app for coin technology and it built on top of potential work. And there are programming assignments record.”
                                                </div>
                                                <div class="rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
                                            </div>
                                            <div class="single-testimoinal-item">
                                                <div class="client-info">
                                                    <div class="client-img bg-cover" style="background-image: url('{{ asset('uploads/img/dummy/70x70.webp') }}');"></div>
                                                    <div class="client-name">
                                                        <h6>Sean Jacobs</h6>
                                                        <span>Financial analyst</span>
                                                    </div>
                                                </div>
                                                <div class="feedback">
                                                    “Greatest appreciation to you and your team for the outstanding job you did for us. The app is just what we wanted.”
                                                </div>
                                                <div class="rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
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
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="testimonial.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_testimonial') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
