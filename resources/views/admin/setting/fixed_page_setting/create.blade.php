@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.fixed_page_setting') }} ({{ __('content.for_pages_without_page_builder') }})</h4>
                @if (isset($fixed_page_setting))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('fixed-page-setting.update', $fixed_page_setting->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.header_style') }}</label>
                                    <label class="img-btn">
                                        <input type="radio" name="header_style" value="style1" {{ ($fixed_page_setting->header_style == 'style1')? "checked" : "" }}>
                                        <img src="{{ asset('uploads/img/dummy/style/header-style1.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="header_style" value="style2" {{ ($fixed_page_setting->header_style == 'style2')? "checked" : "" }}>
                                        <img src="{{ asset('uploads/img/dummy/style/header-style2.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="header_style" value="style3" {{ ($fixed_page_setting->header_style == 'style3')? "checked" : "" }}>
                                        <img src="{{ asset('uploads/img/dummy/style/header-style3.jpg') }}" alt="style image">
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subscribe_section" class="col-form-label">{{ __('content.subscribe_section') }}</label>
                                    <select class="form-control" name="subscribe_section" id="subscribe_section">
                                        <option value="enable" selected>{{ __('content.select_your_option') }} </option>
                                        <option value="enable" {{ $fixed_page_setting->subscribe_section == 'enable' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="disable" {{ $fixed_page_setting->subscribe_section == 'disable' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                    <small class="form-text text-muted">{{ __('content.you_can_see_this_section_on_some_pages_that_do_not_have_a_page_builder') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.footer_style') }}</label>
                                    <label class="img-btn">
                                        <input type="radio" name="footer_style" value="style1" {{ ($fixed_page_setting->footer_style == 'style1')? "checked" : "" }}>
                                        <img src="{{ asset('uploads/img/dummy/style/footer-style1.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="footer_style" value="style2" {{ ($fixed_page_setting->footer_style == 'style2')? "checked" : "" }}>
                                        <img src="{{ asset('uploads/img/dummy/style/footer-style2.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="footer_style" value="style3" {{ ($fixed_page_setting->footer_style == 'style3')? "checked" : "" }}>
                                        <img src="{{ asset('uploads/img/dummy/style/footer-style3.jpg') }}" alt="style image">
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                            @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('fixed-page-setting.store') }}" method="POST">
                                    @csrf
                                    @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.header_style') }}</label>
                                    <label class="img-btn">
                                        <input type="radio" name="header_style" value="style1" checked>
                                        <img src="{{ asset('uploads/img/dummy/style/header-style1.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="header_style" value="style2">
                                        <img src="{{ asset('uploads/img/dummy/style/header-style2.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="header_style" value="style3">
                                        <img src="{{ asset('uploads/img/dummy/style/header-style3.jpg') }}" alt="style image">
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subscribe_section" class="col-form-label">{{ __('content.subscribe_section') }}</label>
                                    <select class="form-control" name="subscribe_section" id="subscribe_section">
                                        <option value="enable" selected>{{ __('content.select_your_option') }} </option>
                                        <option value="enable">{{ __('content.enable') }}</option>
                                        <option value="disable">{{ __('content.disable') }}</option>
                                    </select>
                                    <small class="form-text text-muted">{{ __('content.you_can_see_this_section_on_some_pages_that_do_not_have_a_page_builder') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.footer_style') }}</label>
                                    <label class="img-btn">
                                        <input type="radio" name="footer_style" value="style1" checked>
                                        <img src="{{ asset('uploads/img/dummy/style/footer-style1.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="footer_style" value="style2">
                                        <img src="{{ asset('uploads/img/dummy/style/footer-style2.jpg') }}" alt="style image">
                                    </label>

                                    <label class="img-btn">
                                        <input type="radio" name="footer_style" value="style3">
                                        <img src="{{ asset('uploads/img/dummy/style/footer-style3.jpg') }}" alt="style image">
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
