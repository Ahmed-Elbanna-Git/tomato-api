<?php

namespace TomatoPHP\TomatoApi\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class TomatoApiInstall extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato-api:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install package and publish assets';

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
        $this->info('Publish Vendor Assets');
        $this->call('vendor:publish', ['--provider' => 'TomatoPHP\TomatoApi\TomatoApiServiceProvider']);
        $this->artisanCommand(["optimize:clear"]);
        $this->info('Tomato Api installed successfully.');
    }
}
