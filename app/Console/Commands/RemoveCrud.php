<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:remove {component}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $model_name = \Str::camel($this->argument('component'));
        \Artisan::call("livewire:delete pages.{$this->argument('component')}.create --force ");
        $this->info("Component {$this->argument('component')} create successfully deleted!");

        \Artisan::call("livewire:delete pages.{$this->argument('component')}.edit --force");
        $this->info("Component {$this->argument('component')} edit successfully deleted!");

        \Artisan::call("livewire:delete pages.{$this->argument('component')}.index --force");
        $this->info("Component {$this->argument('component')} index successfully deleted!");

        \Artisan::call("livewire:delete pages.{$this->argument('component')}.show --force");
        $this->info("Component {$this->argument('component')} show successfully deleted!");


        \Artisan::call("make:model {$model_name} -mrsf");
        $this->info("{$model_name} migrations, controller, factory, request successfully created! 😍");

        $this->info("Happy Ngoding Bro! 😍");
    }
}
