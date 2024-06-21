@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="cta-banner-wrapper section-padding pt-0">
                    <div class="container">
                        <div class="cta-banner newsletter-box text-white">
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
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 text-center col-xl-8 offset-xl-2">
                                    <div class="cta-contents">
                                        @isset ($subscribe_section_style1)
                                            <h2 class="wow fadeInUp">@php echo html_entity_decode($subscribe_section_style1->description); @endphp</h2>
                                        @else
                                            <h2 class="wow fadeInUp">Are you interested in doing your project with us?</h2>
                                        @endisset

                                        @include('frontend.sections.subscribe.style1-subscribe')

                                        <div class="arrow-shape">
                                            <img src="{{ asset('uploads/img/dummy/icons/arrow-shape.png') }}" alt="shape icon">
                                        </div>
                                    </div>
                                </div>
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
                    <input type="hidden" name="route" value="subscribe-section.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.edit_subscribe') }}</button>
                </form>
            </div>
        </div>
    @endcan
@endif
