<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Install this first
        // composer dump-autoload

        // Then run in command line the code below:
        // php artisan DB:seed

       $this->call([
        AccountSeeder::class,
     ]);


    }
}
