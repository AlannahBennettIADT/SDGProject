<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role_admin = new Role();
        $role_admin->name ='admin';
        $role_admin->description = 'An Administrator User';
        $role_admin -> save();


        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();

        $role_student = new Role();
        $role_student -> name = 'student';
        $role_student->description = 'A Student user';
        $role_student->save();

        $role_working = new Role();
        $role_working -> name = 'working';
        $role_working->description = 'A working user';
        $role_working->save();


        $role_employer = new Role();
        $role_employer -> name = 'employer';
        $role_employer->description = 'A employer user';
        $role_employer->save();


        
    }
}
