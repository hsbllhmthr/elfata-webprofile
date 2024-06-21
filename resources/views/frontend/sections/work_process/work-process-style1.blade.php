@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                    <section class="content-block fix faq-wrapper section-padding section-bg">
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
                                <div class="col-lg-6 col-xl-5 mt-5 mt-lg-0 order-2 order-lg-1">
                                    @isset ($work_process_section_style1)
                                        <div class="block-contents">
                                            <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                                <h2>@php echo html_entity_decode($work_process_section_style1->title); @endphp</h2>
                                            </div>
                                        </div>
                                    @else
                                        @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="block-contents">
                                            <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                                <h2>Take full control of your crypto app</h2>
                                            </div>
                                        </div>
                                        @endif
                                    @endisset
                                        @if (is_countable($work_processes_style1) && count($work_processes_style1) > 0)
                                            <div class="step-accordion">
                                                <div class="accordion" id="accordion">

                                                    @php $i = 1; @endphp
                                                    @foreach ($work_processes_style1 as $item)
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
                                                        <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                            <h4 class="accordion-header">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}" aria-expanded="true" aria-controls="faq{{ $i }}">
                                                                    @php echo html_entity_decode($item->title); @endphp
                                                                </button>
                                                            </h4>
                                                            <div id="faq{{ $i }}" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                                                <div class="accordion-body">
                                                                    @php echo html_entity_decode($item->description); @endphp
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                    @unset($item)
                                                </div>
                                            </div>
                                        @else
                                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                            <div class="step-accordion">
                                                <div class="accordion" id="accordion">

                                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                        <h4 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                                                Download from the Play Store on any device
                                                            </button>
                                                        </h4>
                                                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                                            <div class="accordion-body">
                                                                You can easily download the xmoze app from the App Store or Google Play on any device
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".6s">
                                                        <h4 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="true" aria-controls="faq2">
                                                                Create an account with needful information
                                                            </button>
                                                        </h4>
                                                        <div id="faq2" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                                            <div class="accordion-body">
                                                                Open a secure account for yourself with your name and necessary information that need
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".9s">
                                                        <h4 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                                                Choose crypto & explore the world of crypto
                                                            </button>
                                                        </h4>
                                                        <div id="faq3" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                                            <div class="accordion-body">
                                                                Crypto transactions can be made easily, at low cost, and  private than most other transactions.
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                </div>
                                @isset ($work_process_section_style1)
                                    @if (!empty($work_process_section_style1->section_image))
                                        <div class="col-lg-6 col-xl-6 offset-xl-1 pe-xl-3 col-12 order-1 order-lg-2">
                                            <div class="block-img ms-xl-5 wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".3s">
                                                <img src="{{ asset('uploads/img/work_process/'.$work_process_section_style1->section_image) }}" alt="image">
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-lg-6 col-xl-6 offset-xl-1 pe-xl-3 col-12 order-1 order-lg-2">
                                        <div class="block-img ms-xl-5 wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".3s">
                                            <img src="{{ asset('uploads/img/dummy/540x565.webp') }}" alt="image">
                                        </div>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </section>

                @if(Auth::user())
                    @can('work process check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="work-process.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="work-process.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_work_process') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
