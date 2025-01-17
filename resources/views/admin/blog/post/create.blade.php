@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_blog') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <div class="row">
                           <div class="col-md-8">
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                           <input id="title" name="title" type="text" class="form-control" required>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="summernote">{{ __('content.description') }}</label>
                                           <textarea id="summernote" name="description" class="form-control"></textarea>
                                       </div>
                                   </div>
                                   <div class="col-md-12 box-margin">
                                       <div id="accordion-">
                                           <div class="card mb-2">
                                               <div class="card-header bg-secondary">
                                                   <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                       {{ __('content.seo_optimization') }}
                                                   </a>
                                               </div>

                                               <div id="accordion-1" class="collapse" data-parent="#accordion-" style="">
                                                   <div class="card-body">
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                   <label for="meta_description">{{ __('content.meta_description') }} </label>
                                                                   <input id="meta_description" name="meta_description" type="text" class="form-control">
                                                               </div>
                                                           </div>
                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                   <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                   <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3"></textarea>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4">
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group form-group-default">
                                           <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                           <select  class="form-control" name="category_id" id="category" required>
                                               @foreach($categories as $category)
                                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="short_description">{{ __('content.short_description') }}</label>
                                           <textarea id="short_description" name="short_description" class="form-control" rows="3"></textarea>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="tag-list">{{ __('content.tag') }} ({{ __('content.separate_with_commas') }})</label>
                                           <textarea id="tag-list" name="tag" class="form-control"></textarea>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="type" class="col-form-label">{{ __('content.author') }} </label>
                                           <select class="form-control" name="type" id="type">
                                               <option value="with_this_account" selected>{{ __('content.select_your_option') }}</option>
                                               <option value="with_this_account">{{ __('content.with_this_account') }}</option>
                                               <option value="anonymous">{{ __('content.anonymous') }}</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 415 x 300)(.svg, .png, .jpg, .jpeg)</label>
                                           <input id="image" name="section_image" type="file" class="form-control-file">
                                           <small id="image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 820 x 500)(.svg, .png, .jpg, .jpeg, .webp, .gif)</label>
                                           <input id="image" name="section_image_2" type="file" class="form-control-file">
                                           <small id="image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label for="order">{{ __('content.order') }}</label>
                                           <input type="number" name="order" class="form-control" id="order" value="0">
                                       </div>
                                   </div>
                                   <div class="col-xl-12">
                                       <div class="form-group">
                                           <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                           <select class="form-control" name="status" id="status">
                                               <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                               <option value="published">{{ __('content.published') }}</option>
                                               <option value="draft">{{ __('content.draft') }}</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                       <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
