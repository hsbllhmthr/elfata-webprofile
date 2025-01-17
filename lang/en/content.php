<?php

use App\Models\Admin\Language;
use App\Models\Admin\PanelKeyword;


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $panel_keywords = PanelKeyword::where('language_id', $language_id_from_dropdown)->get();

} else {

    $language = Language::where('default_site_language', 1)->first();

    $panel_keywords = PanelKeyword::where('language_id', $language->id)->get();

}

if (isset($panel_keywords)) {

    $keywords = [];
    foreach ($panel_keywords as $panel_keyword) {
        $keywords += [$panel_keyword->key => $panel_keyword->value];
    }

    return $keywords;

} else {

    return [

        /*
        |--------------------------------------------------------------------------
        | Pagination Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are used by the paginator library to build
        | the simple pagination links. You are free to change them to anything
        | you want to customize your views to better match your application.
        |
        */

        /* Content Group 1 */
        'admin_role_manage' => 'Admin Role Manage',
        'add_admin_role' => 'Add Admin Role',
        'role_name' => 'Role Name',
        'permissions' => 'Permissions',
        'set_permissions_for_this_role' => 'set permissions for this role',
        'submit' => 'Submit',
        'admin_roles' => 'Admin Roles',
        'has_all_permissions' => 'has all permissions',
        'action' => 'Action',
        'edit_admin_role' => 'Edit Admin Role',
        'admin_manage' => 'Admin Manage',
        'all_admin' => 'All Admin',
        'all_admin_created_by_super_admin' => 'All Admin Created By Super Admin',
        'add_admin_user' => 'Add Admin User',
        'edit_admin_user' => 'Edit Admin User',
        'name' => 'Name',
        'email' => 'Email',
        'new_password' => 'New Password',
        'confirm_password' => 'Confirm Password',
        'image' => 'Image',
        'size' => 'size',
        'delete' => 'Delete',
        'close' => 'Close',
        'you_wont_be_able_to_revert_this' => 'You wont be able to revert this!',
        'cancel' => 'Cancel',
        'yes_delete_it' => 'Yes, delete it!',
        'success' => 'Success',
        'warning' => 'Warning',
        'error' => 'Error',
        'created_successfully' => 'Created Successfully.',
        'updated_successfully' => 'Updated Successfully.',
        'deleted_successfully' => 'Deleted Successfully.',
        'current_image' => 'Current Image',
        'dashboard' => 'Dashboard',
        'uploads' => 'Uploads',
        'add_photo' => 'Add Photo',
        'photos' => 'Photos',
        'order' => 'Order',
        'copy_image_link' => 'Copy Image Link',
        'edit_photo' => 'Edit Photo',
        'title' => 'Title',
        'description' => 'Description',
        'please_use_recommended_sizes' => 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.',
        'blogs' => 'Blogs',
        'categories' => 'Categories',
        'add_category' => 'Add Category',
        'edit_category' => 'Edit Category',
        'category_name' => 'Category Name',
        'please_choose' => 'Please choose',
        'please_create_a_category' => 'Please create a category.',
        'status' => 'Status',
        'select_your_option' => 'Select Your Option',
        'not_yet_created' => 'Not yet created.',
        'category' => 'Category',
        'post_date' => 'Post Date',
        'view' => 'View',
        'add_blog' => 'Add Blog',
        'edit_blog' => 'Edit Blog',
        'short_description' => 'Short Description',
        'tag' => 'Tag',
        'separate_with_commas' => 'Separate with commas',
        'author' => 'Author',
        'with_this_account' => 'With this account',
        'anonymous' => 'Anonymous',
        'seo_optimization' => 'Seo Optimization',
        'meta_title' => 'Meta Title',
        'meta_description' => 'Meta Description',
        'meta_keyword' => 'Meta Keyword',
        'breadcrumb' => 'Breadcrumb',
        'edit_breadcrumb' => 'Edit Breadcrumb',
        'edit_breadcrumb_and_page_seo' => 'Edit Breadcrumb and Page Seo',
        'breadcrumb_customization' => 'Breadcrumb Customization',
        'use_special_breadcrumb' => 'Do you want to use special breadcrumb for the page?',
        'yes' => 'Yes',
        'no' => 'No',
        'custom_breadcrumb_image' => 'Custom Breadcrumb Image',
        'published' => 'Published',
        'draft' => 'Draft',
        'popular_tag' => 'Popular Tag',
        'section_item' => 'Section Item',
        'paginate_item' => 'Paginate Item',
        'section_title' => 'Section Title',
        'section_title_and_description' => 'Section Title/Description',
        'edit_section_title_and_description' => 'Edit Section Title/Description',
        'edit_section_title_description' => 'Edit Section Title/Description',
        'add_new' => 'Add New',
        'page_builder' => 'Page Builder',
        'page_names' => 'Page Names',
        'page_name' => 'Page Name',
        'is_default' => 'Is Default',
        'add_page_name' => 'Add Page Name',
        'edit_page_name' => 'Edit Page Name',
        'pages' => 'Pages',
        'page_uri' => 'Page Uri',
        'add_page' => 'Add Page',
        'edit_page' => 'Edit Page',
        'example' => 'Example: ',
        '1_segment_usage' => '1 Segment Usage ->',
        '2_segment_usage' => '2 Segment Usage ->',
        'please_base_on_the_count_of_segments' => 'Please base on the count of segments.',
        'sections' => 'Sections',
        'updated_page_sections' => 'Updated page sections',
        'return_to_default_page_settings' => 'Return to default page settings',
        'yes_apply' => 'Yes apply!',
        'update' => 'Update',
        'breadcrumb_title' => 'Breadcrumb Title',
        'breadcrumb_item' => 'Breadcrumb Item',
        'page_builder_is_not_available_on_this_page' => 'Page builder is not available on this page.',
        'menus' => 'Menus',
        'menu' => 'Menu',
        'menu_name' => 'Menu Name',
        'add_menu_name' => 'Add Menu Name',
        'edit_menu_name' => 'Edit Menu Name',
        'pages_within_the_site' => 'Pages within the site',
        'empty' => 'Empty',
        'to_use_the_url_enter_empty_in_this_field' => 'To use the url enter empty in this field.',
        'uri' => 'uri',
        'url' => 'Url',
        'submenu' => 'Submenu',
        'submenu_name' => 'Submenu Name',
        'add_submenu' => 'Add Submenu',
        'edit_submenu' => 'Edit Submenu',
        'reset' => 'Reset',
        'banner' => 'Banner',
        'edit_banner' => 'Edit Banner',
        'button_image_url' => 'Button Image Url',
        'button_image_url_2' => 'Button Image Url 2',
        'button_image_url_3' => 'Button Image Url 3',
        'features' => 'Features',
        'add_feature' => 'Add Feature',
        'edit_feature' => 'Edit Feature',
        'type' => 'Type',
        'icon' => 'Icon',
        'back' => 'Back',
        'about' => 'About',
        'edit_about' => 'Edit About',
        'button_name' => 'Button Name',
        'button_url' => 'Button Url',
        'button_name_2' => 'Button Name 2',
        'button_url_2' => 'Button Url 2',
        'recommended_tags' => 'Recommended tags',
        'buy_now' => 'Buy Now',
        'add_buy_now' => 'Add Buy Now',
        'edit_buy_now' => 'Edit Buy Now',
        'subtitle' => 'Subtitle',
        'price' => 'Price',
        'work_process' => 'Work Process',
        'add_work_process' => 'Add Work Process',
        'edit_work_process' => 'Edit Work Process',
        'testimonials' => 'Testimonials',
        'add_testimonial' => 'Add Testimonial',
        'edit_testimonial' => 'Edit Testimonial',
        'job' => 'Job',
        'star' => 'Star',
        'faqs' => 'Faqs',
        'add_faq' => 'Add Faq',
        'edit_faq' => 'Edit Faq',
        'answer' => 'Answer',
        'question' => 'Question',
        'plan' => 'Plan',
        'add_plan' => 'Add Plan',
        'edit_plan' => 'Edit Plan',
        'currency' => 'Currency',
        'extra_text' => 'Extra Text',
        'feature_list' => 'Feature List',
        'non_feature_list' => 'Non Feature List',
        'recommended' => 'Recommended',
        'teams' => 'Teams',
        'add_team' => 'Add Team',
        'edit_team' => 'Edit Team',
        'subscribe' => 'Subscribe',
        'edit_subscribe' => 'Edit Subscribe',
        'call_to_action' => 'Call To Action',
        'edit_call_to_action' => 'Edit Call To Action',
        'button_image' => 'Button Image',
        'contact_info' => 'Contact Info',
        'add_contact_info' => 'Add Contact Info',
        'edit_contact_info' => 'Edit Contact Info',
        'contact' => 'Contact',
        'map_iframe' => 'Map Iframe (link in src)',
        'map_iframe_desc_placeholder' => 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.',
        'footer' => 'Footer',
        'add_footer' => 'Add Footer',
        'edit_footer' => 'Edit Footer',
        'add_footer_category' => 'Add Footer Category',
        'services' => 'Services',
        'add_service' => 'Add Service',
        'edit_service' => 'Edit Service',
        'additional_features' => 'Additional Features',
        'service_content' => 'Service Content',
        'edit_service_content' => 'Edit Service Content',
        'service_process' => 'Service Process',
        'add_service_process' => 'Add Service Process',
        'edit_service_process' => 'Edit Service Process',
        'service_items' => 'Service Items',
        'add_service_item' => 'Add Service Item',
        'edit_service_item' => 'Edit Service Item',
        'portfolio' => 'Portfolio',
        'add_portfolio' => 'Add Portfolio',
        'edit_portfolio' => 'Edit Portfolio',
        'thumbnail' => 'Thumbnail',
        'images' => 'Images',
        'add_image' => 'Add Image',
        'edit_image' => 'Edit Image',
        'details' => 'Details',
        'add_detail' => 'Add Detail',
        'edit_detail' => 'Edit Detail',
        'gallery' => 'Gallery',
        'add_gallery' => 'Add Gallery',
        'edit_gallery' => 'Edit Gallery',
        'settings' => 'Settings',
        'preloader' => 'Preloader',
        'preloader_text' => 'Preloader Text',
        'favicon' => 'Favicon',
        'header_image' => 'Header Image',
        'footer_image' => 'Footer Image',
        'edit_footer_image' => 'Edit Footer Image',
        'panel_image' => 'Panel Image',
        'admin_logo' => 'Admin Logo',
        'admin_small_logo' => 'Admin Small Logo',
        'external_url' => 'External Url',
        'site_info' => 'Site Info',
        'edit_site_info' => 'Edit Site Info',
        'copyright' => 'Copyright',
        'socials' => 'Socials',
        'add_social' => 'Add Social',
        'edit_social' => 'Edit Social',
        'google_analytic' => 'Google Analytic',
        'tawk_to' => 'Tawk to',
        'quick_access_buttons' => 'Quick Access Buttons',
        'side_buttons' => 'Side Buttons',
        'email_or_whatsapp' => 'Email or Whatsapp',
        'enable' => 'Enable',
        'disable' => 'Disable',
        'bottom_buttons' => 'Button Buttons',
        'whatsapp' => 'Whatsapp',
        'color_option' => 'Color Option',
        'ready_color_option' => 'Ready Color Option',
        'customize_color' => 'Customize Color',
        'main_color' => 'Main Color',
        'secondary_color' => 'Secondary Color',
        'tertiary_color' => 'Tertiary Color',
        'scroll_button_color' => 'Scroll Button Color',
        'bottom_button_color' => 'Bottom Button Color',
        'bottom_button_hover_color' => 'Bottom Button Hover Color',
        'side_button_color' => 'Side Button Color',
        'fixed_page_setting' => 'Fixed Page Setting',
        'header_style' => 'Header Style',
        'footer_style' => 'Footer Style',
        'for_pages_without_page_builder' => 'for pages without page builder',
        'subscribe_section' => 'Subscribe Section',
        'you_can_see_this_section_on_some_pages_that_do_not_have_a_page_builder' => 'You can see this section on some pages that do not have a page builder',
        'recent_portfolio_section' => 'Recent Portfolio Section',
        'messages' => 'Messages',
        'mark_all_as_read' => 'Mark All As Read',
        'phone' => 'Phone',
        'message' => 'Message',
        'read_status' => 'Read Status',
        'read' => 'Read',
        'unread' => 'Unread',
        'mark' => 'Mark',
        'seo' => 'Seo',
        'site_title' => 'Site Title',
        'site_description' => 'Site Description',
        'site_keywords' => 'Site Keywords',
        'languages' => 'Languages',
        'default_site_language' => 'Default Site Language',
        'add_language' => 'Add Language',
        'language_name' => 'Language Name',
        'language_code' => 'Language Code',
        'direction' => 'Direction',
        'display_dropdown' => 'Display Dropdown?',
        'show' => 'Show',
        'hide' => 'Hide',
        'keywords' => 'Keywords',
        'for_admin_panel' => 'For Admin Panel',
        'for_frontend' => 'For Frontend',
        'profile' => 'Profile',
        'change_password' => 'Change Password',
        'current_password' => 'Current Password',
        'pending_approval' => 'Pending Approval',
        'approval' => 'Approval',
        'data_language' => 'Data Language',
        'which_language' => 'Which language do you want to create the data?',
        'reminding' => 'Please note that all the entries you create will be based on your chosen language.',
        'notifications' => 'Notifications',
        'logout' => 'Logout',
        'optimizer' => 'Optimizer',
        'required_fields' => 'Fields marked are required',
        'site' => 'Site',
        'add_keyword' => 'Add Keyword',
        'key' => 'Key',
        'value' => 'Value',
        'delete_selected' => 'Delete selected?',
        'comments' => 'Comments',
        'all' => 'All',
        'logo' => 'Logo',
        'see_edit' => 'See Edit',
        'subscribers' => 'Subscribers',
        'add_subscriber' => 'Add Subscriber',
        'default_page' => 'Default Page',
        'custom_page' => 'Custom Page',
        'language' => 'Language',
        'video_type' => 'Video Type',
        'youtube' => 'Youtube',
        'other' => 'Other',
        'video_url' => 'Video Url',
        'add_more' => 'Add More',
        'counter_list' => 'Counter List',
        'add_counter' => 'Add Counter',
        'counter' => 'Counter',
        'item' => 'Item',
        'client' => 'Client',
        'add_client' => 'Add Client',
        'edit_client' => 'Edit Client',
        'segment_count' => 'Segment Count: ',
        'careers' => 'Careers',
        'add_career' => 'Add Career',
        'edit_career' => 'Edit Career',
        'when_you_leave_this_section_blank_it_will_go_to_its_own_detail_page' => 'When you leave this section blank it will go to its own detail page',
        'move' => 'Move',
        'touch' => 'Touch',
        'add_blog_image' => 'Add Blog Image',
        'add_blog_detail' => 'Add Blog Detail',
        'view_draft' => 'View Draft',
        'map' => 'Map',
        'select' => 'Select',
        'portfolio_content' => 'Portfolio Content',
        'portfolio_details' => 'Portfolio Details',
        'portfolio_images' => 'Portfolio Images',
        'add_portfolio_image' => 'Add Portfolio Image',
        'add_portfolio_content' => 'Add Portfolio Content',
        'add_portfolio_detail' => 'Add Portfolio Detail',
        'facebook_url' => 'Facebook URL',
        'twitter_url' => 'X URL',
        'instagram_url' => 'Instagram URL',
        'youtube_url' => 'Youtube URL',
        'linkedin_url' => 'Linkedin URL',
        'company_title' => 'Company Title',
        'company_description' => 'Company Description',
        'company_contact_title' => 'Company Contact Title',
        'address' => 'Address',
        'career_content' => 'Career Content',
        'edit_career_content' => 'Edit Career Content',
        'copy_url' => 'Copy URL',
        'font' => 'Font',
        'draft_view' => 'Draft View',
        'add_blog_category' => 'Add Blog Category',
        'you_can_enable_or_disable_draft_sections_on_the_front_side' => 'You can enable or disable draft sections on the front side',
        'edit_portfolio_content' => 'Edit Portfolio Content',
        'style1' => 'style 1',
        'style2' => 'style 2',
        'style3' => 'style 3',
        'style4' => 'style 4',
        'style5' => 'style 5',
        'style6' => 'style 6',
        'style7' => 'style 7',
        'style8' => 'style 8',

    ];

}



