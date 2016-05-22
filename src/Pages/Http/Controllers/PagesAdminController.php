<?php

namespace LaravelFlare\Pages\Http\Controllers;

use LaravelFlare\Pages\Page;
use LaravelFlare\Cms\Slugs\Slug;
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
        return view('flare::admin.pages.index', [
                                                    'pages' => Page::paginate(),
                                                    'totals' => [
                                                        'all' => Page::get()->count(),
                                                        'with_trashed' => Page::withTrashed()->get()->count(),
                                                        'only_trashed' => Page::onlyTrashed()->get()->count(),
                                                    ],
                                                ]
                                            );
    }

    /**
     * Lists Trashed Pages.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getTrashed()
    {
        return view('flare::admin.pages.trashed', [
                                                    'pages' => Page::onlyTrashed()->paginate(),
                                                    'totals' => [
                                                        'all' => Page::get()->count(),
                                                        'with_trashed' => Page::withTrashed()->get()->count(),
                                                        'only_trashed' => Page::onlyTrashed()->get()->count(),
                                                    ],
                                                ]
                                            );
    }

    /**
     * List All Pages inc Trashed.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return view('flare::admin.pages.all', ['pages' => Page::withTrashed()->paginate(),
                                                    'totals' => [
                                                        'all' => Page::get()->count(),
                                                        'with_trashed' => Page::withTrashed()->get()->count(),
                                                        'only_trashed' => Page::onlyTrashed()->get()->count(),
                                                    ],
                                                ]
                                            );
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
        $page = Page::create($request->only(['name', 'content', 'template']));
        $page->saveSlug($request->input('slug'));
        $page->author()->associate(\Auth::user())->save();

        return redirect($this->admin->currentUrl('edit/'.$page->id))->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'Your page was successfully created.', 'dismissable' => false]]);
    }

    /**
     * Edit a Page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getEdit($pageId)
    {
        return view('flare::admin.pages.edit', ['page' => Page::withTrashed()->findOrFail($pageId)]);
    }

    /**
     * Processes a new Page Request.
     *
     * Be proud of yourself, while the `set as homepage`
     * logic shouldn't be here, at least you have got
     * all Otwell and finally hit the 3 characters
     * shorter per line comments nearly spot on
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(PageEditRequest $request, $pageId)
    {
        $page = Page::withTrashed()->findOrFail($pageId)->fill($request->only(['name', 'content', 'template']));
        $page->author()->associate(\Auth::user());
        $page->save();

        if ($request->get('homepage') == 1) {
            // Checks for existing homepage, if it exists
            // removes its homepage slug and generates
            // it a new slug based off of its name.
            if ($existingHomepage = Slug::wherePath('')->first()) {
                if ($existingHomepage->model->id != $page->id && !is_a($existingHomepage->model, Page::class)) {
                    $existingHomepage->model->saveSlug();
                }
            }

            $page->saveSlug('', true);
        } else {
            $page->saveSlug($request->input('slug'));
        }

        return redirect($this->admin->currentUrl('edit/'.$pageId))->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'Your page was successfully updated.', 'dismissable' => false]]);
    }

    /**
     * Delete a Page.
     *
     * @param int $pageId
     * 
     * @return \Illuminate\Http\Response
     */
    public function getDelete($pageId)
    {
        return view('flare::admin.pages.delete', ['page' => Page::withTrashed()->findOrFail($pageId)]);
    }

    /**
     * Process Delete Page Request.
     *
     * @param int $pageId
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete($pageId)
    {
        $page = Page::withTrashed()->findOrFail($pageId);

        if ($page->trashed()) {
            $page->slug()->delete();
            $page->forceDelete();
            $action = 'deleted';
        } else {
            $page->delete();
            $action = 'trashed';
        }

        return redirect($this->admin->currentUrl())->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'The page was successfully '.$action.'.', 'dismissable' => false]]);
    }

    /**
     * Restore a Page.
     *
     * @param int $pageId
     * 
     * @return \Illuminate\Http\Response
     */
    public function getRestore($pageId)
    {
        return view('flare::admin.pages.restore', ['page' => Page::onlyTrashed()->findOrFail($pageId)]);
    }

    /**
     * Process Restore Page Request.
     *
     * @param int $pageId
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRestore($pageId)
    {
        $page = Page::onlyTrashed()->findOrFail($pageId)->restore();

        return redirect($this->admin->currentUrl())->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'The page was successfully restored.', 'dismissable' => false]]);
    }

    /**
     * Clone a Page.
     *
     * @param int $pageId
     * 
     * @return \Illuminate\Http\Response
     */
    public function getClone($pageId)
    {
        Page::findOrFail($pageId)->replicate()->save();

        return redirect($this->admin->currentUrl())->with('notifications_below_header', [['type' => 'success', 'icon' => 'check-circle', 'title' => 'Success!', 'message' => 'The page was successfully cloned.', 'dismissable' => false]]);
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
