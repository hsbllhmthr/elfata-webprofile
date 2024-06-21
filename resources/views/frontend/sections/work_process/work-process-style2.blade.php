@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="content-block theme-bg section-padding fw500">
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
                            @isset($work_process_section_style2)
                                @if (!empty($work_process_section_style2->section_image))
                                    <div class="col-lg-5 pe-lg-0 col-12">
                                        <div class="mobile-block">
                                            <img src="{{ asset('uploads/img/work_process/'.$work_process_section_style2->section_image) }}" alt="image">
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-lg-5 pe-lg-0 col-12">
                                    <div class="mobile-block">
                                        <img src="{{ asset('uploads/img/dummy/520x640.webp') }}" alt="image">
                                    </div>
                                </div>
                                @endif
                            @endisset
                            <div class="col-lg-6 mt-5 mt-lg-0 offset-lg-1 col-12 ps-lg-5 pe-lg-5">
                                @isset ($work_process_section_style2)
                                    <div class="block-contents ms-xl-3">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>@php echo html_entity_decode($work_process_section_style2->title); @endphp</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">@php echo html_entity_decode($work_process_section_style2->description); @endphp</p>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="block-contents ms-xl-3">
                                        <div class="section-title mb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <h2>Simple & effortless process app setup</h2>
                                        </div>
                                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">You can easily download the app on your mobile & open a bank account in your name with the required information.</p>
                                    </div>
                                    @endif
                                @endisset
                                @if (count($work_processes_style2) > 0)
                                    <div class="step-features">
                                        @php $i = 1; @endphp
                                        @foreach ($work_processes_style2 as $item)
                                            @if(Auth::user())
                                                @can('section check')
                                                    @php
                                                        $url = request()->path();
                                                        $modified_url = str_replace('/', '-bracket-', $url);
                                                    @endphp
                                                    <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="route" value="work-process.edit">
                                                        <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                        <button type="submit" class="me-2 custom-pure-button">
                                                            <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                            <div class="single-featured-item item{{ $i++ }} wow fadeInUp" data-wow-delay=".3s">
                                                <h4>@php echo html_entity_decode($item->title); @endphp</h4>
                                                <p>@php echo html_entity_decode($item->description); @endphp</p>
                                            </div>
                                            @php
                                                if ($i == 4) {
                                                    $i = 1;
                                                }
                                            @endphp
                                        @endforeach
                                        @unset ($item)
                                    </div>
                                @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="step-features">
                                        <div class="single-featured-item item1 wow fadeInUp" data-wow-delay=".3s">
                                            <h4>Download from the Play Store on any device</h4>
                                            <p>You can easily download the xmoze app from the App Store or Google Play on any device</p>
                                        </div>
                                        <div class="single-featured-item item2 wow fadeInUp" data-wow-delay=".5s">
                                            <h4>Create an account with needful information</h4>
                                            <p>Open a secure account for yourself with your name and necessary information that need</p>
                                        </div>
                                        <div class="single-featured-item item3 wow fadeInUp" data-wow-delay=".7s">
                                            <h4>Experience best banking services anytime</h4>
                                            <p>Mobile banking allows consumers to be able to access banking services from anywhere.</p>
                                        </div>
                                    </div>
                                        @endif
                                @endif
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
                    <input type="hidden" name="route" value="work-process.create">
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="work-process.create">
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_work_process') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
