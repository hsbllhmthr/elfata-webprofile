@if(Auth::user())
    <div class="easier-mode">
        <div class="easier-section-area">
            @endif

            <footer class="footer-wrapper footer-2">
                <div class="footer-widgets-wrapper">
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
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="single-footer-widget wow fadeInLeft">
                                    <div class="about-us-widget">
                                        @isset($footer_image_style2)
                                            @if (!empty($footer_image_style2->section_image))
                                                <a href="{{ url('/') }}" class="footer-logo d-block">
                                                    <img src="{{ asset('uploads/img/general/'.$footer_image_style2->section_image) }}" alt="logo image">
                                                </a>
                                            @endif
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <a href="#" class="footer-logo d-block">
                                                <img src="{{ asset('uploads/img/dummy/your-logo.jpg') }}" alt="xmoze">
                                            </a>
                                            @endif
                                        @endisset
                                        @isset($site_info_section_style1)
                                            <p>@php echo html_entity_decode($site_info_section_style1->description); @endphp</p>
                                        @else
                                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                                <p>Xmoze helps millions of people get the best WordPress theme design and offers software reviews, ratings, comprehensive services.</p>
                                                @endif
                                                @endisset
                                    </div>
                                </div>
                            </div>
                            @if (is_countable($footer_categories) && count($footer_categories) > 0)
                                @foreach ($footer_categories as $footer_category)
                                    <div class="col-xl-2 col-lg-3 offset-xl-1 col-md-6 col-12">
                                        <div class="single-footer-widget wow fadeInLeft" data-wow-delay=".2s">
                                            <div class="widget-title">
                                                <h5>{{ $footer_category->category_name }}</h5>
                                            </div>
                                            <ul>
                                                @foreach ($footers as $footer)
                                                    @if ($footer_category->category_name == $footer->category_name)
                                                        <li><a href="{{ $footer->url }}">{{ $footer->title }}</a></li>
                                                    @endif
                                                @endforeach
                                                @unset ($footer)
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                @unset($footer_category)
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-xl-2 col-lg-3 offset-xl-1 col-md-6 col-12">
                                    <div class="single-footer-widget wow fadeInLeft" data-wow-delay=".2s">
                                        <div class="widget-title">
                                            <h5>Company</h5>
                                        </div>
                                        <ul>
                                            <li><a href="#">About xmoze</a></li>
                                            <li><a href="#">Contact & support</a></li>
                                            <li><a href="#">Setting & privacy</a></li>
                                            <li><a href="#">Setting & privacy</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 offset-xl-1 col-md-6 col-12">
                                    <div class="single-footer-widget wow fadeInLeft" data-wow-delay=".4s">
                                        <div class="widget-title">
                                            <h5>Services</h5>
                                        </div>
                                        <ul>
                                            <li><a href="#">Incident responder</a></li>
                                            <li><a href="#">Secure managed IT</a></li>
                                            <li><a href="#">Check website Url</a></li>
                                            <li><a href="#">Locker security</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 offset-xl-1 col-md-6 col-12">
                                    <div class="single-footer-widget wow fadeInLeft" data-wow-delay=".6s">
                                        <div class="widget-title">
                                            <h5>Resources</h5>
                                        </div>
                                        <ul>
                                            <li><a href="#">Payment plans</a></li>
                                            <li><a href="#">Blogs & guides</a></li>
                                            <li><a href="#">Premium support</a></li>
                                            <li><a href="#">Our products</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-wrapper">
                    <div class="container">
                        <div class="footer-bottom-content d-md-flex justify-content-between">
                            <div class="site-copyright wow fadeInUp" data-wow-delay=".2" data-wow-duration="1s">
                                @isset ($site_info_section_style1)
                                    <p>@php echo html_entity_decode($site_info_section_style1->copyright); @endphp</p>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <p>&copy; 2024 <a href="#">ElseColor</a> All Rights Reserved.</p>
                                    @endif
                                @endisset
                            </div>
                            @if (is_countable($socials) && count($socials) > 0)
                                <div class="social-links mt-4 mt-md-0 wow fadeInUp red-color" data-wow-delay=".3" data-wow-duration="1s">
                                    @foreach ($socials as $social)
                                        <a href="{{ $social->url }}"><i class="{{ $social->social_media }}"></i></a>
                                    @endforeach
                                    @unset ($social)
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="social-links mt-4 mt-md-0 wow fadeInUp red-color" data-wow-delay=".5" data-wow-duration="1s">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </footer>

            @if(Auth::user())
        </div>
        <div class="easier-middle">
            @php
                $url = request()->path();
                $modified_url = str_replace('/', '-bracket-', $url);
            @endphp
            @can('setting check')
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="footer-image.create">
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_footer_image') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="site-info.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_site_info') }}
                    </button>
                </form>
            @endcan
            @can('section check')
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="footer.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_footer') }}
                    </button>
                </form>
            @endcan
            @can('setting check')
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="social.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_social') }}
                    </button>
                </form>
            @endcan
        </div>
    </div>
@endif
