<div class="box box-default">

    <div class="box-header with-border">
        <i class="fa fa-calendar-o"></i>
        <h3 class="box-title">
            Publish
        </h3>
    </div>

    <div class="box-body">

        @if ($page->created_at)
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <strong>
                        Created:
                    </strong>
                </span>
                <input type="text" class="form-control" value="{{ $page->created_at->format('M j, Y @ H:i') }}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
        @else
        <p>Not yet published</p>
        @endif

        @if ($page->updated_at)
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <strong>
                        Updated:
                    </strong>
                </span>
                <input type="text" class="form-control" value="{{ $page->updated_at->format('M j, Y @ H:i') }}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
        @endif

    </div>

    <div class="box-footer">

        @if ($page->id)
        <a href="{{ $moduleAdmin->currentUrl('delete/'.$page->id) }}" class="btn btn-danger" value="trash">
            <i class="fa fa-trash"></i>
            Trash
        </a>
        @endif

        <div class="btn-group pull-right">
            <button class="btn btn-info" type="submit" name="submit" action="save-publish">
                Save &amp; Publish
            </button>
            {{--
            <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button">
                <span class="caret"></span>
                <span class="sr-only">Toggle Options</span>
            </button>
            <ul role="menu" class="dropdown-menu">
                <li><a href="#">Save</a></li>
                <li><a href="#">Save &amp; Create Another</a></li>
                <li><a href="#">Save &amp; Unpublish</a></li>
                <li><a href="#">Unpublish</a></li>
            </ul>
            --}}
        </div>

    </div>
    
</div>