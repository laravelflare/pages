@extends('flare::admin.sections.wrapper')

@section('page_title', 'Delete Page')

@section('content')

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">
            Delete {{ $page->name }}
        </h3>
    </div>
    <form action="" method="post">
        <div class="box-body">
            <div class="alert alert-danger">
                <i class="icon fa fa-danger"></i>
                Are you sure you wish to delete this Page?
            </div>
        </div>
        <div class="box-footer">
            {!! csrf_field() !!}
            <a href="{{ $moduleAdmin::currentUrl() }}" class="btn btn-default">
                Cancel
            </a>
            <button class="btn btn-danger" type="submit">
                <i class="fa fa-trash"></i>
                Delete Page
            </button>
        </div>
    </form>
</div>

@stop
