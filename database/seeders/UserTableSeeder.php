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

        $user1 = new User();
        $user1->name = 'User Name';
        $user1->email = 'user@example.com';
        $user1->primary_color = "251 146 60";
        $user1->password = bcrypt('123');
        $user1->save();
        $user1->roles()->attach($role_user);

        $user2 = new User();
        $user2->name = 'Admin Name';
        $user2->email = 'admin@example.com';
        $user2->password = bcrypt('123');
        $user2->save();
        $user2->roles()->attach($role_admin);
    }
}
