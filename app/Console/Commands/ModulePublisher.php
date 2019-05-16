<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class ModulePublisher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:publish {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish files of the new module';

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
        $module = $this->argument('name');

        $module = ucfirst(strtolower($module));

        File::makeDirectory(app_path('Modules/'.$module));
        File::makeDirectory(app_path('Modules/'.$module.'/Repositories/'));
        File::makeDirectory(app_path('Modules/'.$module.'/Models/'));
        File::makeDirectory(app_path('Modules/'.$module.'/Requests/'));
        File::makeDirectory(app_path('Modules/'.$module.'/Transformers/'));
        File::makeDirectory(app_path('Modules/'.$module.'/Migrations/'));
        File::makeDirectory(app_path('Modules/'.$module.'/Seeders/'));
        File::makeDirectory(app_path('Modules/'.$module.'/Configurations/'));

        $this->info("New module {$module} created.");
    }
}
