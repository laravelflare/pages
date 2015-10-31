<?php

namespace LaravelFlare\Pages;

use LaravelFlare\Cms\Slugs\Sluggable;
use Illuminate\Database\Eloquent\Model;
use LaravelFlare\Cms\Slugs\SluggableModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Sluggable
{
    use SluggableModel, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'is_home'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
     * Provides the Author Name Accessor
     * 
     * @return string
     */
    public function getAuthorNameAttribute()
    {
        if ($this->author) {
            return $this->author->name;
        }
    }

    /**
     * Provides the Link Accessor
     * 
     * @return string
     */
    public function getLinkAttribute()
    {
        if ($this->slug) {
            return url($this->slug);
        }
    }
}
