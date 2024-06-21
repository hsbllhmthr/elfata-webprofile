@if(Auth::user())
    @can('section check')
        <div class="easier-mode">
            <div class="easier-section-area">
                @endcan
                @endif

                <section class="crypto-currencies-wrapper fix section-black section-padding">
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
                        @isset($buy_now_section_style1)
                            <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                <div class="block-contents text-white">
                                    <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                        <h2>@php echo html_entity_decode($buy_now_section_style1->title); @endphp</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                                    <div class="block-contents text-white">
                                        <div class="section-title wow fadeInUp" data-wow-duration="1s">
                                            <h2>The most popular cryptocurrencies</h2>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endisset
                        <div class="nice-arrow-icon d-none d-lg-block wow fadeInDown" data-wow-duration="1.2s">
                            <img src="{{ asset('uploads/img/dummy/icons/nice-arrow-down.svg') }}" alt="image">
                        </div>
                        @if (is_countable($buy_nows_style1) && count($buy_nows_style1) > 0)
                            <div class="row">
                                @php $i = 1; @endphp
                                @foreach ($buy_nows_style1 as $item)
                                    <div class="col-md-6 col-xl-4 col-12">
                                        @if(Auth::user())
                                            @can('section check')
                                                @php
                                                    $url = request()->path();
                                                    $modified_url = str_replace('/', '-bracket-', $url);
                                                @endphp
                                                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="route" value="buy-now.edit">
                                                    <input type="hidden" name="single_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                                                    <button type="submit" class="me-2 custom-pure-button">
                                                        <i class="fa fa-edit text-info easier-custom-font-size-24"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                            <div class="currency-header">
                                                @if (!empty($item->section_image))
                                                    <div class="me-3 icon{{ $i++ }}">
                                                        <img src="{{ asset('uploads/img/buy_now/'.$item->section_image) }}" alt="buy now image">
                                                    </div>
                                                @endif
                                                <div class="currency-name">
                                                    <h6>@php echo html_entity_decode($item->title); @endphp</h6>
                                                    <span>@php echo html_entity_decode($item->subtitle); @endphp</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>@php echo html_entity_decode($item->description); @endphp</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>{{ $item->price }}</h5>
                                                </div>
                                                @if (!empty($item->button_name))
                                                    <div class="currency-buy-now">
                                                        <a href="{{ $item->button_url }}">{{ $item->button_name }}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        if ($i == 6) {
                                            $i = 1;
                                        }
                                    @endphp
                                @endforeach
                                @unset ($item)
                            </div>
                        @else
                            @if (Auth::user() || $draft_view == null || $draft_view->status == 'enable')
                                <div class="row">
                                    <div class="col-md-6 col-xl-4 col-12">
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                            <div class="currency-header">
                                                <div class="icon icon1">
                                                    <i class="icon-bitcoin"></i>
                                                </div>
                                                <div class="currency-name">
                                                    <h6>Bitcoin (BTC)</h6>
                                                    <span>Cryptocurrency</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>Bitcoin is the most stable and least volatile digital currency.  Bitcoin is considered an excellent inflationary hedge.</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>$56,204.37</h5>
                                                </div>
                                                <div class="currency-buy-now">
                                                    <a href="#">buy now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 col-12">
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                            <div class="currency-header">
                                                <div class="icon icon2">
                                                    <i class="icon-eth"></i>
                                                </div>
                                                <div class="currency-name">
                                                    <h6>Ethereum (ETH)</h6>
                                                    <span>Cryptocurrency</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>Ethereum is the largest and most well-established, open-ended decentralized software platform.</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>$3,979.05</h5>
                                                </div>
                                                <div class="currency-buy-now">
                                                    <a href="#">buy now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 col-12">
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                            <div class="currency-header">
                                                <div class="icon icon3">
                                                    <i class="icon-chainelink"></i>
                                                </div>
                                                <div class="currency-name">
                                                    <h6>Chainlink (LINK)</h6>
                                                    <span>Cryptocurrency</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>Chainlink is a good investment for both the short and the long term. fantastic long-term investment.</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>$5,372.67</h5>
                                                </div>
                                                <div class="currency-buy-now">
                                                    <a href="#">buy now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 col-12">
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                            <div class="currency-header">
                                                <div class="icon icon4">
                                                    <i class="icon-lcoin"></i>
                                                </div>
                                                <div class="currency-name">
                                                    <h6>Litecoin</h6>
                                                    <span>Cryptocurrency</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>Litecoin is the largest and most well-established, open-ended decentralized software platform.</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>$8,372.67</h5>
                                                </div>
                                                <div class="currency-buy-now">
                                                    <a href="#">buy now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 col-12">
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                            <div class="currency-header">
                                                <div class="icon icon5">
                                                    <i class="icon-baincoin"></i>
                                                </div>
                                                <div class="currency-name">
                                                    <h6>Binance Coin (BNB)</h6>
                                                    <span>Cryptocurrency</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>As per our short-term BNB price prediction, the Binance coin can reach $1000 by the end of the next year.</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>$542.35</h5>
                                                </div>
                                                <div class="currency-buy-now">
                                                    <a href="#">buy now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 col-12">
                                        <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                            <div class="currency-header">
                                                <div class="icon icon6">
                                                    <i class="icon-tcoin"></i>
                                                </div>
                                                <div class="currency-name">
                                                    <h6>Tether (USDT)</h6>
                                                    <span>Cryptocurrency</span>
                                                </div>
                                            </div>
                                            <div class="currency-info">
                                                <p>Create an account on the exchange, buy the Tether (USDT) crypto asset, and transfer it to your crypto wallet.</p>
                                            </div>
                                            <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                                                <div class="currency-rate">
                                                    <h5>$600.95</h5>
                                                </div>
                                                <div class="currency-buy-now">
                                                    <a href="#">buy now</a>
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
                    <input type="hidden" name="route" value="buy-now.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white me-2 mb-2">
                        <i class="fa fa-edit text-white"></i> {{ __('content.edit_section_title_description') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('site-url.index') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="route" value="buy-now.create">
                    <input type="hidden" name="style" value="">
                    <input type="hidden" name="site_url" value="{{ $modified_url }}">
                    <button type="submit" class="custom-btn text-white">
                        <i class="fa fa-plus text-white"></i> {{ __('content.add_buy_now') }}
                    </button>
                </form>
            </div>
        </div>
    @endcan
@endif
