<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <textarea id="content"
                        class="form-control"
                        name="content">{{ old('content', $page->content) }}</textarea>
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