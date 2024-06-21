@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                    <section class="package-pricing-wrapper fix section-bg section-padding">
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
                            @isset($plan_section_style1)
                                <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title">
                                            <h2 class="wow fadeInUp">@php echo html_entity_decode($plan_section_style1->title); @endphp</h2>
                                            <p class="wow fadeInUp pt-4" data-wow-delay=".3s">@php echo html_entity_decode($plan_section_style1->description); @endphp</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-8 ps-xl-5 pe-xl-5 col-12 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title">
                                            <h2 class="wow fadeInUp">The most affordable pricing plan for you</h2>
                                            <p class="wow fadeInUp pt-4" data-wow-delay=".3s">xmoze offers the most affordable planner you can use to improve your business. Such affordable prices are not available anywhere.</p>
                                        </div>
                                    </div>
                                </div>
                            @endisset

                            @if (is_countable($plans_style1) && count($plans_style1) > 0)
                            <div class="row align-items-center">
                                @foreach ($plans_style1 as $plan)
                                    @if ($plan->recommended == 'no')
                                        <div class="col-lg-6 col-xl-4 col-12">
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="plan.edit">
                                                        <input type="hidden" name="single_id" value="{{ $plan->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="single-pricing-package wow fadeInUp" data-wow-duration="1.1s">
                                                @if (!empty($plan->tag))
                                                    <span class="active-bage">{{ $plan->tag }}</span>
                                                @endif
                                                <div class="pricing-head">
                                                    <div class="pricing-name">
                                                        <h4>{{ $plan->name }}</h4>
                                                    </div>
                                                    <div class="pricing-vale d-flex">
                                                        <h2>{{ $plan->currency }}<span>{{ $plan->price }}</span></h2>
                                                        <p>{{ $plan->extra_text }}</p>
                                                    </div>
                                                </div>
                                                <div class="features-list">
                                                    <ul>
                                                        @if (!empty($plan->feature_list))
                                                            @php
                                                                $str = $plan->feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp

                                                            @foreach ($array_items as $item)
                                                                <li>{{ $item }}</li>
                                                            @endforeach
                                                            @unset ($item)
                                                        @endif
                                                        @if (!empty($plan->non_feature_list))
                                                            @php
                                                                $str = $plan->non_feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp
                                                            @foreach ($array_items as $item)
                                                                <li class="xmark">{{ $item }}</li>
                                                            @endforeach
                                                            @unset ($item)
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="buy-package-btn">
                                                    <a href="{{ $plan->button_url }}" class="theme-btn red-color minimal-btn">{{ $plan->button_name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6 col-xl-4 col-12">
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="plan.edit">
                                                        <input type="hidden" name="single_id" value="{{ $plan->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="single-pricing-package active wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1.1s">
                                                @if (!empty($plan->tag))
                                                    <span class="active-bage">{{ $plan->tag }}</span>
                                                @endif
                                                <div class="pricing-head">
                                                    <div class="pricing-name">
                                                        <h4>{{ $plan->name }}</h4>
                                                    </div>
                                                    <div class="pricing-vale d-flex">
                                                        <h2>{{ $plan->currency }}<span>{{ $plan->price }}</span></h2>
                                                        <p>{{ $plan->extra_text }}</p>
                                                    </div>
                                                </div>
                                                <div class="features-list">
                                                    <ul>
                                                    @if (!empty($plan->feature_list))
                                                        @php
                                                            $str = $plan->feature_list;
                                                            $array_items = explode(",",$str);
                                                        @endphp

                                                            @foreach ($array_items as $item)
                                                                <li>{{ $item }}</li>
                                                            @endforeach

                                                    @endif
                                                        @if (!empty($plan->non_feature_list))
                                                            @php
                                                                $str = $plan->non_feature_list;
                                                                $array_items = explode(",",$str);
                                                            @endphp
                                                            @foreach ($array_items as $item)
                                                                <li class="xmark">{{ $item }}</li>
                                                            @endforeach
                                                            @unset($item)
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="buy-package-btn">
                                                    <a href="{{ $plan->button_url }}" class="theme-btn red-color">{{ $plan->button_name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @unset ($plan)
                            </div>
                                @else
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-xl-4 col-12">
                                            <div class="single-pricing-package wow fadeInUp" data-wow-duration="1.1s">
                                                <div class="pricing-head">
                                                    <div class="pricing-name">
                                                        <h4>Starter Plan</h4>
                                                    </div>
                                                    <div class="pricing-vale d-flex">
                                                        <h2>$<span>10</span></h2>
                                                        <p>/Per Month</p>
                                                    </div>
                                                </div>
                                                <div class="features-list">
                                                    <ul>
                                                        <li>Limited Access Library</li>
                                                        <li>Individual User Capabilities</li>
                                                        <li>No Updates Facility</li>
                                                    </ul>
                                                </div>
                                                <div class="buy-package-btn">
                                                    <a href="#" class="theme-btn red-color minimal-btn">Choose Plan</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12">
                                            <div class="single-pricing-package active wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1.1s">
                                                <span class="active-bage">Popular</span>
                                                <div class="pricing-head">
                                                    <div class="pricing-name">
                                                        <h4>Basic Plan</h4>
                                                    </div>
                                                    <div class="pricing-vale d-flex">
                                                        <h2>$<span>45</span></h2>
                                                        <p>/Per Month</p>
                                                    </div>
                                                </div>
                                                <div class="features-list">
                                                    <ul>
                                                        <li>Full Access Library</li>
                                                        <li>Limited User Capabilities</li>
                                                        <li>Free Lifetime Updates Facility</li>
                                                    </ul>
                                                </div>
                                                <div class="buy-package-btn">
                                                    <a href="#" class="theme-btn red-color">Choose Plan</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12">
                                            <div class="single-pricing-package wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1.1s">
                                                <div class="pricing-head">
                                                    <div class="pricing-name">
                                                        <h4>Premium Plan</h4>
                                                    </div>
                                                    <div class="pricing-vale d-flex">
                                                        <h2>$<span>100</span></h2>
                                                        <p>/Per Month</p>
                                                    </div>
                                                </div>
                                                <div class="features-list">
                                                    <ul>
                                                        <li>Full Access Library</li>
                                                        <li>Multiple User Capabilities</li>
                                                        <li>Free Lifetime Updates Facility</li>
                                                    </ul>
                                                </div>
                                                <div class="buy-package-btn">
                                                    <a href="#" class="theme-btn red-color minimal-btn">Choose Plan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <input type="hidden" name="route" value="plan.create">
                    <input type="hidden" name="style" value="">
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
                    <input type="hidden" name="route" value="plan.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_plan') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
