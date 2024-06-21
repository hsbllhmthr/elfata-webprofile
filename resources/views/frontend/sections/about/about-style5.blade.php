@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                @isset ($about_section_style5)
                    <section class="content-block style-2 section-padding fw500">
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
                                @if (!empty($about_section_style5->section_image))
                                    <div class="col-xl-5 pe-xl-0">
                                        <div class="block-img">
                                            <img src="{{ asset('uploads/img/about/'.$about_section_style5->section_image) }}" alt="image">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-6 mt-5 mt-xl-0 offset-xl-1 ps-xl-5">
                                    <div class="block-contents">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>@php echo html_entity_decode($about_section_style5->title); @endphp</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">@php echo html_entity_decode($about_section_style5->description); @endphp</p>
                                        @if (!empty($about_section_style5->item))
                                            @php
                                                $str = $about_section_style5->item;
                                                $array_items = explode(",",$str);
                                            @endphp
                                            <ul class="checked-list bg-checked">
                                                @foreach ($array_items as $item)
                                                    <li class="wow fadeInUp" data-wow-delay=".5s">{{ $item }}</li>
                                                @endforeach
                                                @unset ($item)
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                    <section class="content-block style-2 section-padding fw500">
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
                                <div class="col-xl-5 pe-xl-0">
                                    <div class="block-img">
                                        <img src="{{ asset('uploads/img/dummy/540x450.webp') }}" alt="about image">
                                    </div>
                                </div>
                                <div class="col-xl-6 mt-5 mt-xl-0 offset-xl-1 ps-xl-5">
                                    <div class="block-contents">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>Smart banking app that you must like</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Online and mobile banking makes handling your finances easier and more convenient, but it is imperative to make sure that you are protecting your financial information.</p>
                                        <ul class="checked-list bg-checked">
                                            <li class="wow fadeInUp" data-wow-delay=".5s">Calculate input output results easily</li>
                                            <li class="wow fadeInUp" data-wow-delay=".7s">Prevent waste and increase income</li>
                                        </ul>
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
                    <input type="hidden" name="style" value="style5">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_about') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
