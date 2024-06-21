<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutSection;
use App\Models\Admin\AboutSectionCounter;
use App\Models\Admin\AboutSectionFeature;
use App\Models\Admin\Favicon;
use App\Models\Admin\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class AboutSectionController extends Controller
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
        $item_section = AboutSection::where('language_id', $language->id)->where('style', $style)->first();
        $items = AboutSectionCounter::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();
        $features = AboutSectionFeature::where('language_id', $language->id)->where('style', $style)->orderBy('id', 'desc')->get();

        return view('admin.sections.about.create', compact('favicon', 'panel_image','item_section', 'items', 'features', 'style'));
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
            'style' => 'in:style1,style2,style3,style4,style5,style6,style7,style8',
            'video_type'   =>  'in:youtube,other',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_3' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
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
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        } else {
            // Set input
            $input['section_image_2']= null;
        }

        if ($request->hasFile('section_image_3')) {

            // Get image file
            $image = $request->file('section_image_3');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_3']= $image_name;

        } else {
            // Set input
            $input['section_image_3']= null;
        }

        // Record to database
        AboutSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'section_image' => $input['section_image'],
            'section_image_2' => $input['section_image_2'],
            'section_image_3' => $input['section_image_3'],
            'video_type' => $input['video_type'],
            'video_url' => $input['video_url'],
            'title' => Purifier::clean($input['title']),
            'description' => Purifier::clean($input['description']),
            'item' => $input['item'],
            'button_name' => $input['button_name'],
            'button_url' => $input['button_url'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
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
            'style' => 'in:style1,style2,style3,style4,style5,style6,style7,style8',
            'video_type'   =>  'in:youtube,other',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_2' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'section_image_3' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        $item_section = AboutSection::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        }

        if ($request->hasFile('section_image_2')) {

            // Get image file
            $image = $request->file('section_image_2');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image_2));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_2']= $image_name;

        }

        if ($request->hasFile('section_image_3')) {

            // Get image file
            $image = $request->file('section_image_3');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item_section->section_image_3));

            // Original size upload file
            $image->move($folder, $image_name);

            // Set input
            $input['section_image_3']= $image_name;

        }

        // XSS Purifier
        $input['title'] = Purifier::clean($input['title']);
        $input['description'] = Purifier::clean($input['description']);

        // Update model
        AboutSection::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));

        // Update Image
        AboutSection::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image_2));

        // Update Image
        AboutSection::find($id)->update(['section_image_2' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image_3));

        // Update Image
        AboutSection::find($id)->update(['section_image_3' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

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
        $item_section = AboutSection::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item_section->section_image));
        File::delete(public_path($folder.$item_section->section_image_2));
        File::delete(public_path($folder.$item_section->section_image_3));

        $item_section->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item_section->style);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_counter(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style2,style8',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        AboutSectionCounter::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'counter' => $input['counter'],
            'extra_text' => $input['extra_text'],
            'title' => $input['title'],
            'order' => $input['order']
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_counter($id)
    {
        // Retrieving models
        $favicon = Favicon::first();
        $panel_image = PanelImage::first();
        $item = AboutSectionCounter::find($id);

        return view('admin.sections.about.edit_counter', compact('favicon', 'panel_image','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_counter(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style2,style8',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        // Record to database
        AboutSectionCounter::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_counter($id)
    {
        // Retrieve a model
        $item = AboutSectionCounter::find($id);

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item->style);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_counter_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if ($arr_checked_lists == []) {

            // Set a warning toast, with a title
            toastr()->warning('content.please_choose', 'content.warning');

            return redirect()->route('about.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = AboutSectionCounter::findOrFail($id);

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item->style);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_feature(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style7',
            'type' => 'in:icon,image',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')){

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $image_name =  time().'-'.$image->getClientOriginalName();

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image']= $image_name;

        } else {
            // Set input
            $input['section_image']= null;
        }

        // Record to database
        AboutSectionFeature::create([
            'language_id' => getLanguage()->id,
            'style' => $input['style'],
            'type' => $input['type'],
            'icon' => $input['icon'],
            'section_image' => $input['section_image'],
            'title' => $input['title'],
            'description' => $input['description'],
            'order' => $input['order'],
        ]);

        // Set a success toast, with a title
        toastr()->success('content.created_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_feature($id)
    {
        // Retrieving models
        $item = AboutSectionFeature::findOrFail($id);

        return view('admin.sections.about.edit_feature', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_feature(Request $request, $id)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'style' => 'in:style7',
            'type' => 'in:icon,image',
            'section_image' => 'mimes:svg,png,jpeg,jpg,webp,gif|max:2048',
            'order' => 'required|integer',
        ]);

        // Any error checking
        if ($validator->fails()){
            toastr()->error($validator->errors()->first(), 'content.error');
            return back();
        }

        // Get model
        $item = AboutSectionFeature::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('section_image')) {

            // Get image file
            $image = $request->file('section_image');

            // Folder path
            $folder ='uploads/img/about/';

            // Make image name
            $image_name = time().'-'.$image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$item->section_image));

            // Upload image
            $image->move($folder, $image_name);

            // Set input
            $input['section_image'] = $image_name;

        }

        // Record to database
        AboutSectionFeature::find($id)->update($input);

        // Set a success toast, with a title
        toastr()->success('content.updated_successfully', 'content.success');

        return redirect()->route('about.create', $input['style']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_feature($id)
    {
        // Retrieve a model
        $item = AboutSectionFeature::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item->section_image));

        // Delete record
        $item->delete();

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item->style);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_feature_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {

            // Set a warning toast, with a title
            toastr()->warning('content.please_choose', 'content.warning');

            return redirect()->route('about.create');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $item = AboutSectionFeature::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/about/';

            // Delete Image
            File::delete(public_path($folder.$item->section_image));

            // Delete record
            $item->delete();

        }

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.create', $item->style);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_feature_image($id)
    {
        // Retrieve a model
        $item = AboutSectionFeature::find($id);

        // Folder path
        $folder = 'uploads/img/about/';

        // Delete Image
        File::delete(public_path($folder.$item->section_image));

        // Update Image
        AboutSectionFeature::find($id)->update(['section_image' => null]);

        // Set a success toast, with a title
        toastr()->success('content.deleted_successfully', 'content.success');

        return redirect()->route('about.edit', $id);

    }

}
