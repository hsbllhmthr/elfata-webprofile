@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="faq-ask-wrapper section-padding">
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
                        @isset ($faq_section_style3)
                            @if (!empty($faq_section_style3->title))
                                <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                    <div class="block-contents fw500">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                            <h2>@php echo html_entity_decode($faq_section_style3->title); @endphp</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                <div class="block-contents fw500">
                                    <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                        <h2>If you want to know anything, ask us</h2>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endisset

                        @if (is_countable($faqs_style3) && count($faqs_style3) > 0)
                            <div class="row faq-ask">
                                <div class="col-lg-6 col-12">
                                    <div class="faq-accordion">
                                        <div class="accordion" id="mainaccordion">
                                            @php
                                                $the_number_of_faqs = count($faqs_style3);
                                                if ($the_number_of_faqs %2 == 0) {
                                                    $half_of_faqs = $the_number_of_faqs / 2 + 1;
                                                }
                                                else {
                                                    $half_of_faqs = (integer)($the_number_of_faqs / 2) + 2;
                                                }
                                                $i = 1;
                                            @endphp
                                            @foreach ($faqs_style3 as $faq_style3)
                                                @if ($loop->iteration < $half_of_faqs)
                                                    @if(Auth::user())
                                                        @can('section check')
                                                            @php
                                                                $url = request()->path();
                                                                $modified_url = str_replace('/', '-bracket-', $url);
                                                            @endphp
                                                            <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                                @csrf
                                                                <input type="hidden" name="route" value="faq.edit">
                                                                <input type="hidden" name="single_id" value="{{ $faq_style3->id }}">
                                                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                                <button type="submit" class="me-2 custom-pure-button">
                                                                    <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    @endif
                                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                        <h4 class="accordion-header">
                                                            <button class="accordion-button @if ($loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#faqask{{ $i }}" aria-expanded="false" aria-controls="faqask{{ $i }}">
                                                                {{ $faq_style3->question }}
                                                            </button>
                                                        </h4>
                                                        <div id="faqask{{ $i }}" class="accordion-collapse collapse @if ($loop->first) show @endif" data-bs-parent="#mainaccordion">
                                                            <div class="accordion-body">
                                                                @php echo html_entity_decode($faq_style3->answer); @endphp
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @break
                                                @endif
                                                @php $i++; @endphp
                                            @endforeach
                                            @unset($faq_style3)

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="faq-accordion">
                                        <div class="accordion" id="faqtwo">
                                            @php $i++; @endphp
                                            @foreach ($faqs_style3 as $faq_style3)
                                                @if ($loop->iteration >= $half_of_faqs)
                                                    @if(Auth::user())
                                                        @can('section check')
                                                            @php
                                                                $url = request()->path();
                                                                $modified_url = str_replace('/', '-bracket-', $url);
                                                            @endphp
                                                            <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                                @csrf
                                                                <input type="hidden" name="route" value="faq.edit">
                                                                <input type="hidden" name="single_id" value="{{ $faq_style3->id }}">
                                                                <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                                <button type="submit" class="me-2 custom-pure-button">
                                                                    <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    @endif
                                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                        <h4 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqask{{ $i }}" aria-expanded="false" aria-controls="faqask{{ $i }}">
                                                                {{ $faq_style3->question }}
                                                            </button>
                                                        </h4>
                                                        <div id="faqask{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqtwo">
                                                            <div class="accordion-body">
                                                                @php echo html_entity_decode($faq_style3->answer); @endphp
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $i++; @endphp
                                                @endif
                                            @endforeach
                                            @unset($faq_style3)

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row faq-ask">
                                <div class="col-lg-6 col-12">
                                    <div class="faq-accordion">
                                        <div class="accordion" id="mainaccordion">
                                            <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqask1" aria-expanded="false" aria-controls="faqask1">
                                                        What can I do with Online Banking?
                                                    </button>
                                                </h4>
                                                <div id="faqask1" class="accordion-collapse collapse show" data-bs-parent="#mainaccordion">
                                                    <div class="accordion-body">
                                                        You can view account balances and transaction history, and transfer money between CSB accounts. You can online bill Payment that allows you to pay your bills quickly and easily!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".6s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask2" aria-expanded="true" aria-controls="faqask2">
                                                        When do I have access to use Online Banking?
                                                    </button>
                                                </h4>
                                                <div id="faqask2" class="accordion-collapse collapse" data-bs-parent="#mainaccordion">
                                                    <div class="accordion-body">
                                                        You can view account balances and transaction history, and transfer money between CSB accounts. You can online bill Payment that allows you to pay your bills quickly and easily!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".9s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask3" aria-expanded="false" aria-controls="faqask3">
                                                        How current is my banking information?
                                                    </button>
                                                </h4>
                                                <div id="faqask3" class="accordion-collapse collapse" data-bs-parent="#mainaccordion">
                                                    <div class="accordion-body">
                                                        You can view account balances and transaction history, and transfer money between CSB accounts. You can online bill Payment that allows you to pay your bills quickly and easily!
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="faq-accordion">
                                        <div class="accordion" id="faqtwo">
                                            <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask11" aria-expanded="true" aria-controls="faqask11">
                                                        What happens if I forget or lose my password?
                                                    </button>
                                                </h4>
                                                <div id="faqask11" class="accordion-collapse collapse" data-bs-parent="#faqtwo">
                                                    <div class="accordion-body">
                                                        You can view account balances and transaction history, and transfer money between CSB accounts. You can online bill Payment that allows you to pay your bills quickly and easily!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".6s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask22" aria-expanded="true" aria-controls="faqask22">
                                                        Is my mobile device secure to use?
                                                    </button>
                                                </h4>
                                                <div id="faqask22" class="accordion-collapse collapse" data-bs-parent="#faqtwo">
                                                    <div class="accordion-body">
                                                        You can view account balances and transaction history, and transfer money between CSB accounts. You can online bill Payment that allows you to pay your bills quickly and easily!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".9s">
                                                <h4 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqask33" aria-expanded="false" aria-controls="faqask33">
                                                        Can I change my password on my banking app?
                                                    </button>
                                                </h4>
                                                <div id="faqask33" class="accordion-collapse collapse" data-bs-parent="#faqtwo">
                                                    <div class="accordion-body">
                                                        You can view account balances and transaction history, and transfer money between CSB accounts. You can online bill Payment that allows you to pay your bills quickly and easily!
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif
                        @endif
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
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="faq.create">
                    <input type="hidden" name="style" value="style3">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_faq') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
