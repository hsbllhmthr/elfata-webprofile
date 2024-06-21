@if (isset($price_section) || count($prices) > 0)
    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="auto-container">
            <p class="position-relative text-center">
                @if(Auth::user())
                    @can('price check')
                        <a href="{{ route('price.create') }}" class="text-primary mr-2">
                            <i class="fas fa-edit font-18"></i> Section Title/Description
                        </a>
                    @endcan
                    @can('portfolio check')
                        <a href="{{ route('price.create') }}" class="text-primary">
                            <i class="fas fa-plus font-18"></i> Add Item
                        </a>
                    @endcan
                @endif
            </p>
            @if (!empty($price_section->title))
                <div class="sec-title text-center">
                    <h2>@php echo html_entity_decode($price_section->title); @endphp</h2>
                    <div class="text-decoration">
                        <span class="left"></span>
                        <span class="right"></span>
                    </div>
                </div>
            @endif
            <div class="text-center">
                <div class="pricing-btn">
                    <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                        @php $tab = 0; @endphp
                       @foreach ($prices as $price)
                            @if ($price->period == 'monthly')
                            <li class="nav-item">
                                <a class="nav-link @if ($loop->index == 0) active @endif" id="price-tab-area-{{ $loop->index }}" data-toggle="tab" href="#price-tab-{{ $loop->index }}" role="tab" aria-controls="price-tab-{{ $loop->index }}" aria-selected="@if ($loop->index == 0) true @else false @endif">
                                    Monthly
                                </a>
                            </li>
                            @elseif ($price->period == 'annually')
                                <li class="nav-item">
                                    <a class="nav-link @if ($loop->index == 0) active @endif" id="price-tab-area-{{ $loop->index }}" data-toggle="tab" href="#price-tab-{{ $loop->index }}" role="tab" aria-controls="price-tab-{{ $loop->index }}" aria-selected="@if ($loop->index == 0) true @else false @endif">
                                        Annually
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link @if ($loop->index == 0) active @endif" id="price-tab-area-{{ $loop->index }}" data-toggle="tab" href="#price-tab-{{ $loop->index }}" role="tab" aria-controls="price-tab-{{ $loop->index }}" aria-selected="@if ($loop->index == 0) true @else false @endif">
                                        Onetime
                                    </a>
                                </li>
                            @endif
                           @php $tab++; @endphp
                           @endforeach
                        @unset($price)
                    </ul>
                </div>
            </div>
            <div class="pricing-content">
                <!-- Tab panes -->
                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    @for ($i = 0; $i < $tab; $i++)
                        <div class="tab-pane fadeInUp animated @if ($i == 0) active @endif" id="price-tab-{{ $i }}" role="tabpanel" aria-labelledby="price-tab-{{ $i }}">
                            @if (!empty($price_section->description)) <h3>{{ $price_section->description }}</h3> @endif
                            <div class="wrapper-box">
                                <div class="row m-0">
                                    @php $t = 0 ; @endphp
                                    @foreach ($prices as $price)
                                        @if ($price->period == 'monthly')
                                            <div class="col-lg-4 pricing-block animated @if ($t == 1) active @endif @if ($t == 1) fadeInLeft @else fadeInUp @endif" data-wow-delay="200ms" data-wow-duration="1200ms">
                                                <div class="inner-box">
                                                    <div class="top-content">
                                                        <div class="row m-0 justify-content-between">
                                                            <div class="category">Basic Pack</div>
                                                            <div class="price"><span>$</span>24.00 <sub>/mo</sub></div>
                                                        </div>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h5>Most Recommended</h5>
                                                        <h4>Power of choice is untrammelled and <br>do what we like best.</h4>
                                                        <ul>
                                                            <li><i class="flaticon-tick"></i>4-5 Weeks from to finish</li>
                                                            <li><span><i class="flaticon-right-arrow"></i>Data sprint</span></li>
                                                            <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                            <li><i class="flaticon-tick"></i>20 Days of support</li>
                                                        </ul>
                                                        <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                                        <div class="hint"><span>*</span> No credit card required</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($price->period == 'annually')
                                            <div class="col-lg-4 pricing-block animated @if ($t == 1) active @endif @if ($t == 1) fadeInLeft @else fadeInUp @endif" data-wow-delay="200ms" data-wow-duration="1200ms">
                                                <div class="inner-box">
                                                    <div class="top-content">
                                                        <div class="row m-0 justify-content-between">
                                                            <div class="category">Basic Pack</div>
                                                            <div class="price"><span>$</span>24.00 <sub>/mo</sub></div>
                                                        </div>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h5>Most Recommended</h5>
                                                        <h4>Power of choice is untrammelled and <br>do what we like best.</h4>
                                                        <ul>
                                                            <li><i class="flaticon-tick"></i>4-5 Weeks from to finish</li>
                                                            <li><span><i class="flaticon-right-arrow"></i>Data sprint</span></li>
                                                            <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                            <li><i class="flaticon-tick"></i>20 Days of support</li>
                                                        </ul>
                                                        <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                                        <div class="hint"><span>*</span> No credit card required</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-lg-4 pricing-block animated @if ($t == 1) active @endif @if ($t == 1) fadeInLeft @else fadeInUp @endif" data-wow-delay="200ms" data-wow-duration="1200ms">
                                                <div class="inner-box">
                                                    <div class="top-content">
                                                        <div class="row m-0 justify-content-between">
                                                            <div class="category">Basic Pack</div>
                                                            <div class="price"><span>$</span>24.00 <sub>/mo</sub></div>
                                                        </div>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h5>Most Recommended</h5>
                                                        <h4>Power of choice is untrammelled and <br>do what we like best.</h4>
                                                        <ul>
                                                            <li><i class="flaticon-tick"></i>4-5 Weeks from to finish</li>
                                                            <li><span><i class="flaticon-right-arrow"></i>Data sprint</span></li>
                                                            <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                            <li><i class="flaticon-tick"></i>20 Days of support</li>
                                                        </ul>
                                                        <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                                        <div class="hint"><span>*</span> No credit card required</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @php $t++; @endphp
                                    @endforeach
                                    @unset($price)
                                </div>
                            </div>
                        </div>
                        @endfor
                   </div>
            </div>

        </div>
    </section>
@else
    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="auto-container">
            <p class="position-relative text-center">
                @if(Auth::user())
                    @can('price check')
                        <a href="{{ route('price.create') }}" class="text-primary mr-2">
                            <i class="fas fa-plus font-18"></i> Section Title/Description
                        </a>
                    @endcan
                    @can('portfolio check')
                        <a href="{{ route('price.create') }}" class="text-primary">
                            <i class="fas fa-plus font-18"></i> Add Item
                        </a>
                    @endcan
                @endif
            </p>
            <div class="sec-title text-center">
                <h2>Flexible Plans for <br> Small to Fast-Growing Company</h2>
                <div class="text-decoration">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
            </div>
            <div class="text-center">
                <div class="pricing-btn">
                    <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="price-tab-one-area" data-toggle="tab" href="#price-tab-one" role="tab" aria-controls="price-tab-one" aria-selected="true">Monthly
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="price-tab-two-area" data-toggle="tab" href="#price-tab-two" role="tab" aria-controls="price-tab-two" aria-selected="false">
                                Annually
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pricing-content">
                <!-- Tab panes -->
                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    <div class="tab-pane fadeInUp animated active" id="price-tab-one" role="tabpanel" aria-labelledby="price-tab-one">
                        <h3>Switch to annual plan and get 25% offer.</h3>
                        <div class="wrapper-box">
                            <div class="row m-0">
                                <div class="col-lg-4 pricing-block animated fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">Basic Pack</div>
                                                <div class="price"><span>$</span>24.00 <sub>/mo</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h5>Most Recommended</h5>
                                            <h4>Power of choice is untrammelled and <br>do what we like best.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>4-5 Weeks from to finish</li>
                                                <li><span><i class="flaticon-right-arrow"></i>Data sprint</span></li>
                                                <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                <li><i class="flaticon-tick"></i>20 Days of support</li>
                                            </ul>
                                            <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pricing-block active animated fadeInLeft" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">Standard Pack</div>
                                                <div class="price"><span>$</span>45.00 <sub>/mo</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h5>for Large Business</h5>
                                            <h4>Matters to  principle of selection our <br>pleasures to secure.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>3-4 Weeks from to finish</li>
                                                <li><i class="flaticon-tick"></i>Data sprint</li>
                                                <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                <li><i class="flaticon-tick"></i>30 Days of support</li>
                                            </ul>
                                            <div class="link-btn"><a href="#" class="theme-btn btn-style-one"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pricing-block animated fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">Advanced Pack</div>
                                                <div class="price"><span>$</span>60.00 <sub>/mo</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h5>Most Recommended</h5>
                                            <h4>These cases are perfectly simple <br>& easy to distinguish.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>2 Weeks from to finish</li>
                                                <li><i class="flaticon-tick"></i>Data sprint</li>
                                                <li><i class="flaticon-tick"></i>Results revision</li>
                                                <li><i class="flaticon-tick"></i>20 Days of support</li>
                                            </ul>
                                            <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fadeInUp animated" id="price-tab-two" role="tabpanel" aria-labelledby="price-tab-two">
                        <h3>Switch to annual plan and get 25% offer.</h3>
                        <div class="wrapper-box">
                            <div class="row m-0">
                                <div class="col-lg-4 pricing-block animated fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">Basic Pack</div>
                                                <div class="price"><span>$</span>24.00 <sub>/mo</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h5>Most Recommended</h5>
                                            <h4>Power of choice is untrammelled and <br>do what we like best.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>4-5 Weeks from to finish</li>
                                                <li><span><i class="flaticon-right-arrow"></i>Data sprint</span></li>
                                                <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                <li><i class="flaticon-tick"></i>20 Days of support</li>
                                            </ul>
                                            <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pricing-block active animated fadeInRight" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">Standard Pack</div>
                                                <div class="price"><span>$</span>45.00 <sub>/mo</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h5>for Large Business</h5>
                                            <h4>Matters to  principle of selection our <br>pleasures to secure.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>3-4 Weeks from to finish</li>
                                                <li><i class="flaticon-tick"></i>Data sprint</li>
                                                <li><span><i class="flaticon-right-arrow"></i>Results revision</span></li>
                                                <li><i class="flaticon-tick"></i>30 Days of support</li>
                                            </ul>
                                            <div class="link-btn"><a href="#" class="theme-btn btn-style-one"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pricing-block animated fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">Advanced Pack</div>
                                                <div class="price"><span>$</span>60.00 <sub>/mo</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h5>Most Recommended</h5>
                                            <h4>These cases are perfectly simple <br>& easy to distinguish.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>2 Weeks from to finish</li>
                                                <li><i class="flaticon-tick"></i>Data sprint</li>
                                                <li><i class="flaticon-tick"></i>Results revision</li>
                                                <li><i class="flaticon-tick"></i>20 Days of support</li>
                                            </ul>
                                            <div class="link-btn"><a href="#" class="theme-btn btn-style-two"><span class="btn-title">Get Started a Free Trail</span></a></div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endif