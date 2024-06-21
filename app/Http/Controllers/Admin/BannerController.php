<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\BannerClient;
use App\Models\Admin\BannerClientSection;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class BannerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($style = 'style1')
    {
        // Retrieving a model
        $language = getLanguage();
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $item_section = Banner::where('language_id', $language->id)->where('style', $style)->first();
        $banner_clients= BannerClient::orderBy('id', 'desc')->get();
        $banner_client_section = BannerClientSection::where('language_id', $language->id)->first();

        return view('admin.sections.banner.create', compact('favicon', 'panel_image','item_section', 'banner_clients', 'banner_client_section', 'style'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style1,style2,style3',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'button_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'button_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'button_image_3' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        if ($request->hasFile('button_image')) {

            // Get image file
            $image_file = $request->file('button_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['button_image']= $image_name;

        } else {
            // Set input
            $input['button_image']= null;
        }

        if ($request->hasFile('button_image_2')) {

            // Get image file
            $image_file = $request->file('button_image_2');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time() + 1).'-'.$image_file->getClientOriginalName();

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['button_image_2']= $image_name;

        } else {
            // Set input
            $input['button_image_2']= null;
        }

        if ($request->hasFile('button_image_3')) {

            // Get image file
            $image_file = $request->file('button_image_3');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time() + 2).'-'.$image_file->getClientOriginalName();

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['button_image_3']= $image_name;

        } else {
            // Set input
            $input['button_image_3']= null;
        }

        // Record to database
        Banner::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
            'button_name_2' => $input['button_name_2'],
            'button_url_2' => $input['button_url_2'],
            'button_image' => $input['button_image'],
            'button_image_url' => $input['button_image_url'],
            'button_image_2' => $input['button_image_2'],
            'button_image_url_2' => $input['button_image_url_2'],
            'button_image_3' => $input['button_image_3'],
            'button_image_url_3' => $input['button_image_url_3'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style1,style2,style3',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'button_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'button_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'button_image_3' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get a model
        $item_section = Banner::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image));

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;
        }

        if ($request->hasFile('button_image')) {

            // Get image file
            $image_file = $request->file('button_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->button_image));

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['button_image']= $image_name;
        }

        if ($request->hasFile('button_image_2')) {

            // Get image file
            $image_file = $request->file('button_image_2');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time() + 1).'-'.$image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->button_image_2));

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['button_image_2']= $image_name;
        }

        if ($request->hasFile('button_image_3')) {

            // Get image file
            $image_file = $request->file('button_image_3');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = (time() + 2).'-'.$image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->button_image_3));

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['button_image_3']= $image_name;
        }

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Update model
        Banner::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image($id)
    {
        // Retrieve a model
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));

        // Update Image
        Banner::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image_2($id)
    {
        // Retrieve a model
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->button_image));

        // Update Image
        Banner::find($id)->update(['button_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image_3($id)
    {
        // Retrieve a model
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->button_image_2));

        // Update Image
        Banner::find($id)->update(['button_image_2' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_image_4($id)
    {
        // Retrieve a model
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->button_image_3));

        // Update Image
        Banner::find($id)->update(['button_image_3' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $item_section = Banner::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));
        File::delete(public_path($folder.$item_section->button_image));
        File::delete(public_path($folder.$item_section->button_image_2));
        File::delete(public_path($folder.$item_section->button_image_3));

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_banner_client(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style3',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        // Record to database
        BannerClient::create([
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'order' => $input['order'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_banner_client($id)
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $banner_client = BannerClient::find($id);

        return view('admin.sections.banner.edit', compact('favicon', 'panel_image','banner_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_banner_client(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style3',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'integer',
        ]);

        // Any error checking
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get a model
        $banner_client = BannerClient::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image_file = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/banner/';

            // Make image name
            $image_name = time().'-'.$image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$banner_client->section_image));

            // Original size upload file
            $image_file->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;
        }

        // Record to database
        BannerClient::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('banner.create', $banner_client['style']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_banner_client_image($id)
    {
        // Retrieve a model
        $banner_client = BannerClient::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$banner_client->section_image));

        // Update Image
        BannerClient::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.edit_banner_client', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_banner_client($id)
    {
        // Retrieve a model
        $banner_client = BannerClient::find($id);

        // Folder path
        $folder = 'uploads/img/banner/';

        // Delete Image
        File::delete(public_path($folder.$banner_client->section_image));

        // Delete record
        $banner_client->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $banner_client['style']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_banner_client_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if ($arr_checked_lists == null) {
            // Set a warning toast, with a title
            toastr()->warning('content.please_choose', 'content.warning');
            return redirect()->route('banner.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $banner_client = BannerClient::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/banner/';

            // Delete Image
            File::delete(public_path($folder.$banner_client->section_image));

            // Delete record
            $banner_client->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $banner_client['style']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_banner_client_section(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style3',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        BannerClientSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_banner_client_section(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style3',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Update model
        BannerClientSection::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('banner.create', $input['style']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_2($id)
    {
        // Retrieve a model
        $item_section = BannerClientSection::find($id);

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('banner.create', $item_section->style);

    }
}
