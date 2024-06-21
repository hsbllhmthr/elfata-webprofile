@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="our-best-features-wrapper section-padding">
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
                        @isset($feature_section_style1)
                            <div class="col-xl-8 offset-xl-2 text-center">
                                <div class="block-contents">
                                    <div class="section-title">
                                        <h2>@php echo html_entity_decode($feature_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-xl-8 offset-xl-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title">
                                            <h2>The best crypto features you won't find anywhere else</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset

                        @if (is_countable($features_style1) && count($features_style1) > 0)
                            <div class="row">
                                @php $i = 1; @endphp
                                @foreach ($features_style1 as $item)
                                    <div class="col-lg-4 col-md-6 col-12">
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
                                        <div class="features-card-item style-1">
                                            @if ($item->type == 'image')
                                                @if (!empty($item->section_image))
                                                    <div class="mb-3">
                                                        <img src="{{ asset('uploads/img/feature/'.$item->section_image) }}" alt="feature image">
                                                    </div>
                                                @endif
                                            @else
                                                <div class="icon icon{{ $i++ }}">
                                                    <i class="{{ $item->icon }}"></i>
                                                </div>
                                            @endif
                                            <h3>@php echo html_entity_decode($item->title); @endphp</h3>
                                            <p>@php echo html_entity_decode($item->description); @endphp</p>
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
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="features-card-item style-1">
                                            <div class="icon icon1">
                                                <i class="icon-lock"></i>
                                            </div>
                                            <h3>Secure & Fast Payment</h3>
                                            <p>The most secure and fast payment can be made through cyptrocurrency</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="features-card-item style-1">
                                            <div class="icon icon2">
                                                <i class="icon-chart-bar"></i>
                                            </div>
                                            <h3>Reports & Analytics</h3>
                                            <p>View daily transaction reports & analytics easily through xmoze & improve business</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="features-card-item style-1">
                                            <div class="icon icon3">
                                                <i class="icon-send-arrow"></i>
                                            </div>
                                            <h3>Send & Receive Anytime</h3>
                                            <p>Send and receive money at any time with maximum security through xmoze app</p>
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
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="feature.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_feature') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
