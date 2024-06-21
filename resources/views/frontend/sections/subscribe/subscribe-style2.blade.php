@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <div class="newsletter-subscribe-widgets text-white">
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
                    @isset ($subscribe_section_style2)
                        <div class="wid-title">
                            <h5>@php echo html_entity_decode($subscribe_section_style2->title); @endphp</h5>
                        </div>
                        <p>@php echo html_entity_decode($subscribe_section_style2->description); @endphp</p>
                    @else
                        <div class="wid-title">
                            <h5>Join Us!</h5>
                        </div>
                        <p>Subscribe our newsletter and stay up to date about the company</p>
                    @endisset
                    <div class="newsletter-subscribe">
                        @include('frontend.sections.subscribe.style2-subscribe')
                    </div>
                </div>

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
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2"><i class="fa fa-plus text-white"></i> {{ __('content.edit_subscribe') }}</button>
                </form>
            </div>
        </div>
    @endcan
@endif
