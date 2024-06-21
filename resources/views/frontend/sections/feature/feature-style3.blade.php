@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="strong-services-wrapper section-bg section-padding fw500">
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
                        @isset($feature_section_style3)
                            <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                <div class="block-contents">
                                    <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                        <h2>@php echo html_entity_decode($feature_section_style3->title); @endphp</h2>
                                        <p>@php echo html_entity_decode($feature_section_style3->description); @endphp</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                <div class="block-contents">
                                    <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                        <h2>Strong new features for banking services</h2>
                                        <p>In mobile banking you get all kinds of modern services It helps you focus on your core business and benefit.</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endisset
                        @if (is_countable($features_style3) && count($features_style3) > 0)
                            <div class="row">
                                @php $i = 1; @endphp
                                @foreach ($features_style3 as $item)
                                    <div class="col-md-6 col-xl-3">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="feature.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="strong-service-card card{{ $i++ }}">
                                            @if ($item->type == 'image')
                                                @if (!empty($item->section_image))
                                                    <div class="icon custom-line-height-0">
                                                        <img src="{{ asset('uploads/img/feature/'.$item->section_image) }}" alt="feature image">
                                                    </div>
                                                @endif
                                            @else
                                                <div class="icon">
                                                    <i class="{{ $item->icon }}"></i>
                                                </div>
                                            @endif
                                            <div class="service-title">
                                                <h3>@php echo html_entity_decode($item->title); @endphp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        if ($i == 4) {
                                            $i = 1;
                                        }
                                    @endphp
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="strong-service-card card1">
                                        <div class="icon">
                                            <i class="icon-layer"></i>
                                        </div>
                                        <div class="service-title">
                                            <h3>Credit and debit card facilities</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="strong-service-card card2">
                                        <div class="icon">
                                            <i class="icon-mobile-pay"></i>
                                        </div>
                                        <div class="service-title">
                                            <h3>Pay bills & deposit cheques online</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="strong-service-card card3">
                                        <div class="icon">
                                            <i class="icon-cow"></i>
                                        </div>
                                        <div class="service-title">
                                            <h3>Lower your overhead fees</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="strong-service-card card4">
                                        <div class="icon">
                                            <i class="icon-secure"></i>
                                        </div>
                                        <div class="service-title">
                                            <h3>Privacy and secure transactions</h3>
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
                    <input type="hidden" name="route" value="feature.create">
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="feature.create">
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_feature') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
