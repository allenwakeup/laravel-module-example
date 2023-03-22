<?php

namespace Goodcatch\Modules\ModuleExample\Database\Seeders;

use Goodcatch\Modules\Base\Traits\PermissionSeedsTrait;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    use PermissionSeedsTrait;

    const MODULE_NAME = '模块示例';
    const MODULE_ALIAS = 'moduleexample';

    const MODULE_API_PREFIX = 'moduleexample';

    public function getSeedsMenus (){
        $menu_type = config('moduleexample.menu.type');
        return [
            [
                'name' => self::MODULE_NAME,
                'icon' => 'icon-gc-' . self::MODULE_ALIAS,
                'is_type' => $menu_type,
                'link' => $this->getSeedsModuleApiUri(self::MODULE_ALIAS, 'index'),
                'children' => [
                    [
                        'name' => '主数据',
                        'icon' => 'icon-gc-data',
                        'is_type' => $menu_type,
                        'children' => [
                            [
                                'name' => '示例管理',
                                'icon' => 'icon-gc-examples',
                                'is_type' => $menu_type,
                                'link' => $this->getSeedsModuleApiUri(self::MODULE_ALIAS,'examples'),
                            ],

                        ]
                    ]
                ]
            ]
        ];
    }

    public function getSeedsPermissionGroups (){
        return [

            // 主数据
            // 示例管理
            $this->getSeedsModuleMenuGroupName(self::MODULE_ALIAS, '示例管理') => [
                self::MODULE_API_PREFIX . '::admin.examples'
            ],

        ];
    }
}
