<?php
/**
 * @author  Allen <ali@goodcatch.cn>
 */

namespace Goodcatch\Modules\ModuleExample\Model;

use Goodcatch\Modules\Laravel\Model\Model as BaseModel;

abstract class Model extends BaseModel
{

    /**
     * add prefix to module table name
     *
     * @var string module table with prefix
     * @return string prefix of table name
     */
    protected function getModuleTablePrefix () {
        return 'moduleexample_';
    }

}
