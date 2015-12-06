<?php

namespace LaravelFlare\Pages;

use LaravelFlare\Cms\Views\Viewable;
use LaravelFlare\Cms\Slugs\Sluggable;
use Illuminate\Database\Eloquent\Model;
use LaravelFlare\Versioning\Versionable;
use LaravelFlare\Cms\Views\ViewableModel;
use LaravelFlare\Cms\Slugs\SluggableModel;
use LaravelFlare\Versioning\VersionableModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Sluggable, Viewable, Versionable
{
    use SluggableModel, ViewableModel, VersionableModel, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'flare_cms_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'template'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Default Page View.
     *
     * @return string
     */
    protected $view = 'flare::pages.index';

    /**
     * Page View.
     * 
     * @return string
     */
    public function view()
    {   
        if (!$this->template || !view()->exists($this->template)) {
            return $this->view;
        }

        return $this->template;
    }

    /**
     * Page belongs to Author.
     * 
     * @return
     */
    public function author()
    {
        return $this->belongsTo(config('auth.model'), 'author_id');
    }

    /**
     * Provides the Author Name Accessor.
     * 
     * @return string
     */
    public function getAuthorNameAttribute()
    {
        if ($this->author) {
            return $this->author->name;
        }
    }
}
