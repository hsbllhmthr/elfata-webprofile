<?php


use App\Models\Admin\AboutSection;
use App\Models\Admin\AboutSectionCounter;
use App\Models\Admin\AboutSectionFeature;
use App\Models\Admin\Banner;
use App\Models\Admin\BannerClient;
use App\Models\Admin\BannerClientSection;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogSection;
use App\Models\Admin\BottomButtonWidget;
use App\Models\Admin\BreadcrumbImage;
use App\Models\Admin\BuyNow;
use App\Models\Admin\BuyNowSection;
use App\Models\Admin\CallToAction;
use App\Models\Admin\Career;
use App\Models\Admin\CareerSection;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ContactInfo;
use App\Models\Admin\DraftView;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Faq;
use App\Models\Admin\FaqSection;
use App\Models\Admin\Favicon;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use App\Models\Admin\Font;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\GalleryImage;
use App\Models\Admin\GalleryImageSection;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\Language;
use App\Models\Admin\Map;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\Plan;
use App\Models\Admin\PlanSection;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioSection;
use App\Models\Admin\Preloader;
use App\Models\Admin\Seo;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SideButtonWidget;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\SubscribeSection;
use App\Models\Admin\TawkTo;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use App\Models\Admin\WorkProcess;
use App\Models\Admin\WorkProcessSection;
use Illuminate\Support\Facades\DB;


// Get language for create data
function getLanguage() {

    // Retrieve active language
    $language = Language::where('status', 1)->first();

    return $language;

}

// Get site Language
function getSiteLanguage() {

    if (session()->has('language_id_from_dropdown')) {

        $language_id_from_dropdown = session()->get('language_id_from_dropdown');

        $language = Language::find($language_id_from_dropdown);

        return $language;

    } else {

        $language = Language::where('default_site_language', 1)->first();

        return $language;


    }

}

// Get common model
function getCommonModel ($language) {

    // Retrieve the first model
    $preloader = Preloader::first();
    $favicon = Favicon::first();
    $seo = Seo::first();
    $google_analytic = GoogleAnalytic::first();
    $tawk_to = TawkTo::first();
    $bottom_button_widget = BottomButtonWidget::where('language_id', $language->id)->first();
    $side_button_widget = SideButtonWidget::first();
    $color_option = ColorOption::first();
    $breadcrumb_image = BreadcrumbImage::first();
    $font = Font::first();
    $draft_view = DraftView::first();

    return array($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view);

}


// URL detection when language changes
function getPageLanguageDetection ($language) {

    // Retrieve the first model
    $service_detail_show = PageBuilder::where('language_id', $language->id)->where('page_name', 'service-detail-show')->first();
    $service_category_index = PageBuilder::where('language_id', $language->id)->where('page_name', 'service-category-index')->first();
    $team_category_index = PageBuilder::where('language_id', $language->id)->where('page_name', 'team-category-index')->first();
    $portfolio_detail_show = PageBuilder::where('language_id', $language->id)->where('page_name', 'portfolio-detail-show')->first();
    $portfolio_category_index = PageBuilder::where('language_id', $language->id)->where('page_name', 'portfolio-category-index')->first();
    $blog_detail_show = PageBuilder::where('language_id', $language->id)->where('page_name', 'blog-detail-show')->first();
    $blog_category_index = PageBuilder::where('language_id', $language->id)->where('page_name', 'blog-category-index')->first();
    $blog_tag_index = PageBuilder::where('language_id', $language->id)->where('page_name', 'blog-tag-index')->first();
    $career_detail_show = PageBuilder::where('language_id', $language->id)->where('page_name', 'career-detail-show')->first();

    return array($service_detail_show, $service_category_index, $team_category_index, $portfolio_detail_show, $portfolio_category_index, $blog_detail_show, $blog_category_index, $blog_tag_index, $career_detail_show);
}

// Set session site url
function setSessionSiteUrl ($site_url) {

        $modified_url = str_replace('-bracket-', '/', $site_url);

        // Via the global helper...
        session(['site_url' => $modified_url]);

}

// Get model
function getModel ($data_object, $language) {

    // Default values
    $blog_section_item = 3;
    $blog_limit = 6;
    $service_section_item = 3;
    $service_limit = 6;
    $portfolio_section_item = 3;
    $portfolio_limit = 6;
    $team_section_item = 3;
    $team_limit = 6;
    $gallery_section_item = 3;
    $gallery_limit = 6;
    $career_section_item = 3;
    $career_limit = 6;

    // Default value
    $header_image_style1 = null;
    $header_image_style2 = null;
    $header_image_style3 = null;
    $socials = null;
    $external_url = null;
    $menus = null;
    $banner_style1 = null;
    $banner_style2 = null;
    $banner_style3 = null;
    $banner_client_section_style3 = null;
    $banner_clients_style3 = null;
    $feature_section_style1 = null;
    $features_style1 = null;
    $features_style2 = null;
    $feature_section_style3 = null;
    $features_style3 = null;
    $about_section_style1 = null;
    $about_section_style2 = null;
    $about_section_counters_style2 = null;
    $about_section_style3 = null;
    $about_section_style4 = null;
    $about_section_style5 = null;
    $about_section_style6 = null;
    $about_section_style7 = null;
    $about_section_features_style7 = null;
    $about_section_style8 = null;
    $about_section_counters_style8 = null;
    $buy_now_section_style1 = null;
    $buy_nows_style1 = null;
    $work_process_section_style1 = null;
    $work_processes_style1 = null;
    $work_process_section_style2 = null;
    $work_processes_style2 = null;
    $testimonial_section_style1 = null;
    $testimonials_style1 = null;
    $testimonial_section_style2 = null;
    $testimonials_style2 = null;
    $testimonial_section_style3 = null;
    $testimonials_style3 = null;
    $cta_section_style1 = null;
    $cta_section_style2 = null;
    $cta_section_style3 = null;
    $subscribe_section_style1 = null;

    $service_section_style1 = null;
    $services_style1 = null;
    $service_section_paginate_style = null;
    $services_paginate_style = null;
    $service_count_categories = null;

    $faq_section_style1 = null;
    $faqs_style1 = null;
    $faq_section_style2 = null;
    $faqs_style2 = null;
    $faq_section_style3 = null;
    $faqs_style3 = null;

    $gallery_image_section_style1 = null;
    $gallery_images_style1 = null;
    $gallery_image_section_paginate_style = null;
    $gallery_images_paginate_style = null;

    $team_section_style1 = null;
    $teams_style1 = null;
    $team_section_paginate_style = null;
    $teams_paginate_style = null;
    $team_count_categories = null;

    $portfolio_section_style1 = null;
    $portfolios_style1 = null;
    $portfolio_section_paginate_style = null;
    $portfolios_paginate_style = null;
    $portfolio_count_categories = null;
    $recent_portfolios = null;

    $plan_section_style1 = null;
    $plans_style1 = null;

    $career_section_style1 = null;
    $careers_style1 = null;
    $career_section_paginate_style = null;
    $careers_paginate_style = null;
    $career_count_categories = null;

    $blog_section_style1 = null;
    $blogs_style1 = null;
    $blog_section_paginate_style = null;
    $blogs_paginate_style = null;
    $blog_count_categories = null;
    $recent_posts = null;

    $contact_infos_style1 = null;
    $map_section_style1 = null;

    $footer_image_style1 = null;
    $footer_image_style2 = null;
    $footer_image_style3 = null;
    $site_info_section_style1 = null;
    $footers = null;
    $footer_categories = null;

    foreach ($data_object as $item) {
        if ($item['id'] === 'header-style1') {
            $header_image_style1 = HeaderImage::where('style', 'style1')->first();
            $external_url = ExternalUrl::where('language_id', $language->id)->first();
            $menus = Menu::with('submenus')
                ->where('language_id', $language->id)
                ->where('status', 'published')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'header-style2') {
            $header_image_style2 = HeaderImage::where('style', 'style2')->first();
            $external_url = ExternalUrl::where('language_id', $language->id)->first();
            $menus = Menu::with('submenus')
                ->where('language_id', $language->id)
                ->where('status', 'published')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'header-style3') {
            $header_image_style3 = HeaderImage::where('style', 'style3')->first();
            $external_url = ExternalUrl::where('language_id', $language->id)->first();
            $menus = Menu::with('submenus')
                ->where('language_id', $language->id)
                ->where('status', 'published')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'banner-style1') {
            $banner_style1 = Banner::where('language_id', $language->id)->where('style', 'style1')->first();
        } elseif ($item['id'] === 'banner-style2') {
            $banner_style2 = Banner::where('language_id', $language->id)->where('style', 'style2')->first();
        } elseif ($item['id'] === 'banner-style3') {
            $banner_style3 = Banner::where('language_id', $language->id)->where('style', 'style3')->first();
            $banner_client_section_style3 = BannerClientSection::where('language_id', $language->id)->where('style', 'style3')->first();
            $banner_clients_style3 = BannerClient::where('style', 'style3')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'feature-style1') {
            $feature_section_style1 = FeatureSection::where('language_id', $language->id)->where('style', 'style1')->first();
            $features_style1 = Feature::where('language_id', $language->id)
                ->where('style', 'style1')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'feature-style2') {
            $features_style2 = Feature::where('language_id', $language->id)
                ->where('style', 'style2')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'feature-style3') {
            $feature_section_style3 = FeatureSection::where('language_id', $language->id)->where('style', 'style3')->first();
            $features_style3 = Feature::where('language_id', $language->id)
                ->where('style', 'style3')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'about-style1') {
            $about_section_style1 = AboutSection::where('language_id', $language->id)->where('style', 'style1')->first();
        } elseif ($item['id'] === 'about-style2') {
            $about_section_style2 = AboutSection::where('language_id', $language->id)->where('style', 'style2')->first();
            $about_section_counters_style2 = AboutSectionCounter::where('language_id', $language->id)
                ->where('style', 'style2')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'about-style3') {
            $about_section_style3 = AboutSection::where('language_id', $language->id)->where('style', 'style3')->first();
        } elseif ($item['id'] === 'about-style4') {
            $about_section_style4 = AboutSection::where('language_id', $language->id)->where('style', 'style4')->first();
        } elseif ($item['id'] === 'about-style5') {
            $about_section_style5 = AboutSection::where('language_id', $language->id)->where('style', 'style5')->first();
        } elseif ($item['id'] === 'about-style6') {
            $about_section_style6 = AboutSection::where('language_id', $language->id)->where('style', 'style6')->first();
        } elseif ($item['id'] === 'about-style7') {
            $about_section_style7 = AboutSection::where('language_id', $language->id)->where('style', 'style7')->first();
            $about_section_features_style7 = AboutSectionFeature::where('language_id', $language->id)
                ->where('style', 'style7')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'about-style8') {
            $about_section_style8 = AboutSection::where('language_id', $language->id)->where('style', 'style8')->first();
            $about_section_counters_style8 = AboutSectionCounter::where('language_id', $language->id)
                ->where('style', 'style8')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'buy-now-style1') {
            $buy_now_section_style1 = BuyNowSection::where('language_id', $language->id)->first();
            $buy_nows_style1 = BuyNow::where('language_id', $language->id)
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'testimonial-style1') {
            $testimonial_section_style1 = TestimonialSection::where('language_id', $language->id)->where('style', 'style1')->first();
            $testimonials_style1 = Testimonial::where('language_id', $language->id)
                ->where('style', 'style1')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'testimonial-style2') {
            $testimonial_section_style2 = TestimonialSection::where('language_id', $language->id)->where('style', 'style2')->first();
            $testimonials_style2 = Testimonial::where('language_id', $language->id)
                ->where('style', 'style2')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'testimonial-style3') {
            $testimonial_section_style3 = TestimonialSection::where('language_id', $language->id)->where('style', 'style3')->first();
            $testimonials_style3 = Testimonial::where('language_id', $language->id)
                ->where('style', 'style3')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'work-process-style1') {
            $work_process_section_style1 = WorkProcessSection::where('language_id', $language->id)->where('style', 'style1')->first();
            $work_processes_style1 = WorkProcess::where('language_id', $language->id)
                ->where('style', 'style1')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'work-process-style2') {
            $work_process_section_style2 = WorkProcessSection::where('language_id', $language->id)->where('style', 'style2')->first();
            $work_processes_style2 = WorkProcess::where('language_id', $language->id)
                ->where('style', 'style2')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'call-to-action-style1') {
            $cta_section_style1 = CallToAction::where('language_id', $language->id)->where('style', 'style1')->first();
        } elseif ($item['id'] === 'call-to-action-style2') {
            $cta_section_style2 = CallToAction::where('language_id', $language->id)->where('style', 'style2')->first();
        } elseif ($item['id'] === 'call-to-action-style3') {
            $cta_section_style3 = CallToAction::where('language_id', $language->id)->where('style', 'style3')->first();
        } elseif ($item['id'] === 'subscribe-style1') {
            $subscribe_section_style1 = SubscribeSection::where('language_id', $language->id)->where('style', 'style1')->first();
        } elseif ($item['id'] === 'service-style1' || $item['id'] === 'service-style2') {
            $service_section_style1 = ServiceSection::where('language_id', $language->id)->first();
            if (isset($service_section_style1)) {
                $service_section_item = $service_section_style1->section_item;
            }
            $services_style1 = Service::join("service_categories", 'service_categories.id', '=', 'services.category_id')
                ->where('service_categories.language_id', $language->id)
                ->where('services.style', 'style1')
                ->where('service_categories.status', 1)
                ->where('services.status', 'published')
                ->orderBy('services.order', 'asc')
                ->select('services.*', 'services.id')
                ->take($service_section_item)
                ->get();
        } elseif ($item['id'] === 'service-style3') {
            $service_section_paginate_style = ServiceSection::where('language_id', $language->id)->first();
            if (isset($service_section_paginate_style)) {
                $service_limit = $service_section_paginate_style->paginate_item;
            }
            $services_paginate_style = Service::join("service_categories",'service_categories.id', '=', 'services.category_id')
                ->where('service_categories.language_id', $language->id)
                ->where('services.style', 'style1')
                ->where('service_categories.status', 1)
                ->where('services.status', 'published')
                ->orderBy('services.order', 'asc')
                ->select('services.*', 'services.id')
                ->paginate($service_limit);
            $service_count_categories = Service::select(DB::raw('count(*) as category_count, category_id'))
                ->where('language_id', $language->id)
                ->where('services.status', 'published')
                ->groupBy('category_id')
                ->get();
        } elseif ($item['id'] === 'faq-style1') {
            $faq_section_style1 = FaqSection::where('language_id', $language->id)->where('style', 'style1')->first();
            $faqs_style1 = Faq::where('language_id', $language->id)
                ->where('style', 'style1')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'faq-style2') {
            $faq_section_style2 = FaqSection::where('language_id', $language->id)->where('style', 'style2')->first();
            $faqs_style2 = Faq::where('language_id', $language->id)
                ->where('style', 'style2')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'faq-style3') {
            $faq_section_style3 = FaqSection::where('language_id', $language->id)->where('style', 'style3')->first();
            $faqs_style3 = Faq::where('language_id', $language->id)
                ->where('style', 'style3')
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'gallery-style1') {
            $gallery_image_section_style1 = GalleryImageSection::where('language_id', $language->id)->first();
            if (isset($gallery_image_section_style1)) {
                $gallery_section_item = $gallery_image_section_style1->section_item;
            }
            $gallery_images_style1 = GalleryImage::where('language_id', $language->id)
                ->orderBy('order', 'asc')
                ->take($gallery_section_item)
                ->get();
        } elseif ($item['id'] === 'gallery-style2') {
            $gallery_image_section_paginate_style = GalleryImageSection::where('language_id', $language->id)->first();
            if (isset($gallery_image_section_paginate_style)) {
                $gallery_limit = $gallery_image_section_paginate_style->paginate_item;
            }
            $gallery_images_paginate_style = GalleryImage::where('language_id', $language->id)
                ->orderBy('order', 'asc')
                ->paginate($gallery_limit);
        } elseif ($item['id'] === 'team-style1') {
            $team_section_style1 = TeamSection::where('language_id', $language->id)->first();
            if (isset($team_section_style1)) {
                $team_section_item = $team_section_style1->section_item;
            }
            $teams_style1 = Team::join("team_categories", 'team_categories.id', '=', 'teams.category_id')
                ->where('team_categories.language_id', $language->id)
                ->where('teams.style', 'style1')
                ->where('team_categories.status', 1)
                ->where('teams.status', 'published')
                ->orderBy('teams.order', 'asc')
                ->select('teams.*', 'teams.id')
                ->take($team_section_item)
                ->get();
        } elseif ($item['id'] === 'team-style2') {
            $team_section_paginate_style = TeamSection::where('language_id', $language->id)->first();
            if (isset($team_section_paginate_style)) {
                $team_limit = $team_section_paginate_style->paginate_item;
            }
            $teams_paginate_style = Team::join("team_categories",'team_categories.id', '=', 'teams.category_id')
                ->where('team_categories.language_id', $language->id)
                ->where('teams.style', 'style1')
                ->where('team_categories.status', 1)
                ->where('teams.status', 'published')
                ->orderBy('teams.order', 'asc')
                ->select('teams.*', 'teams.id')
                ->paginate($team_limit);
            $team_count_categories = Team::select(DB::raw('count(*) as category_count, category_id'))
                ->where('language_id', $language->id)
                ->where('teams.status', 'published')
                ->groupBy('category_id')
                ->get();
        } elseif ($item['id'] === 'portfolio-style1') {
            $portfolio_section_style1 = PortfolioSection::where('language_id', $language->id)->first();
            if (isset($portfolio_section_style1)) {
                $portfolio_section_item = $portfolio_section_style1->section_item;
            }
            $portfolios_style1 = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
                ->where('portfolio_categories.language_id', $language->id)
                ->where('portfolios.style', 'style1')
                ->where('portfolio_categories.status', 1)
                ->where('portfolios.status', 'published')
                ->orderBy('portfolios.order', 'asc')
                ->select('portfolios.*', 'portfolios.id')
                ->take($portfolio_section_item)
                ->get();
        }  elseif ($item['id'] === 'portfolio-style2') {
            $portfolio_section_paginate_style = PortfolioSection::where('language_id', $language->id)->first();
            if (isset($portfolio_section_paginate_style)) {
                $portfolio_limit = $portfolio_section_paginate_style->paginate_item;
            }
            $portfolios_paginate_style = Portfolio::join("portfolio_categories",'portfolio_categories.id', '=', 'portfolios.category_id')
                ->where('portfolio_categories.language_id', $language->id)
                ->where('portfolios.style', 'style1')
                ->where('portfolio_categories.status', 1)
                ->where('portfolios.status', 'published')
                ->orderBy('portfolios.order', 'asc')
                ->select('portfolios.*', 'portfolios.id')
                ->paginate($portfolio_limit);
            $portfolio_count_categories = Portfolio::select(DB::raw('count(*) as category_count, category_id'))
                ->where('language_id', $language->id)
                ->where('portfolios.status', 'published')
                ->groupBy('category_id')
                ->get();
        } elseif ($item['id'] === 'portfolio-style3') {
            $recent_portfolios = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
                ->where('portfolio_categories.language_id', $language->id)
                ->where('portfolio_categories.status', 1)
                ->where('portfolios.status', 'published')
                ->orderBy('portfolios.order', 'asc')
                ->select('portfolios.*', 'portfolios.id')
                ->take(8)
                ->get();
        } elseif ($item['id'] === 'plan-style1') {
            $plan_section_style1 = PlanSection::where('language_id', $language->id)->first();
            $plans_style1 = Plan::where('language_id', $language->id)
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'career-style1') {
            $career_section_style1 = CareerSection::where('language_id', $language->id)->first();
            if (isset($career_section_style1)) {
                $career_section_item = $career_section_style1->section_item;
            }
            $careers_style1 = Career::join("career_categories", 'career_categories.id', '=', 'careers.category_id')
                ->where('career_categories.language_id', $language->id)
                ->where('careers.style', 'style1')
                ->where('career_categories.status', 1)
                ->where('careers.status', 'published')
                ->orderBy('careers.order', 'asc')
                ->select('careers.*', 'careers.id')
                ->take($career_section_item)
                ->get();
        } elseif ($item['id'] === 'career-style2') {
            $career_section_paginate_style = CareerSection::where('language_id', $language->id)->first();
            if (isset($career_section_paginate_style)) {
                $career_limit = $career_section_paginate_style->paginate_item;
            }
            $careers_paginate_style = Career::join("career_categories",'career_categories.id', '=', 'careers.category_id')
                ->where('career_categories.language_id', $language->id)
                ->where('careers.style', 'style1')
                ->where('career_categories.status', 1)
                ->where('careers.status', 'published')
                ->orderBy('careers.order', 'asc')
                ->select('careers.*', 'careers.id')
                ->paginate($career_limit);
        } elseif ($item['id'] === 'blog-style1') {
            $blog_section_style1 = BlogSection::where('language_id', $language->id)->first();
            if (isset($blog_section_style1)) {
                $blog_section_item = $blog_section_style1->section_item;
            }
            $blogs_style1 = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
                ->where('categories.language_id', $language->id)
                ->where('categories.status', 1)
                ->where('blogs.status', 'published')
                ->orderBy('blogs.order', 'asc')
                ->select('blogs.*', 'blogs.id')
                ->take($blog_section_item)
                ->get();
        } elseif ($item['id'] === 'blog-style2') {
            $blog_section_paginate_style = BlogSection::where('language_id', $language->id)->first();
            if (isset($blog_section_paginate_style)) {
                $blog_limit = $blog_section_paginate_style->paginate_item;
            }
            $blogs_paginate_style = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
                ->where('categories.language_id', $language->id)
                ->where('categories.status', 1)
                ->where('blogs.status', 'published')
                ->orderBy('blogs.id', 'desc')
                ->paginate($blog_limit);
            $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
                ->where('language_id', $language->id)
                ->where('blogs.status', 'published')
                ->groupBy('category_id')
                ->get();
        } elseif ($item['id'] === 'contact-style1') {
            $contact_infos_style1 = ContactInfo::where('language_id', $language->id)
                ->orderBy('order', 'asc')
                ->get();
        } elseif ($item['id'] === 'map-style1') {
            $map_section_style1 = Map::where('language_id', $language->id)->first();
        } elseif ($item['id'] === 'footer-style1') {
            $footer_image_style1 = FooterImage::where('style', 'style1')->first();
            $site_info_section_style1 = SiteInfo::where('language_id', $language->id)->first();
            $footers = Footer::join("footer_categories", 'footer_categories.id', '=', 'footers.category_id')
                ->where('footer_categories.language_id', $language->id)
                ->where('footer_categories.status', 1)
                ->where('footers.status', 'published')
                ->orderBy('footers.id', 'asc')
                ->get();
            $footer_categories = FooterCategory::where('language_id', $language->id)
                ->where('footer_categories.status', 1)
                ->orderBy('order', 'asc')
                ->get();
            $socials = Social::where('status', 1)->get();
        } elseif ($item['id'] === 'footer-style2') {
            $footer_image_style2 = FooterImage::where('style', 'style2')->first();
            $site_info_section_style1 = SiteInfo::where('language_id', $language->id)->first();
            $footers = Footer::join("footer_categories", 'footer_categories.id', '=', 'footers.category_id')
                ->where('footer_categories.language_id', $language->id)
                ->where('footer_categories.status', 1)
                ->where('footers.status', 'published')
                ->orderBy('footers.id', 'asc')
                ->get();
            $footer_categories = FooterCategory::where('language_id', $language->id)
                ->where('footer_categories.status', 1)
                ->orderBy('order', 'asc')
                ->get();
            $socials = Social::where('status', 1)->get();
        }  elseif ($item['id'] === 'footer-style3') {
            $footer_image_style3 = FooterImage::where('style', 'style3')->first();
            $site_info_section_style1 = SiteInfo::where('language_id', $language->id)->first();
            $footers = Footer::join("footer_categories", 'footer_categories.id', '=', 'footers.category_id')
                ->where('footer_categories.language_id', $language->id)
                ->where('footer_categories.status', 1)
                ->where('footers.status', 'published')
                ->orderBy('footers.id', 'asc')
                ->get();
            $footer_categories = FooterCategory::where('language_id', $language->id)
                ->where('footer_categories.status', 1)
                ->orderBy('order', 'asc')
                ->get();
            $socials = Social::where('status', 1)->get();
        }

    }

    return [
        'header_image_style1' => $header_image_style1,
        'header_image_style2' => $header_image_style2,
        'header_image_style3' => $header_image_style3,
        'socials' => $socials,
        'external_url' => $external_url,
        'menus' => $menus,
        'banner_style1' => $banner_style1,
        'banner_style2' => $banner_style2,
        'banner_style3' => $banner_style3,
        'banner_client_section_style3' => $banner_client_section_style3,
        'banner_clients_style3' => $banner_clients_style3,
        'feature_section_style1' => $feature_section_style1,
        'features_style1' => $features_style1,
        'features_style2' => $features_style2,
        'feature_section_style3' => $feature_section_style3,
        'features_style3' => $features_style3,
        'about_section_style1' => $about_section_style1,
        'about_section_style2' => $about_section_style2,
        'about_section_counters_style2' => $about_section_counters_style2,
        'about_section_style3' => $about_section_style3,
        'about_section_style4' => $about_section_style4,
        'about_section_style5' => $about_section_style5,
        'about_section_style6' => $about_section_style6,
        'about_section_style7' => $about_section_style7,
        'about_section_features_style7' => $about_section_features_style7,
        'about_section_style8' => $about_section_style8,
        'about_section_counters_style8' => $about_section_counters_style8,
        'buy_now_section_style1' => $buy_now_section_style1,
        'buy_nows_style1' => $buy_nows_style1,
        'work_process_section_style1' => $work_process_section_style1,
        'work_processes_style1' => $work_processes_style1,
        'work_process_section_style2' => $work_process_section_style2,
        'work_processes_style2' => $work_processes_style2,
        'testimonial_section_style1' => $testimonial_section_style1,
        'testimonials_style1' => $testimonials_style1,
        'testimonial_section_style2' => $testimonial_section_style2,
        'testimonials_style2' => $testimonials_style2,
        'testimonial_section_style3' => $testimonial_section_style3,
        'testimonials_style3' => $testimonials_style3,
        'faq_section_style1' => $faq_section_style1,
        'faqs_style1' => $faqs_style1,
        'faq_section_style2' => $faq_section_style2,
        'faqs_style2' => $faqs_style2,
        'faq_section_style3' => $faq_section_style3,
        'faqs_style3' => $faqs_style3,
        'plan_section_style1' => $plan_section_style1,
        'plans_style1' => $plans_style1,
        'subscribe_section_style1' => $subscribe_section_style1,
        'cta_section_style1' => $cta_section_style1,
        'cta_section_style2' => $cta_section_style2,
        'cta_section_style3' => $cta_section_style3,
        'contact_infos_style1' => $contact_infos_style1,
        'map_section_style1' => $map_section_style1,
        'service_section_style1' => $service_section_style1,
        'services_style1' => $services_style1,
        'service_section_paginate_style' => $service_section_paginate_style,
        'services_paginate_style' => $services_paginate_style,
        'service_count_categories' => $service_count_categories,
        'gallery_image_section_style1' => $gallery_image_section_style1,
        'gallery_images_style1' => $gallery_images_style1,
        'gallery_images_paginate_style' => $gallery_images_paginate_style,
        'team_section_style1' => $team_section_style1,
        'teams_style1' => $teams_style1,
        'teams_paginate_style' => $teams_paginate_style,
        'team_count_categories' => $team_count_categories,
        'portfolio_section_style1' => $portfolio_section_style1,
        'portfolios_style1' => $portfolios_style1,
        'portfolio_section_paginate_style' => $portfolio_section_paginate_style,
        'portfolios_paginate_style' => $portfolios_paginate_style,
        'portfolio_count_categories' => $portfolio_count_categories,
        'recent_portfolios' => $recent_portfolios,
        'career_section_style1' => $career_section_style1,
        'careers_style1' => $careers_style1,
        'career_section_paginate_style' => $career_section_paginate_style,
        'careers_paginate_style' => $careers_paginate_style,
        'blog_section_style1' => $blog_section_style1,
        'blogs_style1' => $blogs_style1,
        'blogs_paginate_style' => $blogs_paginate_style,
        'blog_count_categories' => $blog_count_categories,
        'footer_image_style1' => $footer_image_style1,
        'footer_image_style2' => $footer_image_style2,
        'footer_image_style3' => $footer_image_style3,
        'site_info_section_style1' => $site_info_section_style1,
        'footers' => $footers,
        'footer_categories' => $footer_categories,

    ];


}


