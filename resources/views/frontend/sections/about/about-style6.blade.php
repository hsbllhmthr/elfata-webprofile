@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($about_section_style6)
                    <section class="content-block section-padding style-2 section-bg-2 fw500">
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
                                <div class="col-xl-5 mt-5 mt-xl-0 order-2 order-xl-1">
                                    <div class="block-contents">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>@php echo html_entity_decode($about_section_style6->title); @endphp</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">@php echo html_entity_decode($about_section_style6->description); @endphp</p>
                                        @if (!empty($about_section_style6->item))
                                            @php
                                                $str = $about_section_style6->item;
                                                $array_items = explode(",",$str);
                                            @endphp
                                            <ul class="checked-list bg-checked color-set">
                                                @foreach ($array_items as $item)
                                                    <li class="wow fadeInUp" data-wow-delay=".5s">{{ $item }}</li>
                                                @endforeach
                                                @unset ($item)
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-5 offset-xl-2 ps-xl-0 order-1 order-xl-2">
                                    <div class="block-img">
                                        @if (!empty($about_section_style6->section_image))
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style6->section_image) }}" alt="image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="content-block section-padding style-2 section-bg-2 fw500">
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
                                <div class="col-xl-5 mt-5 mt-xl-0 order-2 order-xl-1">
                                    <div class="block-contents">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>Clean and full intuitive user interface system</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">The Xmoze Banking App interface is so simple that you can easily find out the details of any change, transaction account, expense in your account.</p>
                                        <ul class="checked-list bg-checked color-set">
                                            <li class="wow fadeInUp" data-wow-delay=".5s">This will help speed up your business</li>
                                            <li class="wow fadeInUp" data-wow-delay=".7s">Make money security and control easier</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-5 offset-xl-2 ps-xl-0 order-1 order-xl-2">
                                    <div class="block-img">
                                        <img src="{{ asset('uploads/img/dummy/540x450.webp') }}" alt="image">
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
                    <input type="hidden" name="route" value="about.create">
                    <input type="hidden" name="style" value="style6">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
