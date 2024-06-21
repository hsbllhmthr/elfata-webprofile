<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\Menu;
use App\Models\Admin\Page;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug = null)
    {
        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'page-detail-show')->first();

        // Retrieve models
        $socials = Social::where('status', 1)->get();
        $header_image_style1 = HeaderImage::where('style', 'style1')->first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $menus = Menu::with('submenus')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();
        $page = Page::where('pages.page_slug', '=', $page_slug)
            ->first();
        if (!isset($page)) {
            abort(404);
        }

        $footer_image_style1 = FooterImage::where('style', 'style1')->first();
        $site_info = SiteInfo::where('language_id', $language->id)->first();
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


        return view('frontend.page.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'draft_view', 'socials', 'external_url', 'menus', 'page', 'header_image_style1', 'footer_image_style1', 'site_info',
            'footers', 'footer_categories', 'page_builder'));

    }
}
