<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin  = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $saler = new User();
        $saler->name = 'User Name';
        $saler->email = 'user@example.com';
        $saler->password = bcrypt('123');
        $saler->save();
        $saler->roles()->attach($role_user);

        $manager = new User();
        $manager->name = 'Admin Name';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('123');
        $manager->save();
        $manager->roles()->attach($role_admin);
    }
}
