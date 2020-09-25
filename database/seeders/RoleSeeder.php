<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
        	[
        		'name' => 'Admin',
        		'slug' => 'admin',
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
        	[
        		'name' => 'User',
        		'slug' => 'user',
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
            [
                'name' => 'Manager',
                'slug' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
