<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $folder = 'Services';
        if (!is_dir(app_path($folder))) {                               //If folder doesn't exist, create new folder
            mkdir(app_path($folder));
        }

        $name = $this->argument('name');                                //Name of new file
        $path = app_path($folder . '/' . $name . '.php');               //Location of new file
        if (file_exists($path)) {
            $this->error('Service already exists!');                 //Error message if file already exists.
            return false;
        }

        //There are 2 option: 1 is using stub file, 2 is using variables to contain new file's content
        $stubPath = app_path('Console/Commands/Stubs/CoreService.stub');
        $stub = file_get_contents($stubPath);
        $stub = str_replace('{namespace}', $folder, $stub);
        $stub = str_replace('{name}', $name, $stub);

        // $repositoryName = $this->ask('What is the repository used for this service?');
        $repositoryName = str_replace('Service', '', $name) . 'RepositoryInterface';
        $useRepository = $repositoryName != "" ? "\nuse App\Interfaces\\Repository\\" . $repositoryName . ";" : '';
        $repository = $repositoryName != "" ? $repositoryName . " " : "";
        $stub = str_replace('{repository}', $repository, $stub);
        $stub = str_replace('{useRepository}', $useRepository, $stub);

        $abstractClassName = $this->ask('What is the abstract class used for this service?');
        $extends = $abstractClassName != "" ?  $abstractClassName : "BaseService";
        $stub = str_replace('{extends}', $extends, $stub);

        // $interfaceClassName = $this->ask('What is the interface used for this service?');
        $interfaceClassName = $name . 'Interface';
        $useImplement = $interfaceClassName != "" ? "\nuse App\\Interfaces\\Service" . "\\" . $interfaceClassName . ';' : "";
        $implements = $interfaceClassName != "" ? "implements " . $interfaceClassName : "";
        $stub = str_replace('{implements}', $implements, $stub);
        $stub = str_replace('{useImplement}', $useImplement, $stub);

        file_put_contents($path, $stub);                                //Put contents to the new file with 1st arg is file's path, 2nd arg is file's contents
        $this->info($name . ' is created successfully!');
    }
}
