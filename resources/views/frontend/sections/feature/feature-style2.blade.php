@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="core-features-wrapper section-padding mtm-30">
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
                            @if (is_countable($features_style2) && count($features_style2) > 0)
                                @foreach ($features_style2 as $item)
                                    <div class="col-md-6 col-xl-3 col-12">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="feature.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="single-core-feature">
                                            @if ($item->type == 'image')
                                                @if (!empty($item->section_image))
                                                    <div class="icon">
                                                        <img src="{{ asset('uploads/img/feature/'.$item->section_image) }}" alt="feature image">
                                                    </div>
                                                @endif
                                            @else
                                                <div class="icon">
                                                    <i class="{{ $item->icon }} custom-font-size-64"></i>
                                                </div>
                                            @endif
                                            <div class="content">
                                                <h3>@php echo html_entity_decode($item->title); @endphp</h3>
                                                <p>@php echo html_entity_decode($item->description); @endphp</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-md-6 col-xl-3 col-12">
                                    <div class="single-core-feature">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/icons/love.svg') }}" alt="icon image">
                                        </div>
                                        <div class="content">
                                            <h3>Lifetime Access</h3>
                                            <p>With this software you will get lifetime access very easily</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 col-12">
                                    <div class="single-core-feature">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/icons/grid.svg') }}" alt="icon image">
                                        </div>
                                        <div class="content">
                                            <h3>Simple Layout</h3>
                                            <p>Software with easy layout for easy understanding & working</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 col-12">
                                    <div class="single-core-feature">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/icons/manibag.svg') }}" alt="icon image">
                                        </div>
                                        <div class="content">
                                            <h3>Quick Customizable</h3>
                                            <p>With this software you can sort everything as you like</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 col-12">
                                    <div class="single-core-feature">
                                        <div class="icon">
                                            <img src="{{ asset('uploads/img/dummy/icons/notifications.svg') }}" alt="icon image">
                                        </div>
                                        <div class="content">
                                            <h3>Reduce Expenses</h3>
                                            <p>You can reduce expenses by managing your business well</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
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
                    <input type="hidden" name="route" value="feature.create">
                    <input type="hidden" name="style" value="style2">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_feature') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
