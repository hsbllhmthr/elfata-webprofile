<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogDetail;
use App\Models\Admin\BlogImage;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Category;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\FixedPageSetting;
use App\Models\Admin\Footer;
use App\Models\Admin\FooterCategory;
use App\Models\Admin\FooterImage;
use App\Models\Admin\HeaderImage;
use App\Models\Admin\Menu;
use App\Models\Admin\PageBuilder;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\SubscribeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug = null)
    {
        // Default variable
        $header_image_style1= null;
        $header_image_style2= null;
        $header_image_style3= null;
        $footer_image_style1= null;
        $footer_image_style2= null;
        $footer_image_style3= null;
        $blog = null;
        $previous = null;
        $next = null;
        $blog_images = null;
        $blog_details = null;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-detail-show')->first();

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

        $blog = Blog::where('blogs.slug', '=', $slug)
            ->firstOrFail();

        if(isset($blog)){
            // Previous blog
            $previous_id = Blog::where('language_id', $language->id)->where('id', '<', $blog->id)->where('status', 'published')->max('id');
            $previous = Blog::where('id', $previous_id)->first();

            // Next blog
            $next_id = Blog::where('language_id', $language->id)->where('id', '>', $blog->id)->where('status', 'published')->min('id');
            $next = Blog::where('id', $next_id)->first();

            // Update view column
            Blog::find($blog->id)->update(
                ['view' => $blog->view + 1]
            );

            $blog_images = BlogImage::where('blog_id', $blog->id)->orderBy('id', 'desc')->get();
            $blog_details = BlogDetail::where('blog_id', $blog->id)->orderBy('id', 'desc')->get();
        }

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.view', 'desc')
            ->take(3)
            ->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
            ->groupBy('category_id')
            ->get();

        $subscribe_section_style2 = SubscribeSection::where('language_id', $language->id)->where('style', 'style2')->first();

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


        return view('frontend.blog.show', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'recent_posts', 'blog', 'blog_count_categories', 'blog_images',
            'blog_details', 'site_info_section_style1', 'socials', 'footers', 'footer_categories', 'slug',
            'previous', 'next', 'bottom_button_widget', 'side_button_widget', 'color_option', 'page_builder', 'fixed_page_setting',
            'header_image_style1', 'header_image_style2', 'header_image_style3', 'footer_image_style1',
            'footer_image_style2', 'footer_image_style3', 'subscribe_section_style2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_index ($category_name = null)
    {
        // Default values
        $header_image_style1= null;
        $header_image_style2= null;
        $header_image_style3= null;
        $footer_image_style1= null;
        $footer_image_style2= null;
        $footer_image_style3= null;
        $blog_limit = 6;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-category-index')->first();

        // URL detection when language changes
        $blog_index = PageBuilder::where('page_name', 'blog-index')->first();

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

        $blog_section_paginate_style = BlogSection::where('language_id', $language->id)->first();
        if (isset($blog_section_paginate_style)) {
            $blog_limit = $blog_section_paginate_style->paginate_item;
        }

        $blogs_paginate_style = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.category_slug', '=', $category_name)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.order', 'asc')
            ->select('blogs.*', 'blogs.id')
            ->paginate($blog_limit);

        $category = Category::where('language_id', $language->id)
            ->where('category_slug', '=', $category_name)->first();

        if (count($blogs_paginate_style) < 1) {
            abort(404);
        }

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.view', 'desc')
            ->take(3)
            ->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
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


        return view('frontend.blog.category-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'page_builder', 'site_info_section_style1', 'socials', 'footers',
            'footer_categories', 'recent_posts', 'blog_count_categories', 'blogs_paginate_style', 'category',
            'fixed_page_setting', 'header_image_style1', 'header_image_style2', 'header_image_style3',
            'footer_image_style1', 'footer_image_style2', 'footer_image_style3', 'blog_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $tag_name
     * @return \Illuminate\Http\Response
     */
    public function tag_index($tag_name = null)
    {
        // Default values
        $header_image_style1= null;
        $header_image_style2= null;
        $header_image_style3= null;
        $footer_image_style1= null;
        $footer_image_style2= null;
        $footer_image_style3= null;
        $blog_limit = 6;

        // Get site language
        $language = getSiteLanguage();

        // Get common model
        list($preloader, $favicon, $seo, $google_analytic, $tawk_to, $bottom_button_widget, $side_button_widget, $color_option, $breadcrumb_image, $font, $draft_view) = getCommonModel($language);

        $page_builder = PageBuilder::where('page_name', 'blog-tag-index')->first();

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

        $blog_section_paginate_style = BlogSection::where('language_id', $language->id)->first();
        if (isset($blog_section_paginate_style)) {
            $blog_limit = $blog_section_paginate_style->paginate_item;
        }

        $blogs_paginate_style = Blog::where('status', 'published')
            ->where('tag', 'like', '%'.$tag_name.'%')
            ->whereHas('category', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('blogs.order', 'asc')
            ->select('blogs.*', 'blogs.id')
            ->paginate($blog_limit);

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
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

        $fixed_page_setting = FixedPageSetting::first();

        return view('frontend.blog.tag-index', compact('preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'page_builder', 'site_info_section_style1',  'socials', 'footers',
            'footer_categories', 'blog_count_categories', 'blogs_paginate_style', 'tag_name', 'fixed_page_setting',
            'header_image_style1', 'header_image_style2', 'header_image_style3', 'footer_image_style1',
            'footer_image_style2', 'footer_image_style3'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Default variable
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

        $page_builder = PageBuilder::where('page_name', 'blog-search-index')->first();

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

        // Search
        $search = $request->get('search');

        $blogs_paginate_style = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 'published')
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.order', 'asc')
            ->select('blogs.*', 'blogs.id')
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

        return view('frontend.blog.search-index', compact ( 'preloader', 'favicon', 'seo', 'google_analytic',
            'tawk_to', 'bottom_button_widget', 'side_button_widget', 'color_option', 'breadcrumb_image', 'font','draft_view',
            'external_url', 'menus', 'page_builder', 'site_info_section_style1', 'socials', 'footers', 'footer_categories',
            'blogs_paginate_style', 'fixed_page_setting', 'header_image_style1', 'header_image_style2', 'header_image_style3',
            'footer_image_style1', 'footer_image_style2', 'footer_image_style3'));
    }

}
