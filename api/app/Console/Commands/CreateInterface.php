<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateInterface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new interface';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!is_dir(app_path('Interfaces'))) {                          //If folder doesn't exist, create new folder
            mkdir(app_path('Interfaces'));
        }
        $name = $this->argument('name');                                //Name of new file
        $isServiceInterface = str_contains($name, 'ServiceInterface');
        $folder = $isServiceInterface ? 'Interfaces/Service' : 'Interfaces/Repository';
        $filePath = $isServiceInterface ? 'CoreServiceInterface' : 'CoreRepositoryInterface';
        if (!is_dir(app_path($folder))) {                               //If folder doesn't exist, create new folder
            mkdir(app_path($folder));
        }

        $path = app_path($folder . '/' . $name . '.php');               //Location of new file
        if (file_exists($path)) {
            $this->error('Interface already exists!');                 //Error message if file already exists.
            return false;
        }

        //There are 2 option: 1 is using stub file, 2 is using variables to contain new file's content
        $stubPath = app_path('Console/Commands/Stubs/' . $filePath . '.stub');
        $stub = file_get_contents($stubPath);
        $stub = str_replace('{name}', $name, $stub);

        file_put_contents($path, $stub);                                //Put contents to the new file with 1st arg is file's path, 2nd arg is file's contents
        $this->info($name . ' is created successfully!');
    }
}
