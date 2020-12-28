<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::where('name', 'admin')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();

        $admin = new User();
        $admin->name = 'Liam Conroy';
        $admin->email = 'admin@medicalcentre.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Ronan Conroy';
        $user->email = 'doctor@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $user = new User();
        $user->name = 'Reese Conroy';
        $user->email = 'patient@medicalcentre.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);
    }
}
