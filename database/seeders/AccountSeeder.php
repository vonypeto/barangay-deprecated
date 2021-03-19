<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'first_name'=>'giann',
            'last_name'=>'giann',
            'username'=>'giann',
            'email'=>'giann@gmail.com',
            'password'=>Hash::make('giann'),
            'type'=> "admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'rojhon',
            'last_name'=>'rojhon',
            'username'=>'rojhon',
            'email'=>'rojhon@gmail.com',
            'password'=>Hash::make('rojhon'),
            'type'=> "admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'von',
            'last_name'=>'von',
            'username'=>'von',
            'email'=>'von@gmail.com',
            'password'=>Hash::make('von'),
            'type'=> "admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'salen',
            'last_name'=>'salen',
            'username'=>'salen',
            'email'=>'salen@gmail.com',
            'password'=>Hash::make('salen'),
            'type'=> "admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'client',
            'last_name'=>'client',
            'username'=>'client',
            'email'=>'client@gmail.com',
            'password'=>Hash::make('client'),
            'type'=> "client",
        ]);
    }
}
