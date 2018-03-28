<?php

namespace Tarasovych\MaintenanceLog;

use Illuminate\Support\ServiceProvider;
use Tarasovych\MaintenanceLog\Commands\DownLog;
use Tarasovych\MaintenanceLog\Commands\UpLog;

class MaintenanceLogProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->publishes([
//            __DIR__.'/Commands/DownLog.php' => app_path('Console/Commands/DownLog.php'),
//            __DIR__.'/Commands/UpLog.php' => app_path('Console/Commands/UpLog.php'),
//        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                DownLog::class,
                UpLog::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
