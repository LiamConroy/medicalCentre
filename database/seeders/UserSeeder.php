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
        $admin->email = 'admin1@medicalcentre.ie';
        $admin->postal_address = 'fake address';
        $admin->phone_number = '12313131321';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $admin = new User();
        $admin->name = 'Samuel Hayden';
        $admin->email = 'admin2@medicalcentre.ie';
        $admin->postal_address = "fake address";
        $admin->phone_number = '12313131321';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Ronan Conroy';
        $user->email = 'doctor1@medicalcentre.ie';
        $user->postal_address = 'fake address';
        $user->phone_number = '12313131321';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $user = new User();
        $user->name = 'Joe Molloy';
        $user->email = 'doctor2@medicalcentre.ie';
        $user->postal_address = "fake address";
        $user->phone_number = '12313131321';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $user = new User();
        $user->name = 'Joe Jeffies';
        $user->email = 'patient1@medicalcentre.ie';
        $user->postal_address = "fake address";
        $user->phone_number = "12313131321";
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $user = new User();
        $user->name = 'Jim Peanuts';
        $user->email = 'patient2@medicalcentre.ie';
        $user->postal_address = "fake address";
        $user->phone_number = "12313131321";
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);
    }
}
