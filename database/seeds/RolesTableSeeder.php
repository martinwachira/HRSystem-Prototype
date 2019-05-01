<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();

        Roles::create(['role_name' => 'User']);
        Roles::create(['role_name' => 'Admin']);
        Roles::create(['role_name' => 'Super Admin']);
    }
}
