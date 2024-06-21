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
                        @if (is_countable($contact_infos_style1) && count($contact_infos_style1) > 0)
                            <div class="row text-center">
                               @foreach ($contact_infos_style1 as $item)
                                    <div class="col-md-6 col-xl-4">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="contact-info.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="single-contact-box box{{ $loop->iteration }}">
                                           @if ($item->type == "image")
                                               @if (!empty($item->section_image))
                                                    <div class="icon" style="line-height: 50px;">
                                                        <img src="{{ asset('uploads/img/contact_info/'.$item->section_image) }}" alt="contact image"/>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="icon">
                                                    <i class="{{ $item->icon }}"></i>
                                                </div>
                                            @endif
                                            <div class="contact-info">
                                                @php echo html_entity_decode($item->description); @endphp
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                            <div class="row text-center">
                                <div class="col-md-6 col-xl-4">
                                    <div class="single-contact-box box1">
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="contact-info">
                                            <span>+088-436-258-001</span>
                                            <span>+991-656-654-988</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="single-contact-box box2">
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="contact-info">
                                            <span>info@example.com</span>
                                            <span>job@example.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="single-contact-box box3">
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-info">
                                            <span>2118 Thornridge Cir, New York.</span>
                                            <span>4140 Rd. Allentown, Mexico.</span>
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
                    <input type="hidden" name="route" value="contact-info.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_contact_info') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
