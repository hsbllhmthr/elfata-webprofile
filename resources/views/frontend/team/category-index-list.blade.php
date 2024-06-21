@if(Auth::user())
    @can('team check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="our-team-wrapper section-bg section-padding">
                    <div class="container">
                        @if(Auth::user())
                            @can('team check')
                                <!-- hover effect for mobile devices  -->
                                <div class="click-icon d-md-none text-center">
                                    <button class="custom-btn text-white">
                                        <i class="fa fa-mobile-alt text-white"></i> {{ __('content.touch') }}
                                    </button>
                                </div>
                            @endcan
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_countable($team_count_categories) && count($team_count_categories) > 0)
                                    <div class="text-center mb-5 custom-category-link">
                                        <a href="{{ url($team_index->page_uri) }}" class="mb-2">{{ __('frontend.all') }}</a>
                                        @foreach ($team_count_categories as $team_count_category)
                                            @if (isset($team_count_category->team_category->team_category_slug))
                                                    <a class="@if ($category->category_name == $team_count_category->team_category->category_name) current @endif mb-2" href="{{ route('default-team-category-index', $team_count_category->team_category->team_category_slug) }}">{{$team_count_category->team_category->category_name }} ({{ $team_count_category->category_count }})</a>
                                            @endif
                                        @endforeach
                                        @unset ($team_count_category)
                                    </div>
                                @else
                                    @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                        <div class="text-center mb-5 custom-category-link">
                                            <a href="#" class="link-dark">Management</a>
                                            <a href="#" class="link-secondary">Departments</a>
                                            <a href="#" class="link-secondary">Business Development</a>
                                            <a href="#" class="link-secondary">Research & Development</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if (is_countable($teams_paginate_style) && count($teams_paginate_style) > 0)
                            <div class="row">
                                @foreach ($teams_paginate_style as $item)
                                    <div class="col-xl-4 col-md-6">
                                        @if(Auth::user())
                                            @can('team check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="team.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="single-team-member">
                                            @if (!empty($item->section_image))
                                                <div class="member-img bg-cover" style="background-image: url({{ asset('uploads/img/team/'.$item->section_image) }})"></div>
                                            @endif
                                            <div class="member-info">
                                                <h4>{{ $item->name }}</h4>
                                                <span>{{ $item->job }}</span>
                                                @if (!empty($item->facebook_url)) <a href="{{ $item->facebook_url }}"><i class="fab fa-facebook-f"></i></a> @endif
                                                @if (!empty($item->twitter_url)) <a href="{{ $item->twitter_url }}"><i class="fab fa-twitter"></i></a> @endif
                                                @if (!empty($item->instagram_url)) <a href="{{ $item->instagram_url }}"><i class="fab fa-instagram"></i></a> @endif
                                                @if (!empty($item->youtube_url)) <a href="{{ $item->youtube_url }}"><i class="fab fa-youtube"></i></a> @endif
                                                @if (!empty($item->linkedin_url)) <a href="{{ $item->linkedin_url }}"><i class="fab fa-linkedin"></i></a> @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @unset ($item)
                            </div>
                            <div class="row mt-80">
                                <div class="col-xl-12 justify-content-center">
                                    {{ $teams_paginate_style->links() }}
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="single-team-member">
                                            <div class="member-img bg-cover" style="background-image: url({{ asset('uploads/img/dummy/435x430.webp') }})"></div>
                                            <div class="member-info">
                                                <h4>Johnny Scott</h4>
                                                <span>CEO and founder</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="single-team-member">
                                            <div class="member-img bg-cover" style="background-image: url({{ asset('uploads/img/dummy/435x430.webp') }})"></div>
                                            <div class="member-info">
                                                <h4>Marion Keith</h4>
                                                <span>Content Writer/Marketer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="single-team-member">
                                            <div class="member-img bg-cover" style="background-image: url({{ asset('uploads/img/dummy/435x430.webp') }})"></div>
                                            <div class="member-info">
                                                <h4>Romeo Noel</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>

                @if(Auth::user())
                    @can('team check')
            </div>
            <div class="easier-middle">
                @php
                    $url = request()->path();
                    $modified_url = str_replace('/', '-bracket-', $url);
                @endphp
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="team.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="team.create">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_team') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="team.index">
                    <input type="hidden" name="style" value="style1">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fas fa-people-carry text-white"></i> {{ __('content.teams') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif