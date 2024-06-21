@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($cta_section_style3)
                    <section class="cta-banner-wrapper fw500">
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
                            <div class="cta-banner-white-wrap">
                                <div class="cta-banner style-3 text-white">
                                    <div class="row">
                                        <div class="col-xl-6 text-center mt-5 mt-xl-0 order-2 order-xl-1">
                                            <div class="cta-mobile">
                                                @if (!empty($cta_section_style3->section_image))
                                                <img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style3->section_image) }}" alt="image">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center text-xl-start col-xl-6 order-1 order-xl-2">
                                            <div class="cta-contents pe-lg-5">
                                                <h2 class="wow fadeInUp">@php echo html_entity_decode($cta_section_style3->title); @endphp</h2>
                                                <p class="wow fadeInUp" data-wow-delay=".3s">@php echo html_entity_decode($cta_section_style3->description); @endphp</p>
                                                @if (!empty($cta_section_style3->button_image))
                                                    <a href="{{ $cta_section_style3->button_image_url }}" class="app-download-btn wow fadeInUp" data-wow-delay=".6s"><img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style3->button_image) }}" alt="button image"></a>
                                                @endif
                                                @if (!empty($cta_section_style3->button_image_2))
                                                    <a href="{{ $cta_section_style3->button_image_url_2 }}" class="app-download-btn wow fadeInUp" data-wow-delay=".8s"><img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style3->button_image_2) }}" alt="button image"></a>
                                                @endif
                                                @if (!empty($cta_section_style3->button_image_3))
                                                    <a href="{{ $cta_section_style3->button_image_url_3 }}" class="app-download-btn wow fadeInUp" data-wow-delay=".10s"><img src="{{ asset('uploads/img/call_to_action/'.$cta_section_style3->button_image_3) }}" alt="button image"></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="cta-banner-wrapper fw500">
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
                            <div class="cta-banner-white-wrap">
                                <div class="cta-banner style-3 text-white">
                                    <div class="row">
                                        <div class="col-xl-6 text-center mt-5 mt-xl-0 order-2 order-xl-1">
                                            <div class="cta-mobile">
                                                <img src="{{ asset('uploads/img/dummy/420x750.webp') }}" alt="image">
                                            </div>
                                        </div>
                                        <div class="text-center text-xl-start col-xl-6 order-1 order-xl-2">
                                            <div class="cta-contents pe-lg-5">
                                                <h2 class="wow fadeInUp">Download & explore best online banking</h2>
                                                <p class="wow fadeInUp" data-wow-delay=".3s">Easily download and use the most efficient online banking app. Make banking easier and faster.</p>
                                                <a href="#" class="app-download-btn wow fadeInUp" data-wow-delay=".6s"><img src="{{ asset('uploads/img/dummy/apple.png') }}" alt="button image"></a>
                                                <a href="#" class="app-download-btn wow fadeInUp" data-wow-delay=".8s"><img src="{{ asset('uploads/img/dummy/android.png') }}" alt="button image"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                @endif

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
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_call_to_action') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
