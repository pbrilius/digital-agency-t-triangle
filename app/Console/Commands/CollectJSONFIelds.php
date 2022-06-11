<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CollectJSONFIelds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:collect-json-fields';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collecting JSON enabled fields'
        . ' from data-expansion/affiliates.json';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
