<?php

namespace Goodcatch\Modules\ModuleExample\Http\Controllers;

use Goodcatch\Modules\Base\Http\Controllers\SpaController as Controller;
use Illuminate\Support\Facades\View;

class SpaController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        View::share('goodcatch', 'Goodcatch Modules Example');
    }

    protected function moduleIndex(array $view_content){

        $view_content = array_merge($view_content, [
            'menu_type' => config('moduleexample.menu.type'),
            'app_name' => dynamic_config('app_name_moduleexample', _trans('experiment::base.app_name', '实验检测'))
        ]);

        return view('moduleexample::index', $view_content);
    }
}