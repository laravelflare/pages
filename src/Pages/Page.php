<?php

namespace LaravelFlare\Pages;

use LaravelFlare\Cms\Slugs\Sluggable;
use Illuminate\Database\Eloquent\Model;
use LaravelFlare\Cms\Slugs\SluggableModel;

class Page extends Model implements Sluggable
{
    use SluggableModel;

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
    protected $fillable = ['name', 'content'];
    
    /**
     * Provides a Link Accessor
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
