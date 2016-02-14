@extends('flare::admin.sections.wrapper')

@section('page_title', 'Pages')

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="btn-group">
                        <a href="{{ $moduleAdmin->currentUrl() }}" class="btn btn-default btn-flat">
                            All Pages
                            <span class="badge bg-green" style="margin-left: 15px">{{ $totals['all'] }}</span>
                        </a>
                        <button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="{{ $moduleAdmin->currentUrl('all') }}">
                                    <span style="display:inline-block; width: 100px;">
                                        With Trashed
                                    </span>
                                    <span class="badge bg-yellow">{{ $totals['with_trashed'] }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $moduleAdmin->currentUrl('trashed') }}">
                                    <span style="display:inline-block; width: 100px;">
                                        Trashed Only
                                    </span>
                                    <span class="badge bg-red">{{ $totals['only_trashed'] }}</span>
                                </a>
                            </li>
                            {{--
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <span style="display:inline-block; width: 100px;">
                                        Only Drafts
                                    </span>
                                    <span class="badge bg-gray">6</span>
                                </a>
                            </li>
                            --}}
                        </ul>
                    </div>

                    {{--
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
                
                @include('flare::admin.pages.includes.page-list')
                
                @include('flare::admin.pages.includes.page-list-footer')

            </div>
        </div>
    </div>
</div>

@stop
