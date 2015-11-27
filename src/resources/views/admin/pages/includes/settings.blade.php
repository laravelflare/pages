<div class="box box-default">
    <div class="box-header with-border">
        <i class="fa fa-file-code-o"></i>
        <h3 class="box-title">Page Settings</h3>
    </div>
    <div class="box-body">
       {{-- <div class="form-group">
            <label>Page Parent:</label>
            <select class="form-control" name="parent">
                <option></option>
            </select>
        </div> --}}
        <div class="form-group">
            <label>Template:</label>
            <input type="text" id="template"
                class="form-control"
                name="template"
                placeholder="Page Template (dot notation)"
                value="{{ old('template', $page->template) }}">
            {{-- <select class="form-control" name="template">
                <option></option>
            </select> --}}
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <label>Homepage:</label>
            <input type="checkbox" id="homepage"
                name="homepage"
                value="1"
                @if($page->slug && $page->slug->path == '') checked="checked" @endif
            ">
            <p>
                Sets page as the homepage and removes its slug.
            </p>
        </div>
    </div>
</div>