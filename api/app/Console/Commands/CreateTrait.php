<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTrait extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $folder = 'Traits';
        if (!is_dir(app_path($folder))) {                               //If folder doesn't exist, create new folder
            mkdir(app_path($folder));
        }

        $name = $this->argument('name');                                //Name of new file
        $path = app_path($folder . '/' . $name . '.php');               //Location of new file
        if (file_exists($path)) {
            $this->error('This trait already exists!');                 //Error message if file already exists.
            return false;
        }

        //There are 2 option: 1 is using stub file, 2 is using variables to contain new file's content
        $stubPath = app_path('Console/Commands/Stubs/CoreTrait.stub');
        $stub = file_get_contents($stubPath);
        $stub = str_replace('{namespace}', $folder, $stub);
        $stub = str_replace('{name}', $name, $stub);

        file_put_contents($path, $stub);                                //Put contents to the new file with 1st arg is file's path, 2nd arg is file's contents
        $this->info($name . ' is created successfully!');
    }
}
