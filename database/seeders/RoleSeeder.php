<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'doctor';
        $role_admin->description = 'A doctor user';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'patient';
        $role_admin->description = 'A hospital patient';
        $role_admin->save();
    }
}
