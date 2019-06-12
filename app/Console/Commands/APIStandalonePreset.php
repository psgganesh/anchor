<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class APIStandalonePreset extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anchor:api:standalone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this mode, if you do not need laravel to render view files.';

    /**
     * Create a new command instance.
     *
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
        if ($this->confirm('This will remove all front-end assets, do you wish to continue?')) {
            $this->__destroy_scaffolds();
            $this->line('Laravel application is now only used as a standalone API server');
        }

    }

    /**
     * Removes front-end folders
     */
    protected function __destroy_scaffolds()
    {
        try {
            File::removeDirectory(public_path('client'));
            File::removeDirectory(public_path('node_modules'));
            File::removeDirectory(public_path('.nuxt'));
            File::removeDirectory(public_path('package.json'));
            File::removeDirectory(public_path('package-lock.json'));
            File::removeDirectory(public_path('webpack.mix.js'));
            File::removeDirectory(public_path('public/_nuxt'));
            $this->info('Removed /client, /node_modules, .nuxt folders');
            $this->info('Removed package.json, package-lock.json, webpack.mix.js, nuxt.config.js files');
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
