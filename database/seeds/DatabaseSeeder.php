<?php

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
//        DB::table('users')->delete();
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
