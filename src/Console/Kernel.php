<?php
/**
 * @author  Allen <ali@goodcatch.cn>
 */

namespace Goodcatch\Modules\ModuleExample\Console;

use Goodcatch\Modules\Laravel\Console\Concerns\DispatchSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel implements DispatchSchedule
{

    private $schedule;

    private $container;

    /**
     * 内核实例
     * @var ConsoleKernel
     */
    private $consoleKernel;

    private $events;

    public function __construct (Application $container, ConsoleKernel $kernel, Schedule $schedule, Dispatcher $events)
    {
        $this->container = $container;
        $this->schedule = $schedule;
        $this->consoleKernel = $kernel;
        $this->events = $events;
    }

    public function schedule()
    {
        // TODO: Implement schedule() method.
    }
}
