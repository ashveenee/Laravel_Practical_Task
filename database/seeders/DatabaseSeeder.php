<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('users')->insert([    

                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),

        ]);
        DB::table('users')->insert([    

                'name' => 'User',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),

        ]);
        DB::table('calculation')->insert([    

                'name' => 'Ashvini',
                'is_admin' => '0',
                'principal' => 10000,
                'rate' => 5,
                'time' => 5,
                'interest' => 2500,

        ]);
    }
}
