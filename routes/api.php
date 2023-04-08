<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 *
 * @author allen <ali@goodcatch.cn>
 * 后台 路由
 *
 */
Route::group(
    [
        'as' => 'moduleexample::',
    ],
    function () {
        Route::prefix('Admin')->group(function(){
            Route::namespace('Admin')->prefix('goodcatch')->group(function(){
                Route::prefix(module_route_prefix())->group(function(){
                    Route::prefix('moduleexample')->name('admin.')->group(function(){
                        Route::group(['middleware'=>'jwt.admin'], function(){
                            Route::apiResources([
                                // 'areas'=>'AreaController', // 区域
                            ], [
                                'parameters' => [
                                    // 'area' => 'id',
                                ]
                            ]);
                            // 自动加载生成的其它路由
                            if(is_dir(dirname(__DIR__) . '/routes/auto')){
                                foreach (new DirectoryIterator(dirname(__DIR__) . '/routes/auto') as $f) {
                                    if ($f->isDot()) {
                                        continue;
                                    }
                                    $name = $f->getPathname();
                                    if ($f->isFile() && Str::endsWith($name, '.php')) {
                                        require $name;
                                    }
                                }
                            }
                        });
                    });
                });
            });
        });
    });



