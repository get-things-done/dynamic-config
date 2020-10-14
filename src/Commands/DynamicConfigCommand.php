<?php

namespace GetThingsDone\DynamicConfig\Commands;

use Illuminate\Console\Command;

class DynamicConfigCommand extends Command
{
    public $signature = 'dynamic-config';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
