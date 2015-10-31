<?php

namespace LaravelFlare\Pages\Http\Controllers;

use LaravelFlare\Pages\Page;
use LaravelFlare\Flare\Admin\AdminManager;
use LaravelFlare\Flare\Admin\Modules\ModuleAdminController;

class PagesAdminController extends ModuleAdminController
{
    /**
     * Admin Instance.
     * 
     * @var 
     */
    protected $admin;

    /**
     * __construct.
     * 
     * @param AdminManager $adminManager
     */
    public function __construct(AdminManager $adminManager)
    {
        // Must call parent __construct otherwise 
        // we need to redeclare checkpermissions
        // middleware for authentication check
        parent::__construct($adminManager);

        $this->admin = $this->adminManager->getAdminInstance();
    }

    /**
     * Index Page for Module.
     *
     * Lists the current pages in the system.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('flare::admin.pages.index', ['pages' => Page::paginate()]);
    }

    /**
     * Create a new Page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('flare::admin.pages.create', ['page' => new Page()]);
    }

    /**
     * Edit a Page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getEdit($page_id)
    {
        return view('flare::admin.pages.edit', ['page' => Page::findOrFail($page_id)]);
    }

    /**
     * Method is called when the appropriate controller
     * method is unable to be found or called.
     * 
     * @param array $parameters
     * 
     * @return
     */
    public function missingMethod($parameters = array())
    {
        parent::missingMethod();
    }
}
