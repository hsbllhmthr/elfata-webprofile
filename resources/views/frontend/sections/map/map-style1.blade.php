@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="contact-us-wrapper section-padding">
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
                        @isset ($map_section_style1)
                            <div class="row mt-4 mt-lg-5">
                                <div class="col-lg-8 col-xl-6 offset-xl-3 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title mb-4">
                                            <h2 class="wow fadeInUp">@php echo html_entity_decode($map_section_style1->title); @endphp</h2>
                                            <p class="wow fadeInUp pt-15" data-wow-delay=".3s">@php echo html_entity_decode($map_section_style1->description); @endphp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row mt-4 mt-lg-5">
                                <div class="col-lg-8 col-xl-6 offset-xl-3 offset-lg-2 text-center">
                                    <div class="block-contents">
                                        <div class="section-title mb-4">
                                            <h2 class="wow fadeInUp">Get in touch now!</h2>
                                            <p class="wow fadeInUp pt-15" data-wow-delay=".3s">Is there an inquiry or some feedback for us? Fill out the form to contact our team. We love to hear from you.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endisset

                        <div class="row">
                            @isset ($map_section_style1)
                                <div class="col-lg-6 pe-lg-4 order-2 order-lg-1">
                                    <div class="google-map me-lg-4 wow fadeInUp">
                                        <iframe src="{{ $map_section_style1->map_iframe }}" frameborder="0"></iframe>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-lg-6 pe-lg-4 order-2 order-lg-1">
                                    <div class="google-map me-lg-4 wow fadeInUp">
                                        <iframe src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"></iframe>
                                    </div>
                                </div>
                                @endif
                            @endisset
                            <div class="col-lg-6 pls-lg-4 wow fadeInUp order-1 order-lg-2">
                                <livewire:contact-easier/>
                            </div>
                        </div>
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
                    <input type="hidden" name="route" value="map.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif



