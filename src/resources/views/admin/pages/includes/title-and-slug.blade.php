<div class="form-group">
    <input type="text" id="name"
                class="form-control input-lg"
                name="name"
                placeholder="Enter Page Title"
                value="{{ old('name', $page->name) }}">
</div>
<div class="form-group no-margin">
    <div class="input-group">
        <span class="input-group-addon">
            <strong>
                Link:
            </strong>
            {{ url() }}/
        </span>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $page->slug) }}" readonly>
        <span class="input-group-btn">
            <a href="#" class="btn btn-default btn-flat">
                Edit
            </a>
        </span>
        @if ($page->link && !$page->trashed())
        <span class="input-group-btn">
            <a href="{{ url($page->link) }}" class="btn btn-default btn-flat">
                View Page
            </a>
        </span>
        @endif
    </div>
</div>