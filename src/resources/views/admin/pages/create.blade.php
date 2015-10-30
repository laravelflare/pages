@extends('flare::admin.sections.wrapper')

@section('page_title', 'Create Page')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="form-group">
                    <input type="text" id="title"
                                class="form-control input-lg"
                                name="title"
                                placeholder="Enter Page Title">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <strong>
                                Link:
                            </strong>
                            {{ url() }}/
                        </span>
                        <input type="text" class="form-control" value="example/slug/here" readonly>
                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default btn-flat">
                                Edit
                            </a>
                        </span>
                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default btn-flat">
                                View Page
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="content">
                                Content *
                            </label>
                            <textarea id="content"
                                        class="form-control"
                                        name="content"></textarea>
                        </div>
                    </div>
                </div>

                @section('enqueued-js')
                    <script>
                    $(function () {
                        $("#content").wysihtml5();
                    });
                    </script>
                @append 
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-calendar-o"></i>
                <h3 class="box-title">Publish</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <strong>
                                Published:
                            </strong>
                        </span>
                        <input type="text" class="form-control" value="4th November 2015 @ 23:59">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-danger" value="trash" type="submit">
                    <i class="fa fa-trash"></i>
                    Trash
                </button>
                <div class="btn-group pull-right">
                    <button class="btn btn-info" type="button">
                        Save &amp; Publish
                    </button>
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
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-file-code-o"></i>
                <h3 class="box-title">Page Settings</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Page Parent:</label>
                    <select class="form-control">
                        <option>Homepage</option>
                        <option>About Us</option>
                        <option>Portfolio</option>
                        <option>Contact</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Template:</label>
                    <select class="form-control">
                        <option>Default</option>
                        <option>Single Column</option>
                        <option>Left Sidebar</option>
                        <option>Right Sidebar</option>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                
            </div>
        </div>
    </div>
</div>

@stop
