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
    protected $icon = 'file-o';

    /**
     * Title of Admin Section.
     *
     * @var string
     */
    protected $title = 'Page';

    /**
     * The Controller to be used by the Pages Module.
     * 
     * @var string
     */
    protected $controller = '\LaravelFlare\Pages\Http\Controllers\PagesAdminController';
}
