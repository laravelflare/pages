<?php

namespace LaravelFlare\Pages;

use LaravelFlare\Flare\Admin\Modules\ModuleAdmin;

class PageModule extends ModuleAdmin
{    
    /**
     * Admin Section Icon.
     *
     * Font Awesome Defined Icon, eg 'user' = 'fa-user'
     *
     * @var string
     */
    protected static $icon = 'file-text-o';

    /**
     * Title of Admin Section.
     *
     * @var string
     */
    protected static $title = 'Page';
    
    /**
     * The Module Admin Default View.
     *
     * @var string
     */
    protected static $view = 'admin.pages.index';
}
