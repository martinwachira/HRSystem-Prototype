<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');
//       DB::table('users')->delete();

        $userRole = Roles::where('role_name', 'User')->first();
        $adminRole = Roles::where('role_name', 'Admin')->first();
        $superRole = Roles::where('role_name', 'Super Admin')->first();

        $super = User::create([
            'first_name' => 'martin',
            'last_name' => 'Wachira',
            'email' => 'mart@gmail.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'm',
            'birth_date' => '1999-04-01',
        ]);

        $admin = User::create([
            'first_name' => 'Linnet',
            'last_name' => 'Maina',
            'email' => 'lin@lin.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'f',
            'birth_date' => '1994-04-11',
        ]);

        $user1 = User::create([
            'first_name' => 'Mr',
            'last_name' => 'James',
            'email' => 'james@james.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'm',
            'birth_date' => '2000-03-09',
        ]);
        $user2 = User::create([
            'first_name' => 'Sir',
            'last_name' => 'Alex',
            'email' => 'sir@alex.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'm',
            'birth_date' => '1979-06-01',
        ]);
        $user3 = User::create([
            'first_name' => 'Diana',
            'last_name' => 'Dee',
            'email' => 'dee@dee.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'f',
            'birth_date' => '1989-04-01',
        ]);
        $user4 = User::create([
            'first_name' => 'Kel',
            'last_name' => 'Mains',
            'email' => 'kel@kel.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'm',
            'birth_date' => '2009-06-10',
        ]);

        $user5 = User::create([
            'first_name' => 'Ariana',
            'last_name' => 'Grande',
            'email' => 'ariana@ariana.com',
            'password' => bcrypt('1234567'),
            'role' => '0',
            'gender' => 'f',
            'birth_date' => '2003-10-10',
        ]);

        $user = User::create([
        'first_name' => 'Dave',
        'last_name' => 'Mukungi',
        'email' => 'dave@dave.com',
        'password' => bcrypt('1234567'),
        'role' => '0',
        'gender' => 'm',
        'birth_date' => '1993-05-07',
    ]);


        $user->roles()->attach($userRole);
        $user1->roles()->attach($userRole);
        $user2->roles()->attach($userRole);
        $user3->roles()->attach($userRole);
        $user4->roles()->attach($userRole);
        $user5->roles()->attach($userRole);
        $admin->roles()->attach($adminRole);
        $super->roles()->attach($superRole);

    }
}
