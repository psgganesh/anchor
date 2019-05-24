<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ModulePublisher extends Command
{
    /**
     * The module name.
     *
     * @var string
     */
    protected $module;
    
    /**
     * The file system object.
     *
     * @var object
     */
    protected $fileSystem;
    
    /**
     * The module's migration directory.
     *
     * @var string
     */
    protected $moduleMigrationsDirectory;

    /**
     * The module's seeds directory.
     *
     * @var string
     */
    protected $moduleSeedsDirectory;

    /**
     * The module's config directory.
     *
     * @var string
     */
    protected $moduleConfigrationDirectory;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anchor:publish {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish files for an existing module';

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
        
        $this->module = $module;
        $this->fileSystem = new Filesystem();
        
        $this->setPaths($module);

        $this->publishMigrations();

        $this->publishSeeders();

        $this->publishConfigurationFiles();

        $this->info("Files of {$this->module} module published.");
    }

    /**
     * Sets default module folder paths
     * 
     * @return void
     */
    public function setPaths()
    {
        $this->moduleSeedsDirectory = app_path('Modules/'.$this->module.'/Seeders');
        $this->moduleMigrationsDirectory = app_path('Modules/'.$this->module.'/Migrations');
        $this->moduleConfigrationDirectory = app_path('Modules/'.$this->module.'/Configurations');
    }

    /**
     * Publish all migration files
     */
    public function publishMigrations()
    {
        $directory = $this->moduleMigrationsDirectory;
        if (!$this->fileSystem->exists($directory)) 
            return false;

        // Get all files in this directory.
        $files = $this->fileSystem->files($directory);
        if (!empty($files)) {
            foreach($files as $file) {
                $this->fileSystem->copy($file->getPathname(), database_path('/migrations/'.$file->getFilename()));
            }
        }
        
    }

    /**
     * Publish all seed files
     */
    public function publishSeeders()
    {
        // Target directory.
        $directory = $this->moduleSeedsDirectory;

        // Check if the directory exists.
        if ($this->fileSystem->exists($directory)) {

        // Get all files in this directory.
        $files = $this->fileSystem->files($directory);
            if (!empty($files)) {
                foreach($files as $file) {
                    $this->fileSystem->copy($file->getPathname(), database_path('/seeds/'.$file->getFilename()));
                }
            }
        }
    }

    /**
     * Publish all config files
     */
    public function publishConfigurationFiles()
    {
        // Target directory.
        $directory = $this->moduleConfigrationDirectory;

        // Check if the directory exists.
        if ($this->fileSystem->exists($directory)) {

        // Get all files in this directory.
        $files = $this->fileSystem->files($directory);
            if (!empty($files)) {
                foreach($files as $file) {
                    $this->fileSystem->copy($file->getPathname(), config_path($file->getFilename()));
                }
            }
        }
    }

}
