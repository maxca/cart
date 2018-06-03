<?php

namespace Samark\Carts\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CopyMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'samark:copy-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy migration file.';

    /**
     * winner list
     * @var collection
     */
    protected $generate;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        Log::info('start process ' . get_class());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dir = __DIR__ . '/../../database/';
        foreach (scandir($dir) as $key => $value) {
            if (!in_array($value, ['..', '.'])) {
                copy($dir . $value, base_path() . '/database/migrations/' . $value);
                dump("copy " . $value . " success");
            }
        }

    }
}
