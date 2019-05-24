<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Facades\Log;
use Zip;

class AnchorPreset extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anchor:preset {mode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold things only based on need.';

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
        $mode = $this->argument('mode');

        switch($mode) 
        {
            case 'spa':
                if ($this->confirm('This will create complete front-end assets, do you wish to continue?'))
                    $this->_build_scaffolds();
                break;
            case 'api':
                if ($this->confirm('This will remove all front-end assets, do you wish to continue?'))
                    $this->_destroy_scaffolds();
                break;
            default:
                $this->line('Preset for `'.$mode.'` is undefined!');
                $this->comment('Nothing to do!');
        }
    }

    /**
     * Removes front-end folders
     */
    protected function _destroy_scaffolds()
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

    /**
     * 
     */
    protected function _build_scaffolds()
    {
        try {
            Zip::extract(public_path('public/frontend.zip'));
            $this->info('Added /client, package.json, webpack.mix.js nuxt.config.js files');
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
