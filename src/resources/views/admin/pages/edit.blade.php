@extends('flare::admin.sections.wrapper')

@section('page_title', 'Edit Page')

@section('content')

<div class="row">

    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header with-border">
                @include('flare::admin.pages.includes.title-and-slug')
            </div>
            <div class="box-body">
                @include('flare::admin.pages.includes.editor')
            </div>
        </div>
    </div>

    <div class="col-md-3">
        @include('flare::admin.pages.includes.publish')
        @include('flare::admin.pages.includes.settings')
    </div>

</div>

@stop
