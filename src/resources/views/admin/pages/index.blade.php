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
                    <div class="box-tools">
                        <div style="width: 350px;" class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                    10 Per Page <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">25 Per Page</a></li>
                                    <li><a href="#">50 Per Page</a></li>
                                    <li><a href="#">100 Per Page</a></li>
                                </ul>
                            </div>

                            <input type="text" placeholder="Search" class="form-control input-sm pull-right">

                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="tight">
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Created On
                                </th>
                                <th>
                                    Created At
                                </th>
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
                                        {{ $page->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $page->updated_at->diffForHumans() }}
                                    </td>
                                    <td>

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
                        <a href="#" class="btn btn-success">
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
