<?php

namespace OwlAdmin\Components\Http\Controllers;

use Slowlyo\OwlAdmin\Controllers\AdminController;

class ComponentsController extends AdminController
{
    public function index()
    {
        $page = $this->basePage()->body('Components Extension.');

        return $this->response()->success($page);
    }
}
