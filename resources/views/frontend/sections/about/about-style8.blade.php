@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @if (isset($about_section_style8) || (is_countable($about_section_counters_style8) && count($about_section_counters_style8) > 0))
                    <section class="promo-content-block fix section-padding section-bg">
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
                                <div class="col-xl-6 col-12 mt-5 mt-xl-0 order-2 order-xl-1">
                                   @isset ($about_section_style8)
                                        <div class="block-contents">
                                            <div class="section-title mb-4">
                                                <h2 class="wow fadeInUp">@php echo html_entity_decode($about_section_style8->title); @endphp</h2>
                                                <p class="wow fadeInUp pt-15" data-wow-delay=".3s">@php echo html_entity_decode($about_section_style8->description); @endphp</p>
                                            </div>
                                        </div>
                                    @endisset
                                       <div class="funfacts d-flex">
                                           @foreach ($about_section_counters_style8 as $item)
                                               @if(Auth::user())
                                                   @can('section check')
                                                       @php
                                                           $url = request()->path();
                                                           $modified_url = str_replace('/', '-bracket-', $url);
                                                       @endphp
                                                       <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                           @csrf
                                                           <input type="hidden" name="route" value="about.edit_counter">
                                                           <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                           <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                           <button type="submit" class="me-2 custom-pure-button">
                                                               <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                           </button>
                                                       </form>
                                                   @endcan
                                               @endif
                                               <div class="single-funfact wow fadeInUp" data-wow-delay=".5s">
                                                   <h3><span>{{ $item->counter }}</span>{{ $item->extra_text }}</h3>
                                                   <p>@php echo html_entity_decode($item->title); @endphp</p>
                                               </div>
                                           @endforeach
                                           @unset ($item)
                                       </div>
                                </div>
                                @if(!empty($about_section_style8->section_image))
                                    <div class="col-xl-5 offset-xl-1 order-1 order-xl-2">
                                        <img src="{{ asset('uploads/img/about/'.$about_section_style8->section_image) }}" alt="image">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="promo-content-block fix section-padding section-bg">
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
                                <div class="col-xl-6 col-12 mt-5 mt-xl-0 order-2 order-xl-1">
                                    <div class="block-contents">
                                        <div class="section-title mb-4">
                                            <h2 class="wow fadeInUp">Our goal is to expand the digital agency</h2>
                                            <p class="wow fadeInUp pt-15" data-wow-delay=".3s">The purpose of a mission statement is to communic organisation's purpose and direction to its employees, customers, vens, and other stakeholders. A mission statement also creates a sense  identity for its employees provide the best customer results possible deliver.</p>
                                        </div>
                                    </div>
                                    <div class="funfacts d-flex">
                                        <div class="single-funfact wow fadeInUp" data-wow-delay=".5s">
                                            <h3><span>250</span>+</h3>
                                            <p>Happy clients</p>
                                        </div>
                                        <div class="single-funfact wow fadeInUp" data-wow-delay=".8s">
                                            <h3><span>99</span>%</h3>
                                            <p>Customer satisfaction</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 offset-xl-1 order-1 order-xl-2">
                                    <img src="{{ asset('uploads/img/dummy/525x415.webp') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                @endisset

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
                    <input type="hidden" name="route" value="about.create">
                    <input type="hidden" name="style" value="style8">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
