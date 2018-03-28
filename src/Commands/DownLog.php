<?php

namespace Tarasovych\MaintenanceLog\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class DownLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'down-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Put the application into maintenance mode with time log';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('down');

        $log = ['maintenance_down_at' => Carbon::now()->toDateTimeString()];

        $orderLog = new Logger('Maintenance down');
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/maintenance/maintenance_down.log')));
        $orderLog->info('Message:', $log);

        $this->info('Application is now in maintenance mode. Log stored.');
    }
}
