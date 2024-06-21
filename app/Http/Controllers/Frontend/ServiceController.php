<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\FixedPageSetting;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceCategory;
use App\Models\Admin\ServiceContent;
use App\Models\Admin\ServiceItem;
use App\Models\Admin\ServiceProcess;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($service_slug = null)
    {

        // Default values
        $header_image_style1= null;
        $header_image_style2= null;
        $header_image_style3= null;
        $footer_image_style1= null;
        $footer_image_style2= null;
        $footer_image_style3= null;
        $service_content = null;
        $service_processes = null;
        $service_items = null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'service-detail-show')->first();

        // Retrieve models
        $fixed_page_setting = FixedPageSetting::first();
        if (isset($fixed_page_setting)) {
            if ($fixed_page_setting->header_style == 'style1') {
                $header_image_style1 = HeaderImage::where('style', 'style1')->first();
            } elseif ($fixed_page_setting->header_style == 'style2') {
                $header_image_style2 = HeaderImage::where('style', 'style2')->first();
            } else {
                $header_image_style3 = HeaderImage::where('style', 'style3')->first();
            }
        } else {
            $header_image_style1 = HeaderImage::where('style', 'style1')->first();
        }
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $menus = Menu::with('submenus')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();

        $service = Service::where('services.service_slug', '=', $service_slug)
            ->first();
        if (!isset($service)) {
            abort(404);
        }
        if (isset($service)) {
            $service_content = ServiceContent::where('service_id', $service->id)->first();
            $service_processes = ServiceProcess::where('service_id', $service->id)
                ->orderBy('id', 'desc')
                ->get();
            $service_items = ServiceItem::where('service_id', $service->id)
                ->orderBy('id', 'desc')
                ->get();
        }
        $service_count_categories = Service::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('services.status', 'published')
            ->groupBy('category_id')
            ->get();

        if (isset($fixed_page_setting)) {
            if ($fixed_page_setting->footer_style == 'style1') {
                $footer_image_style1 = FooterImage::where('style', 'style1')->first();
            } elseif ($fixed_page_setting->footer_style == 'style2') {
                $footer_image_style2 = FooterImage::where('style', 'style2')->first();
            } else {
                $footer_image_style3 = FooterImage::where('style', 'style3')->first();
            }
        } else {
            $footer_image_style1 = FooterImage::where('style', 'style1')->first();
        }
        $site_info_section_style1 = SiteInfo::where('language_id', $language->id)->first();
        $socials = Social::where('status', 1)->get();
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

        return view('frontend.service.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'page_builder', 'service', 'service_content', 'service_items',
            'service_processes', 'service_count_categories', 'site_info_section_style1', 'socials',
            'footers', 'footer_categories', 'fixed_page_setting', 'header_image_style1', 'header_image_style2',
            'header_image_style3', 'footer_image_style1', 'footer_image_style2', 'footer_image_style3'));

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_index ($category_name = null) {
        // Default values
        $service_limit = 6;
        $header_image_style1= null;
        $header_image_style2= null;
        $header_image_style3= null;
        $footer_image_style1= null;
        $footer_image_style2= null;
        $footer_image_style3= null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'service-category-index')->first();

        // URL detection when language changes
        $service_index = PageBuilder::where('page_name', 'service-index')->first();

        // Retrieve models
        $fixed_page_setting = FixedPageSetting::first();
        if (isset($fixed_page_setting)) {
            if ($fixed_page_setting->header_style == 'style1') {
                $header_image_style1 = HeaderImage::where('style', 'style1')->first();
            } elseif ($fixed_page_setting->header_style == 'style2') {
                $header_image_style2 = HeaderImage::where('style', 'style2')->first();
            } else {
                $header_image_style3 = HeaderImage::where('style', 'style3')->first();
            }
        } else {
            $header_image_style1 = HeaderImage::where('style', 'style1')->first();
        }
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $menus = Menu::with('submenus')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();

        $service_section_paginate_style = ServiceSection::where('language_id', $language->id)->first();
        if (isset($service_section_paginate_style)) {
            $service_limit = $service_section_paginate_style->paginate_item;
        }

        $services_paginate_style = Service::join("service_categories",'service_categories.id', '=', 'services.category_id')
            ->where('service_categories.language_id', $language->id)
            ->where('style', 'style1')
            ->where('service_categories.service_category_slug', '=', $category_name)
            ->where('service_categories.status', 1)
            ->where('services.status', 'published')
            ->orderBy('services.order', 'asc')
            ->select('services.*', 'services.id')
            ->paginate($service_limit);

        $category = ServiceCategory::where('language_id', $language->id)
            ->where('service_category_slug', '=', $category_name)->first();

        if (count($services_paginate_style) < 1) {
            abort(404);
        }

        $service_count_categories = Service::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('services.status', 'published')
            ->groupBy('category_id')
            ->get();

        if (isset($fixed_page_setting)) {
            if ($fixed_page_setting->footer_style == 'style1') {
                $footer_image_style1 = FooterImage::where('style', 'style1')->first();
            } elseif ($fixed_page_setting->footer_style == 'style2') {
                $footer_image_style2 = FooterImage::where('style', 'style2')->first();
            } else {
                $footer_image_style3 = FooterImage::where('style', 'style3')->first();
            }
        } else {
            $footer_image_style1 = FooterImage::where('style', 'style1')->first();
        }
        $site_info_section_style1 = SiteInfo::where('language_id', $language->id)->first();
        $socials = Social::where('status', 1)->get();
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

        return view('frontend.service.category-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'socials', 'external_url', 'menus', 'service_count_categories', 'services_paginate_style', 'category',
            'header_image_style1', 'header_image_style2', 'header_image_style3', 'footer_image_style1',
            'footer_image_style2', 'footer_image_style3', 'site_info_section_style1', 'footers', 'footer_categories',
            'service_index', 'page_builder'));
    }

}
