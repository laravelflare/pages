<div class="box-footer clearfix">
    <div class="pull-left">
        <a href="{{ $moduleAdmin->currentUrl('create') }}" class="btn btn-success">
            <i class="fa fa-file-o"></i>
            Add Page
        </a>
    </div>

    @if ($pages->hasPages())
    <div class="pull-right" style="margin-top: -20px; margin-bottom: -20px;">
        {!! $pages->render() !!}
    </div>
    @endif
</div>