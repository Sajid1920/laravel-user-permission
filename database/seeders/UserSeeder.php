<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
        	[
        		'role_id' => 1,
        		'name' => 'Sajid',
        		'email' => 'admin@admin.com',
        		'password' => \Hash::make(123),
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
        ]);
    }
}
