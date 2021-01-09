<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;
use Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        

        $user = new User();
        //$user->id();
        $user->name = "John Tavish";
        $user->postal_address = "Fake road, fake county";
        $user->phone_number = "1111111111";
        $user->email = "doctorsemail@email.com";
        $user->password = Hash::make('secret');
        $user->save();

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->start_date = "2008-09-23";
        $doctor->save();


        $user = new User();
        //$user->id();
        $user->name = "Stacey Blackburn";
        $user->postal_address = "Fake road2, fake county2";
        $user->phone_number = "2222222222";
        $user->email = "doctorsemail2@email.com";
        $user->password = Hash::make('secret');
        $user->save();

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->start_date = "2007-09-22";
        $doctor->save();
        
    }
}
