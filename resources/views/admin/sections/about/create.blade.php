@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.about') }}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('content.'.$style) }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style2']) }}">{{ __('content.style2') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style3']) }}">{{ __('content.style3') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style4']) }}">{{ __('content.style4') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style5']) }}">{{ __('content.style5') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style6']) }}">{{ __('content.style6') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style7']) }}">{{ __('content.style7') }}</a>
                            <a class="dropdown-item" href="{{ route('about.create', ['style' => 'style8']) }}">{{ __('content.style8') }}</a>
                        </div>
                    </div>
                    <!-- Button -->
                    <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                    <!-- Modal -->
                    <div id="imageModal" class="border border-success iyzi-modal">
                        <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/about-'.$style.'.jpg') }}" alt="draft image">
                    </div>
                </h4>
                @if (isset($item_section))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('about.update', $item_section->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }}
                                            @if ($style == 'style1') 540 x 570) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style2' || $style == 'style6') 705 x 475) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style3') 690 x 500) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style4') 545 x 455) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style5' || $style == 'style6') 540 x 450) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style7') 705 x 475) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @elseif ($style == 'style8') 525 x 415) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                            @endif
                                        </label>
                                        <input type="file" name="section_image" class="form-control-file" id="section_image">
                                        <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($item_section->section_image))
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/about/'.$item_section->section_image) }}" alt="image" class="rounded">
                                                            </a>
                                                        @else
                                                            <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @if (!empty($item_section->section_image))
                                                        <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal{{ $item_section->id }}">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                </div>
                                @if ($style == 'style3' || $style == 'style4')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_image_2">{{ __('content.image') }} ({{ __('content.size') }}
                                                @if ($style == 'style3') 215 x 150) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                @elseif ($style == 'style4') 185 x 180) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                @endif
                                            </label>
                                            <input type="file" name="section_image_2" class="form-control-file" id="section_image_2">
                                            <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($item_section->section_image_2))
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/about/'.$item_section->section_image_2) }}" alt="image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        @if (!empty($item_section->section_image_2))
                                                            <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal2{{ $item_section->id }}">
                                                                <i class="fa fa-trash text-danger font-18"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <!--end card-body-->
                                                </div>
                                            </div>
                                            <!--end card-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                @endif

                                @if ($style == 'style4')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_image_3">{{ __('content.image') }} ({{ __('content.size') }} 240 x 240) (.svg, .jpg, .jpeg, .png, .webp, .gif) </label>
                                            <input type="file" name="section_image_3" class="form-control-file" id="section_image_3">
                                            <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($item_section->section_image_3))
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/about/'.$item_section->section_image_3) }}" alt="image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        @if (!empty($item_section->section_image_3))
                                                            <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteModal3{{ $item_section->id }}">
                                                                <i class="fa fa-trash text-danger font-18"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <!--end card-body-->
                                                </div>
                                            </div>
                                            <!--end card-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                @endif

                                @if ($style == 'style2' || $style == 'style7')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="video_type" class="col-form-label">{{ __('content.video_type') }}</label>
                                            <select class="form-control" name="video_type" id="video_type">
                                                <option value="youtube" selected>{{ __('content.select_your_option') }} </option>
                                                <option value="youtube" {{ $item_section->video_type == 'youtube' ? 'selected' : '' }}>{{ __('content.youtube') }}</option>
                                                <option value="other" {{ $item_section->video_type == 'other' ? 'selected' : '' }}>{{ __('content.other') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="video_url">{{ __('content.video_url') }} </label>
                                            <input type="text" name="video_url" class="form-control" id="video_url" value="{{ $item_section->video_url }}">
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" name="video_type" value="youtube">
                                    <input type="hidden" name="video_url">
                                @endif

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $item_section->title }}">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('content.description') }}</label>
                                        <textarea name="description" class="form-control" id="description" rows="3">{{ $item_section->description }}</textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>

                                @if ($style == 'style3' || $style == 'style4' || $style == 'style5' || $style == 'style6')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="about-item-list">{{ __('content.item') }} </label>
                                            <input type="text" name="item" class="form-control" id="about-item-list" value="{{ $item_section->item }}">
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" name="item">
                                @endif

                                @if ($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_name">{{ __('content.button_name') }}</label>
                                            <input type="text" name="button_name" class="form-control" id="button_name" value="{{ $item_section->button_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="button_url">{{ __('content.button_url') }}</label>
                                            <input type="text" name="button_url" class="form-control" id="button_url" value="{{ $item_section->button_url }}">
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" name="button_name">
                                    <input type="hidden" name="button_url">
                                @endif
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#aboutSectionDestroyModal{{ $item_section->id }}">
                                        <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('about.destroy_image', $item_section->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal2{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModal2CenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageModal2CenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('about.destroy_image_2', $item_section->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                      @if ($style == 'style4')
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal3{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModal2CenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="messageModal2CenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            <form class="d-inline-block" action="{{ route('about.destroy_image_3', $item_section->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="aboutSectionDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="aboutSectionDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bannerSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('about.destroy', $item_section->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                            @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                @include('admin.demo_mode.demo-mode')
                            @else
                                <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif

                                    <input name="style" type="hidden" value="{{ $style }}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }}
                                                    @if ($style == 'style1') 540 x 570) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style2') 705 x 475) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style3') 690 x 500) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style4') 545 x 455) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style5' || $style == 'style6') 540 x 450) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style7') 705 x 475) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @elseif ($style == 'style8') 525 x 415) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                    @endif
                                                </label>
                                                <input type="file" name="section_image" class="form-control-file" id="section_image">
                                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                            </div>
                                        </div>

                                        @if ($style == 'style3' || $style == 'style4')
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_image_2">{{ __('content.image') }} ({{ __('content.size') }}
                                                        @if ($style == 'style3') 215 x 150) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                        @elseif($style == 'style4') 185 x 180) (.svg, .jpg, .jpeg, .png, .webp)
                                                        @endif
                                                    </label>
                                                    <input type="file" name="section_image_2" class="form-control-file" id="section_image_2">
                                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($style == 'style4')
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_image_3">{{ __('content.image') }} ({{ __('content.size') }} 240 x 240) (.svg, .jpg, .jpeg, .png, .webp, .gif) </label>
                                                    <input type="file" name="section_image_3" class="form-control-file" id="section_image_3">
                                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($style == 'style2' || $style == 'style7')
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="video_type" class="col-form-label">{{ __('content.video_type') }}</label>
                                                    <select class="form-control" name="video_type" id="video_type">
                                                        <option value="youtube" selected>{{ __('content.select_your_option') }} </option>
                                                        <option value="youtube">{{ __('content.youtube') }}</option>
                                                        <option value="other">{{ __('content.other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="video_url">{{ __('content.video_url') }} </label>
                                                    <input type="text" name="video_url" class="form-control" id="video_url">
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="video_type" value="youtube">
                                            <input type="hidden" name="video_url">
                                        @endif

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('content.title') }}</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title')">{{ __('<p>') }}</span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">{{ __('content.description') }}</label>
                                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description')">{{ __('<p>') }}</span>
                                                </small>
                                            </div>
                                        </div>

                                        @if ($style == 'style3' || $style == 'style4' || $style == 'style5' || $style == 'style6')
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="about-item-list">{{ __('content.item') }} </label>
                                                    <input type="text" name="item" class="form-control" id="about-item-list">
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="item">
                                        @endif

                                        @if ($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4')
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_name">{{ __('content.button_name') }}</label>
                                                    <input type="text" name="button_name" class="form-control" id="button_name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="button_url">{{ __('content.button_url') }}</label>
                                                    <input type="text" name="button_url" class="form-control" id="button_url">
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="button_name">
                                            <input type="hidden" name="button_url">
                                        @endif
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- start about counter -->
    @if ($style == 'style2' || $style == 'style8')
        <div class="row">
            <div class="col-12">
                <div class="card mb-30">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center mb-20">
                            <h6 class="card-title mb-0">{{ __('content.counter_list') }}</h6>
                            <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ {{ __('content.add_counter') }}</button>
                        </div>
                        <div class="table-responsive order-stats">
                            @if (count($items) > 0)
                                <div>
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                                    <label for="check_all">{{ __('content.all') }}</label>
                                    <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                        <i class="fa fa-trash text-danger font-18"></i>
                                    </a>
                                </div>
                                <form onsubmit="return btnCheckListGet()" action="{{ route('about.destroy_counter_checked') }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input type="hidden" id="checked_lists" name="checked_lists" value="">

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteCheckedModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.delete_selected') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table id="basic-datatable"  class="table table-striped dt-responsive w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.counter') }}</th>
                                        <th>{{ __('content.extra_text') }}</th>
                                        <th>{{ __('content.title') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $desc = count($items); $asc=0; @endphp
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                <input name="check_list[]" type="checkbox" value="{{ $item->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                            </td>
                                            <td>{{ $item->counter }}</td>
                                            <td>{{ $item->extra_text }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->order }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('about.edit_counter', $item->id) }}" class="mr-2">
                                                        <i class="fa fa-edit text-info font-18"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('about.destroy_counter', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $item->id }}">
                                                            <a type="button">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                        <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>{{ __('content.not_yet_created') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">{{ __('content.add_new') }}</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('about.store_counter') }}" method="POST">
                            @csrf

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="counter">{{ __('content.counter') }} </label>
                                        <input type="text" name="counter" class="form-control" id="counter">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="extra_text">{{ __('content.extra_text') }}</label>
                                        <input type="text" name="extra_text" class="form-control" id="extra_text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title_2">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title_2">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title_2')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title_2')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title_2')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title_2')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title_2')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title_2')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="0" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
    <!-- end about counter -->

    <!-- start about counter -->
    @if ($style == 'style7')
        <div class="row">
            <div class="col-12">
                <div class="card mb-30">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center mb-20">
                            <h6 class="card-title mb-0">{{ __('content.features') }}</h6>
                            <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ {{ __('content.add_feature') }}</button>
                        </div>
                        <div class="table-responsive order-stats">
                            @if (count($features) > 0)
                                <div>
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                                    <label for="check_all">{{ __('content.all') }}</label>
                                    <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                        <i class="fa fa-trash text-danger font-18"></i>
                                    </a>
                                </div>
                                <form onsubmit="return btnCheckListGet()" action="{{ route('about.destroy_feature_checked') }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input type="hidden" id="checked_lists" name="checked_lists" value="">

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteCheckedModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.delete_selected') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table id="basic-datatable"  class="table table-striped dt-responsive w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>{{ __('content.title') }}</th>
                                        <th>{{ __('content.description') }}</th>
                                        <th>{{ __('content.order') }}</th>
                                        <th class="custom-width-action">{{ __('content.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $desc = count($features); $asc=0; @endphp
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td>
                                                <input name="check_list[]" type="checkbox" value="{{ $feature->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                            </td>
                                            <td>{{ $feature->title }}</td>
                                            <td>{{ $feature->description }}</td>
                                            <td>{{ $feature->order }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('about.edit_feature', $feature->id) }}" class="mr-2">
                                                        <i class="fa fa-edit text-info font-18"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('about.destroy_feature', $feature->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $feature->id }}">
                                                            <a type="button">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                       </span>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModel{{ $feature->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        {{ __('content.you_wont_be_able_to_revert_this') }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                        <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>{{ __('content.not_yet_created') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">{{ __('content.add_new') }}</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('about.store_feature') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">
                                <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <legend class="font-14">{{ __('content.type') }}</legend>
                                            <div class="form-check pl-0 mb-2">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" checked=""><span class="ml-3">{{ __('content.icon') }}</span>
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check pl-0">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image"><span class="ml-3">{{ __('content.image') }}</span>
                                                    <i class="input-helper"></i></label>
                                            </div>
                                        </fieldset>
                                        <div class="form-group" id="icon-type">
                                            <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                            <div class="btn-group">
                                                <input type="hidden" name="icon" class="form-control" id="icon">
                                                <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="iconpicker-component"></i></button>
                                                <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                        </div>
                                        <div id="image-type" style="display: none;">
                                            <div class="form-group" >
                                                <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }} 80 x 80) (.svg, .jpg, .jpeg, .png, .webp, .gif)</label>
                                                <input type="file" name="section_image" class="form-control-file" id="section_image">
                                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title_3">{{ __('content.title') }} </label>
                                        <input type="text" name="title" class="form-control" id="title_3">
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'title_3')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'title_3')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'title_3')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'title_3')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'title_3')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'title_3')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description_3">{{ __('content.description') }} </label>
                                        <textarea name="description" class="form-control" id="description_3" rows="3"></textarea>
                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description_3')">{{ __('<a href="">') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description_3')">{{ __('<br>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description_3')">{{ __('<b>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description_3')">{{ __('<i>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description_3')">{{ __('<span>') }}</span>
                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description_3')">{{ __('<p>') }}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="order">{{ __('content.order') }}</label>
                                        <input type="number" name="order" class="form-control" id="order" value="0" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
    <!-- end about counter -->

@endsection
