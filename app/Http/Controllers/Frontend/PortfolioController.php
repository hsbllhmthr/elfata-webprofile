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
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioContent;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioDetailSection;
use App\Models\Admin\PortfolioImage;
use App\Models\Admin\PortfolioSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($portfolio_slug = null)
    {
        // Default variable
        $header_image_style1 = null;
        $header_image_style2 = null;
        $header_image_style3 = null;
        $footer_image_style1 = null;
        $footer_image_style2 = null;
        $footer_image_style3 = null;
        $portfolio = null;

        $portfolio_content = null;
        $portfolio_images = null;
        $portfolio_detail_section = null;
        $portfolio_details = null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'portfolio-detail-show')->first();

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

        $portfolio = Portfolio::where('portfolios.portfolio_slug', '=', $portfolio_slug)
            ->firstOrFail();

        if (isset($portfolio)) {
            $portfolio_content = PortfolioContent::where('portfolio_id', $portfolio->id)->first();
            $portfolio_images = PortfolioImage::where('portfolio_id', $portfolio->id)->orderBy('id', 'desc')->get();
            $portfolio_detail_section = PortfolioDetailSection::where('portfolio_id', $portfolio->id)->first();
            $portfolio_details = PortfolioDetail::where('portfolio_id', $portfolio->id)->orderBy('id', 'desc')->get();
        }

        $recent_portfolios = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolio_categories.language_id', $language->id)
            ->where('portfolio_categories.status', 1)
            ->where('portfolios.status', 'published')
            ->orderBy('portfolios.order', 'asc')
            ->select('portfolios.*', 'portfolios.id')
            ->take(8)
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


        return view('frontend.portfolio.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'recent_portfolios', 'portfolio', 'portfolio_content', 'portfolio_images',
            'portfolio_detail_section', 'portfolio_details', 'site_info_section_style1', 'socials', 'footers',
            'footer_categories', 'portfolio_slug', 'bottom_button_widget', 'side_button_widget', 'color_option',
            'page_builder', 'fixed_page_setting', 'header_image_style1', 'header_image_style2', 'header_image_style3',
            'footer_image_style1', 'footer_image_style2', 'footer_image_style3', 'page_builder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_index ($category_name = "draft_page") {
        // Default values
        $portfolio_limit = 6;
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

        $page_builder = PageBuilder::where('page_name', 'portfolio-category-index')->first();

        // URL detection when language changes
        $portfolio_index = PageBuilder::where('page_name', 'portfolio-index')->first();

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

        $portfolio_section_paginate_style = PortfolioSection::where('language_id', $language->id)->first();
        if (isset($portfolio_section_paginate_style)) {
            $portfolio_limit = $portfolio_section_paginate_style->paginate_item;
        }

        $portfolios_paginate_style = Portfolio::join("portfolio_categories",'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolio_categories.language_id', $language->id)
            ->where('portfolio_categories.portfolio_category_slug', '=', $category_name)
            ->where('portfolio_categories.status', 1)
            ->where('portfolios.status', 'published')
            ->orderBy('portfolios.order', 'asc')
            ->select('portfolios.*', 'portfolios.id')
            ->paginate($portfolio_limit);

        $category = PortfolioCategory::where('language_id', $language->id)
            ->where('portfolio_category_slug', '=', $category_name)->first();

        if (count($portfolios_paginate_style) < 1) {
            abort(404);
        }

        $portfolio_count_categories = Portfolio::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('portfolios.status', 'published')
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


        return view('frontend.portfolio.category-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'page_builder', 'site_info_section_style1', 'socials', 'footers', 'footer_categories',
            'portfolio_count_categories',  'portfolios_paginate_style', 'category', 'fixed_page_setting', 'header_image_style1',
            'header_image_style2', 'header_image_style3', 'footer_image_style1', 'footer_image_style2',
            'footer_image_style3', 'portfolio_index'));
    }

}
