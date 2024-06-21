<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Page is not found</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@if (!empty($page_builder->meta_title)) {{ $page_builder->meta_title }} @elseif  (isset($seo)) {{ $seo->meta_title }} @endif</title>

    @if (!empty($favicon->favicon_image))
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$favicon->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!-- ===========  All Stylesheet ================= -->
    <!--  Icon css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icons.css') }}">

    <!--  Bootstrap css plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <style>

        :root {
            @isset ($color_option)

            @if ($color_option->color_option != 0)
            --main-color: {{ $color_option->main_color }};
            --secondary-color: {{ $color_option->secondary_color }};
            --tertiary-color: {{ $color_option->tertiary_color }};
            --scroll-button-color: {{ $color_option->scroll_button_color }};
            --bottom-button-color: {{ $color_option->bottom_button_color }};
            --bottom-button-hover-color: {{ $color_option->bottom_button_hover_color }};
            --side-button-color: {{ $color_option->side_button_color }};
            @else
            --main-color: #1A1AFF;
            --secondary-color: #F54748;
            --tertiary-color: #ffd44b;
            --scroll-button-color: #00baa3;
            --bottom-button-color: #212529;
            --bottom-button-hover-color: #333;
            --side-button-color: #25d366;
            @endif

            @else
            --main-color: #1A1AFF;
            --secondary-color: #F54748;
            --tertiary-color: #ffd44b;
            --scroll-button-color: #00baa3;
            --bottom-button-color: #212529;
            --bottom-button-hover-color: #333;
            --side-button-color: #25d366;
        @endisset
}

    </style>
    <!--  main style css file -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!--  helper style css file -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/helper-style.css') }}">

</head>
<body class="body-wrapper">

<section class="error-404-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="error-content">
                    <img src="{{ asset('uploads/img/dummy/404.png') }}" alt="404 image">
                    <h1 class="mt-5 mb-3">Oops! Page not found.</h1>
                    <p>Sorry, an error has occured, Requested page not found!</p>
                    <a href="{{ url('/') }}" class="theme-btn mt-50">Back To Homepage</a>
                </div>
                <div class="leaf"><img src="{{ asset('uploads/img/dummy/leaf.png') }}" alt="leaf image"></div>
                <div class="leaf-copy"><img src="{{ asset('uploads/img/dummy/leaf.png') }}" alt="leaf image"></div>
            </div>
        </div>
    </div>
</section>


</body>
</html>

