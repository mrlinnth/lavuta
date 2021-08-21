<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Str;

class ModuleRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module-repository 
    {module : The name of the module} 
    {repository : The name of the repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run l5-repository make:entity command for a module.';

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
        $module = $this->argument('module');
        $repository = $this->argument('repository');

        config(['repository.generator.basePath' => module_path($module)]);
        config(['repository.generator.rootNamespace' => config('modules.namespace').'\\'.$module.'\\']);
        config(['repository.generator.stubsOverridePath' => module_path($module)]);

        $this->call('make:presenter', [
            'name' => $repository
        ]);

        $this->call('make:validator', [
            'name' => $repository
        ]);

        $controller_command = ((float) app()->version() >= 5.5 ? 'make:rest-controller' : 'make:resource');
        $this->call($controller_command, [
            'name' => $repository
        ]);
        $this->fix();

        $this->call('make:repository', [
            'name' => $repository,
            '--skip-migration' => true
        ]);

        config(['repository.generator.basePath' => app()->path()]);
        config(['repository.generator.stubsOverridePath' => app()->path()]);

        $this->call('make:bindings', [
            'name' => $repository
        ]);

        $this->info("{$repository} created in {$module}");
    }

    private function fix(): void
    {
        $module = $this->argument('module');
        $repository = $this->argument('repository');

        $files =[
            'Http/Requests/'.$repository.'CreateRequest.php',
            'Http/Requests/'.$repository.'UpdateRequest.php',
            'Http/Controllers/'.Str::plural($repository).'Controller.php',
        ];
        foreach ($files as $file) {
            $is_request = false;
            if(\File::exists(app_path($file))) {
                $is_request = true;
                \File::move(app_path($file), module_path($module).'/'.$file);
            }
            $this->update_namespace($module, $file, $is_request);
        }
    }

    /**
     * @param $module
     * @param  string  $filePath
     * @param boolean $is_request
     */
    private function update_namespace($module, string $filePath, $is_request): void
    {
        $fileContent = file_get_contents(module_path($module).'/'.$filePath);
        $fileContent = str_replace('App\\', config('modules.namespace').'\\'.$module.'\\', $fileContent);
        if(!$is_request) $fileContent = str_replace(config('modules.namespace').'\\'.$module.'\Http\Requests;',
            'Illuminate\Routing\Controller;', $fileContent);
        file_put_contents(module_path($module).'/'.$filePath, $fileContent);
    }
}

