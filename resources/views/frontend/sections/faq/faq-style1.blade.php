@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="faq-video-block section-padding section-bg">
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
                            @isset ($faq_section_style1)
                                <div class="col-xl-6 pe-xl-5 col-12">
                                    <div class="faq-video-wrapper me-xl-4 d-flex justify-content-center align-items-center bg-cover bg-center" style="@if (!empty($faq_section_style1->section_image)) background-image: url('{{ asset('uploads/img/faq/'.$faq_section_style1->section_image) }}') @endif">
                                        <div class="video-play-btn">
                                            @if ($faq_section_style1->video_type == 'youtube')
                                                <a href="{{ $faq_section_style1->video_url }}" class="popup-video play-video"><i class="fas fa-play"></i></a>
                                            @else
                                                <a href="{{ $faq_section_style1->video_url }}" class="play-video"><i class="fas fa-play"></i></a>
                                            @endif
                                        </div>
                                        <div class="arrow-icon">
                                            <img src="{{ asset('uploads/img/dummy/icons/video-arrow.svg') }}" alt="image">
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                    <div class="col-xl-6 pe-xl-5 col-12">
                                        <div class="faq-video-wrapper me-xl-4 d-flex justify-content-center align-items-center bg-cover bg-center" style="background-image: url('{{ asset('uploads/img/dummy/595x615.webp') }}')">
                                            <div class="video-play-btn">
                                                <a href="https://www.youtube.com/watch?v=E1xkXZs0cAQ" class="popup-video play-video"><i class="fas fa-play"></i></a>
                                            </div>
                                            <div class="arrow-icon">
                                                <img src="{{ asset('uploads/img/dummy/icons/video-arrow.svg') }}" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset
                            <div class="col-xl-6 ps-xl-5 col-12 mt-xl-0 mt-5">
                                @isset ($faq_section_style1)
                                    @if (!empty($faq_section_style1->title))
                                        <div class="block-contents ms-xl-4">
                                            <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                                <h2>@php echo html_entity_decode($faq_section_style1->title); @endphp</h2>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="block-contents ms-xl-4">
                                            <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                                <h2>If you want to know anything, ask us</h2>
                                            </div>
                                        </div>
                                    @endif
                                @endisset
                                @if (is_countable($faqs_style1) && count($faqs_style1) > 0)
                                    <div class="faq-accordion ms-xl-4 me-xl-4">
                                        <div class="accordion" id="mainaccordion">

                                            @php $i = 1; @endphp
                                            @foreach ($faqs_style1 as $item)
                                                @if(Auth::user())
                                                    @can('section check')
                                                        @php
                                                            $url = request()->path();
                                                            $modified_url = str_replace('/', '-bracket-', $url);
                                                        @endphp
                                                        <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                            @csrf
                                                            <input type="hidden" name="route" value="faq.edit">
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
                                                        <button class="accordion-button @if ($loop->first) @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#faqask{{ $i }}" aria-expanded="@if ($loop->first) true @else false @endif" aria-controls="faqask{{ $i }}">
                                                            {{ $item->question }}
                                                        </button>
                                                    </h4>
                                                    <div id="faqask{{ $i }}" class="accordion-collapse collapse @if ($loop->first) show @endif" data-bs-parent="#mainaccordion">
                                                        <div class="accordion-body">
                                                            {{ $item->answer }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $i++; @endphp
                                            @endforeach
                                            @unset ($item)
                                        </div>
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="faq-accordion ms-xl-4 me-xl-4">
                                            <div class="accordion" id="mainaccordion">

                                                <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                    <h4 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqask1" aria-expanded="false" aria-controls="faqask1">
                                                            Is it safe to invest in cryptocurrency?
                                                        </button>
                                                    </h4>
                                                    <div id="faqask1" class="accordion-collapse collapse show" data-bs-parent="#mainaccordion">
                                                        <div class="accordion-body">
                                                            Cryptocurrency is a good investment if you want to gain direct exposure to the demand for digital currency.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".6s">
                                                    <h4 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask2" aria-expanded="true" aria-controls="faqask2">
                                                            How many altcoins are there?
                                                        </button>
                                                    </h4>
                                                    <div id="faqask2" class="accordion-collapse collapse" data-bs-parent="#mainaccordion">
                                                        <div class="accordion-body">
                                                            Cryptocurrency is a good investment if you want to gain direct exposure to the demand for digital currency.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".9s">
                                                    <h4 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask3" aria-expanded="false" aria-controls="faqask3">
                                                            Which cryptocurrency is offered here?
                                                        </button>
                                                    </h4>
                                                    <div id="faqask3" class="accordion-collapse collapse" data-bs-parent="#mainaccordion">
                                                        <div class="accordion-body">
                                                            Cryptocurrency is a good investment if you want to gain direct exposure to the demand for digital currency.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @isset ($faq_section_style1)
                                    <div class="faq-bottom ms-xl-4 mt-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".9s">
                                        <span>{{ $faq_section_style1->extra_text }}</span>
                                        @if (!empty($faq_section_style1->button_name))
                                            <a href="{{ $faq_section_style1->button_url }}">{{ $faq_section_style1->button_name }}</a>
                                        @endif
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="faq-bottom ms-xl-4 mt-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".9s">
                                            <span>Still have questions?</span><a href="#">Get in touch</a>
                                        </div>
                                    @endif
                                @endisset
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
                    <input type="hidden" name="route" value="faq.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="faq.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_faq') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
