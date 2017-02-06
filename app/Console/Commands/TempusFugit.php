<?php

namespace App\Console\Commands;

use App\Traits\TempusFugitHelper;
use Illuminate\Console\Command;

class TempusFugit extends Command
{
    use TempusFugitHelper;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:tempusfugit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running this command make the time goes by in the game. This should be runned every hour (in real life).';

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
     * @return mixed
     */
    public function handle()
    {
        $this->trainUnits();
    }
}
