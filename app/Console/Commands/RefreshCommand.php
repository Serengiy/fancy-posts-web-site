<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{

    protected $signature = 'app:refresh';

    protected $description = 'Command description';

    public function handle()
    {
        if(app()->isProduction()){
            return self::FAILURE;
        }
        Storage::deleteDirectory('images/products');
        $this->call('migrate:refresh', [
            '--seed' => true
        ]);
    }
}
