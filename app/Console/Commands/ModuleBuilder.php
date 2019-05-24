<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Modules\Shared\Models\Module;

class ModuleBuilder extends Command
{
    /**
     * The module name.
     *
     * @var string
     */
    protected $module;

    /**
     * The module plural name.
     *
     * @var string
     */
    protected $modulePlural;

    /**
     * The module font-awesome icon.
     *
     * @var string
     */
    protected $moduleIcon;

    /**
     * The module folder name.
     * 
     * @var string
     */
    protected $moduleFolderName;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anchor:module 
                            {name : The singular name of the module} 
                            {plural : The plural name of the module} 
                            {icon : ex.fa-adjust}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create dir skeletons for a new module';

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

        $modulePlural = $this->argument('plural');

        $moduleIcon = $this->argument('icon');

        $this->module = ucfirst(strtolower($module));

        $this->modulePlural = ucfirst(strtolower($modulePlural));

        $this->moduleIcon = strtolower($moduleIcon);

        $this->__validate_module();

        $this->__build_module();

        $this->__register_module();
        
        $this->info( trans('system.console.module.register', [ 'module' => $module]) );
    }

    /**
     * Validate if this module already exists.
     */
    protected function __validate_module()
    {
        $path = app_path('Modules/'.$this->module);
        if(File::exists($path)) {
            $this->error( trans('system.console.module.duplicate') );
            exit();
        }
    }

    /**
     * Build modules
     */
    protected function __build_module()
    {
        $folders = [
            'repositories',
            'models',
            'requests',
            'transformers',
            'migrations',
            'seeders',
            'configurations'
        ];

        $this->__create_parent_directory();

        foreach($folders as $folder) {
            $this->__create_child_directories($folder);
        }
    }

    /**
     * Create parent module directory
     */
    protected function __create_parent_directory()
    {
        $this->moduleFolderName = app_path('Modules/'.$this->module.'/');
        File::makeDirectory($this->moduleFolderName);
        $this->line( trans('system.console.module.created', ['folder' => $this->module ]) );
    }

    /**
     * Create child module directories
     */
    protected function __create_child_directories($folder)
    {
        File::makeDirectory($this->moduleFolderName.ucfirst($folder));
        $this->line( trans('system.console.module.created', ['folder' => ucfirst($folder) ]) );
    }

    /**
     * Register module in the database
     */
    protected function __register_module()
    {
        Module::create([
            'name' => $this->module,
            'name_plural' => $this->modulePlural,
            'icon_class_name' => $this->moduleIcon
        ]);
    }
}
