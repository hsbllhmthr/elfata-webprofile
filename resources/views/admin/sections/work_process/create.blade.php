@extends('layouts.admin.master')

@section('content')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.work_process') }}
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('content.'.$style) }}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('work-process.create', ['style' => 'style1']) }}">{{ __('content.style1') }}</a>
                                    <a class="dropdown-item" href="{{ route('work-process.create', ['style' => 'style2']) }}">{{ __('content.style2') }}</a>
                                </div>
                            </div>
                            <!-- Button -->
                            <a id="hoverButton" class="iyzi-btn"><i class="fas fa-camera"></i> {{ __('content.view_draft') }}</a>
                            <!-- Modal -->
                            <div id="imageModal" class="border border-success iyzi-modal">
                                <img class="img-fluid " src="{{ asset('uploads/img/dummy/style/work-process-'.$style.'.jpg') }}" alt="draft image">
                            </div>
                        </h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#workProcessSectionModal">{{ __('content.section_title_and_description') }}</button>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#workProcessModal">+ {{ __('content.add_work_process') }}</button>
                        </div>
                    </div>

                    @if (count($items) > 0)
                        <div class="mr-3">
                            <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                            <label for="check_all">{{ __('content.all') }}</label>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('work-process.destroy_checked') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                @endif

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
                            <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>{{ __('content.title') }}</th>
                                    <th>{{ __('content.order') }}</th>
                                    <th class="custom-width-action">{{ __('content.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $desc = count($items); $asc=0; @endphp
                                @foreach ($items as $feature)
                                    <tr>
                                        <td>
                                            <input name="check_list[]" type="checkbox" value="{{ $feature->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                        </td>
                                        <td>{{ $feature->title }}</td>
                                        <td>{{ $feature->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('work-process.edit', $feature->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $feature->id }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $feature->id }}" tabindex="-1" role="dialog" aria-labelledby="featureModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="featureModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                                </div>
                                                <div class="modal-footer">
                                                @if ($demo_mode == "on")
                                                    <!-- Include Alert Blade -->
                                                        @include('admin.demo_mode.demo-mode')
                                                    @else
                                                        <form class="d-inline-block" action="{{ route('work-process.destroy', $feature->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            @endif

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <span>{{ __('content.not_yet_created') }}</span>
                            @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
    <div class="modal fade" id="workProcessSectionModal" tabindex="-1" role="dialog" aria-labelledby="workProcessSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="workProcessSectionModalLabel">{{ __('content.section_title_and_description') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if (isset($item_section))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('work-process-section.update', $item_section->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                                <input type="hidden" name="style" value="{{ $style }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }}
                                                @if ($style == 'style1') 540 x 565) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                @elseif($style == 'style2') 520 x 640) (.svg, .jpg, .jpeg, .png, .webp, .gif)
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
                                                                    <img src="{{ asset('uploads/img/work_process/'.$item_section->section_image) }}" alt="image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        @if (!empty($item_section->section_image))
                                                            <a class="mt-3 d-block" href="#" data-toggle="modal" data-target="#deleteImageModal{{ $item_section->id }}">
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

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title_2">{{ __('content.title') }}</label>
                                                <input type="text" name="title" class="form-control" id="title_2" value="{{ $item_section->title }}">
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

                                    @if ($style == 'style2')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description_2">{{ __('content.description') }}</label>
                                                <textarea name="description" class="form-control" id="description_2" rows="3">{{ $item_section->description }}</textarea>
                                                <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description_2')">{{ __('<a href="">') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description_2')">{{ __('<br>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description_2')">{{ __('<b>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description_2')">{{ __('<i>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description_2')">{{ __('<span>') }}</span>
                                                    <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description_2')">{{ __('<p>') }}</span>
                                                </small>
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" name="description">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mr-2">{{ __('content.submit') }}</button>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#workProcessSectionDestroyModal{{ $item_section->id }}">
                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                </a>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteImageModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
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
                                            @if ($demo_mode == "on")
                                                <!-- Include Alert Blade -->
                                                @include('admin.demo_mode.demo-mode')
                                            @else
                                                <form class="d-inline-block" action="{{ route('work-process-section.destroy_image', $item_section->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    @endif

                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="workProcessSectionDestroyModal{{ $item_section->id }}" tabindex="-1" role="dialog" aria-labelledby="workProcessSectionDestroyModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="workProcessSectionDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.you_wont_be_able_to_revert_this') }}
                                        </div>
                                        <div class="modal-footer">
                                            @if ($demo_mode == "on")
                                                <!-- Include Alert Blade -->
                                                @include('admin.demo_mode.demo-mode')
                                            @else
                                                <form class="d-inline-block" action="{{ route('work-process-section.destroy', $item_section->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    @endif

                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
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
                                    <form action="{{ route('work-process-section.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @endif

                                        <input type="hidden" name="style" value="{{ $style }}">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_image">{{ __('content.image') }} ({{ __('content.size') }}
                                                        @if ($style == 'style1') 541 x 567) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                        @elseif ($style == 'style2') 521 x 640) (.svg, .jpg, .jpeg, .png, .webp, .gif)
                                                        @endif
                                                    </label>
                                                    <input type="file" name="section_image" class="form-control-file" id="section_image">
                                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
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
                                            @if ($style == 'style2')
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description_2">{{ __('content.description') }}</label>
                                                        <textarea name="description" class="form-control" id="description_2" rows="3"></textarea>
                                                        <small class="form-text text-muted">{{ __('content.recommended_tags') }}
                                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('a', 'description_2')">{{ __('<a href="">') }}</span>
                                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('br', 'description_2')">{{ __('<br>') }}</span>
                                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('b', 'description_2')">{{ __('<b>') }}</span>
                                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('i', 'description_2')">{{ __('<i>') }}</span>
                                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('span', 'description_2')">{{ __('<span>') }}</span>
                                                            <span class="text-danger font-weight-bold custom-tag mr-1" onclick="insertTag('p', 'description_2')">{{ __('<p>') }}</span>
                                                        </small>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="description">
                                            @endif

                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                                    </form>
                                @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="workProcessModal" tabindex="-1" role="dialog" aria-labelledby="workProcessLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="workProcessLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('work-process.store') }}" method="POST">
                            @csrf
                            @endif

                            <input name="style" type="hidden" value="{{ $style }}">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} </label>
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
                                        <label for="description">{{ __('content.description') }} </label>
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
@endsection
