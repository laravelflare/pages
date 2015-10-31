<?php

namespace LaravelFlare\Pages\Http\Controllers;

use LaravelFlare\Pages\Page;
use LaravelFlare\Flare\Admin\AdminManager;
use LaravelFlare\Pages\Http\Requests\PageEditRequest;
use LaravelFlare\Pages\Http\Requests\PageCreateRequest;
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
     * Processes a new Page Request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(PageCreateRequest $request)
    {
        $page = Page::create($request->only(['name', 'content']));
        $page->saveSlug($request->input('slug'));

        return redirect($this->admin->currentUrl('edit/'.$page->id))->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'Your page was successfully created.', 'dismissable' => false]]);
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
     * Processes a new Page Request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(PageEditRequest $request, $page_id)
    {
        $page = Page::findOrFail($page_id)->fill($request->only(['name', 'content']));
        $page->save();
        $page->saveSlug($request->input('slug'));

        return redirect($this->admin->currentUrl('edit/'.$page_id))->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'Your page was successfully updated.', 'dismissable' => false]]);
    }

    /**
     * Delete a Page.
     *
     * @param int $page_id
     * 
     * @return \Illuminate\Http\Response
     */
    public function getDelete($page_id)
    {
        return view('flare::admin.pages.delete', ['page' => Page::findOrFail($page_id)]);
    }

    /**
     * Process Delete Page Request.
     *
     * @param int $page_id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete($page_id)
    {
        $page = Page::findOrFail($page_id);
        $page->slug()->delete();
        $page->delete();

        return redirect($this->admin->currentUrl())->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'The page was successfully removed.', 'dismissable' => false]]);
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
