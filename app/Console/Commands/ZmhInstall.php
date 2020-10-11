<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ZmhInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zmh:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install dummy data for Ecommerce Application';

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
         if($this->confirm('THis will delete All your corrent data and install the default dummy data.Are you sure?')){
            File::deleteDirectory(public_path('storage/products/dummy'));
            $this->call('storage:link');
            $copySuccess = File::copyDirectory(public_path('images/products'),public_path('storage/products/dummy'));
            if($copySuccess){
                $this->info('Images Successfully copied to storage folder');
            }

            $this->call('migrate:fresh',[
                '--seed' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'VoyagerDatabaseSeeder',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'VoyagerDummyDatabaseSeeder',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'DataTypesTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'DataRowsTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'MenusTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'MenuItemsTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'RolesTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'PermissionsTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'PermissionRoleTableSeeder',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'PermissionRoleTableSeederCustom',
                '--force' =>true,
            ]);

            Artisan::call('db:seed',[
                '--class' => 'UsersTableSeederCustom',
                '--force' =>true,
            ]);


            $this->info('Dummy Data Installed');
        }
    }
}
