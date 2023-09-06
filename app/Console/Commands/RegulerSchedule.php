<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RegulerSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:regulerSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Schedule for Reguler Travel';

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
     * @return int
     */
    public function handle()
    {
        // $request = Request::create('/joy/test/controller', 'GET');
        echo 'HAI - ' . date('H:i:s') . '
';

    }
}
