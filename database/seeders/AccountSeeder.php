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
            'type'=> "Admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'rojhon',
            'last_name'=>'rojhon',
            'username'=>'rojhon',
            'email'=>'rojhon@gmail.com',
            'password'=>Hash::make('rojhon'),
            'type'=> "Admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'von',
            'last_name'=>'von',
            'username'=>'von',
            'email'=>'von@gmail.com',
            'password'=>Hash::make('von'),
            'type'=> "Admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'salen',
            'last_name'=>'salen',
            'username'=>'salen',
            'email'=>'salen@gmail.com',
            'password'=>Hash::make('salen'),
            'type'=> "Admin",
        ]);

        DB::table('accounts')->insert([
            'first_name'=>'Encoder',
            'last_name'=>'Encoder',
            'username'=>'Encoder',
            'email'=>'encoder@gmail.com',
            'password'=>Hash::make('encoder'),
            'type'=> "Encoder",
        ]);
    }
}
