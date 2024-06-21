@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($cta_section_style1)
                    <section class="cta-banner-wrapper style-1 section-padding pt-0">
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
                            <div class="cta-banner text-white">
                                <div class="row">
                                    <div class="col-xxl-6 text-center text-xxl-start offset-xxl-1">
                                        <div class="cta-contents">
                                            <h2 class="wow fadeInUp">@php echo html_entity_decode($cta_section_style1->title); @endphp</h2>
                                            <p class="wow fadeInUp" data-wow-delay=".3s">@php echo html_entity_decode($cta_section_style1->description); @endphp</p>
                                            @if (!empty($cta_section_style1->button_image))
                                                <a href="{{ $cta_section_style1->button_image_url }}" class="app-download-btn wow fadeInUp" data-wow-delay=".6s"><img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style1->button_image) }}" alt="button image"></a>
                                            @endif
                                            @if (!empty($cta_section_style1->button_image_2))
                                                <a href="{{ $cta_section_style1->button_image_url_2 }}" class="app-download-btn wow fadeInUp" data-wow-delay=".8s"><img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style1->button_image_2) }}" alt="button image"></a>
                                            @endif
                                            @if (!empty($cta_section_style1->button_image_3))
                                                <a href="{{ $cta_section_style1->button_image_url_3 }}" class="app-download-btn wow fadeInUp" data-wow-delay=".10s"><img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style1->button_image_3) }}" alt="button image"></a>
                                            @endif
                                            <div class="tri-arrow wow fadeInRight d-none d-md-inline-block" data-wow-delay="1s">
                                                <img src="{{ asset('uploads/img/dummy/icons/tir-shape.svg') }}" alt="icon image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-5 pe-xxl-5">
                                        <div class="cta-mobile-app wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.2">
                                            @if (!empty($cta_section_style1->section_image))
                                            <img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style1->section_image) }}" alt="image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="cta-banner-wrapper style-1 section-padding pt-0">
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
                            <div class="cta-banner text-white">
                                <div class="row">
                                    <div class="col-xxl-6 text-center text-xxl-start offset-xxl-1">
                                        <div class="cta-contents">
                                            <h2 class="wow fadeInUp">Download & explore the our crypto world</h2>
                                            <p class="wow fadeInUp" data-wow-delay=".3s">The most popular crypto app of today. In which you can easily get in convenient to interest on sending and receiving money.</p>
                                            <a href="#" class="app-download-btn wow fadeInUp" data-wow-delay=".6s"><img src="{{ asset('uploads/img/dummy/apple.png') }}" alt="button image"></a>
                                            <a href="#" class="app-download-btn wow fadeInUp" data-wow-delay=".8s"><img src="{{ asset('uploads/img/dummy/android.png') }}" alt="button image"></a>
                                            <div class="tri-arrow wow fadeInRight d-none d-md-inline-block" data-wow-delay="1s">
                                                <img src="{{ asset('uploads/img/dummy/icons/tir-shape.svg') }}" alt="icon image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-5 pe-xxl-5">
                                        <div class="cta-mobile-app wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.2">
                                            <img src="{{ asset('uploads/img/dummy/535x490.webp') }}" alt="image">
                                        </div>
                                    </div>
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
                    <input type="hidden" name="route" value="call-to-action.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_call_to_action') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
