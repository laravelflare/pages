<div class="box-body no-padding">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Name
                </th>
                <th>
                    Author
                </th>
                <th>
                    Created On
                </th>
                <th>
                    Updated At
                </th>
                {{--
                <th>
                    Status
                </th>
                --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if ($pages->count() > 0)    
            @foreach($pages as $page)    
                <tr>
                    <td>
                        {{ $page->id }}
                    </td>
                    <td>
                        {{ $page->name }}
                    </td>
                    <td>
                        {{ $page->author_name }}
                    </td>
                    <td>
                        {{ $page->created_at->diffForHumans() }}
                    </td>
                    <td>
                        {{ $page->updated_at->diffForHumans() }}
                    </td>
                    {{--
                    <td>
                        {{ $page->status }}
                    </td>
                    --}}
                    <td style="width: 1%; white-space:nowrap">
                        @if (!$page->trashed())
                        <a class="btn btn-success btn-xs" href="{{ $page->link }}">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                        @endif
                        <a class="btn btn-primary btn-xs" href="{{ $moduleAdmin::currentUrl('edit/'.$page->id) }}">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                        @if ($page->trashed())
                        <a class="btn btn-info btn-xs" href="{{ $moduleAdmin::currentUrl('restore/'.$page->id) }}">
                            <i class="fa fa-undo"></i>
                            Restore
                        </a>
                        @else
                        <a class="btn btn-warning btn-xs" href="{{ $moduleAdmin::currentUrl('clone/'.$page->id) }}">
                            <i class="fa fa-clone"></i>
                            Clone
                        </a>
                        @endif
                        <a class="btn btn-danger btn-xs" href="{{ $moduleAdmin::currentUrl('delete/'.$page->id) }}">
                            <i class="fa fa-trash"></i>
                            @if ($page->trashed())
                            Delete
                            @else 
                            Trash
                            @endif
                        </a>
                    </td>
                </tr>
            @endforeach
        @else 
            <tr>
                <td colspan="5">
                    No Pages Found
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>