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
                <div class="alert alert-danger no-margin">
                    <i class="icon fa fa-exclamation-triangle"></i>
                    @if ($page->trashed())
                        <strong>Are you sure you wish to permanently delete this page?</strong>
                        <p>
                            Once a page is permanently deleted it can no longer be recovered.
                        </p>
                    @else
                        <strong>Are you sure you wish to trash this Page?</strong>
                        <p>
                            The page will be sent to the trash, where it can either be restored or deleted permanently.
                        </p>
                    @endif 
                </div>
            </div>
            <div class="box-footer">
                {!! csrf_field() !!}
                <a href="{{ $moduleAdmin->currentUrl() }}" class="btn btn-default">
                    Cancel
                </a>
                <button class="btn btn-danger" type="submit">
                    <i class="fa fa-trash"></i>
                    @if ($page->trashed())
                    Delete Page
                    @else 
                    Trash Page
                    @endif
                </button>
            </div>
        </form>
    </div>

@stop
