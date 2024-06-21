@extends('layouts.admin.master')

@section('content')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.portfolio_content') }}</h4>
                @if (isset($portfolio_content))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('portfolio-content.update', $portfolio_content->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @endif

                            <input name="portfolio_id" type="hidden" value="{{ $id }}">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="summernote">{{ __('content.description') }}</label>
                                                <textarea type="text" name="description" class="form-control" id="summernote">@php echo html_entity_decode($portfolio_content->description); @endphp</textarea>
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
                                                                        <input id="title" name="meta_description" type="text" class="form-control" value="{{ $portfolio_content->meta_description }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                        <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ $portfolio_content->meta_keyword }}</textarea>
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
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#portfolioContentDestroyModal{{ $portfolio_content->id }}">
                                                    <i class="fa fa-trash"></i> {{ __('content.reset') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="portfolioContentDestroyModal{{ $portfolio_content->id }}" tabindex="-1" role="dialog" aria-labelledby="portfolioContentDestroyModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="portfolioContentDestroyModalCenterTitle">{{ __('content.delete') }}</h5>
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
                                            <form class="d-inline-block" action="{{ route('portfolio-content.destroy', $portfolio_content->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @endif

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
                                <form action="{{ route('portfolio-content.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif

                                    <input name="portfolio_id" type="hidden" value="{{ $id }}">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
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
                                                                                <textarea id="meta_keyword" name="meta_keyword" class="form-control"></textarea>
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
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary col-12">{{ __('content.submit') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
