@extends('flare::admin.sections.wrapper')

@section('page_title', 'Pages')

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        All Pages
                    </h3>
                    {{--
                    <div class="btn-group">
                        <button class="btn btn-default btn-flat" type="button">
                            All Pages
                            <span class="badge bg-green" style="margin-left: 15px">13</span>
                        </button>
                        <button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <span style="display:inline-block; width: 100px;">
                                        With Trashed
                                    </span>
                                    <span class="badge bg-yellow">15</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span style="display:inline-block; width: 100px;">
                                        Trashed Only
                                    </span>
                                    <span class="badge bg-red">2</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <span style="display:inline-block; width: 100px;">
                                        Only Drafts
                                    </span>
                                    <span class="badge bg-gray">6</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group pull-right">
                        <div style="width: 350px;" class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                    10 Per Page <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">25 Per Page</a></li>
                                    <li><a href="#">50 Per Page</a></li>
                                    <li><a href="#">100 Per Page</a></li>
                                </ul>
                            </div>

                            <input type="text" placeholder="Search" class="form-control pull-right">

                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
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
                                {{--
                                <th>
                                    Author
                                </th>
                                --}}
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
                                    {{--
                                    <td>
                                        {{ $page->author }}
                                    </td>
                                    --}}
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
                                    <td>
                                        <a class="btn btn-success btn-xs" href="{{ $page->link }}">
                                            <i class="fa fa-eye"></i>
                                            View
                                        </a>
                                        <a class="btn btn-primary btn-xs" href="{{ $moduleAdmin::currentUrl('edit/'.$page->id) }}">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-xs" href="{{ $moduleAdmin::currentUrl('delete/'.$page->id) }}">
                                            <i class="fa fa-trash"></i>
                                            Delete
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
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        <a href="{{ $moduleAdmin::currentUrl('create') }}" class="btn btn-success">
                            <i class="fa fa-file-o"></i>
                            Add Page
                        </a>
                    </div>

                    @if ($pages->hasMorePages())
                    <div class="pull-right" style="margin-top: -20px; margin-bottom: -20px;">
                        {!! $pages->render() !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop
