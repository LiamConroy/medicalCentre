<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $doctor = new Doctor();
        $doctor->name = "John Tavish";
        $doctor->postal_address = "Fake road, fake county";
        $doctor->phone_number = "1111111111";
        $doctor->email = "doctorsemail@email.com";
        $doctor->start_date = "2008-09-23";
        
        $doctor->save();

        $doctor = new Doctor();
        $doctor->name = "Stacey Blackburn";
        $doctor->postal_address = "Fake road2, fake county2";
        $doctor->phone_number = "2222222222";
        $doctor->email = "doctorsemail2@email.com";
        $doctor->start_date = "2007-09-22";
        $doctor->save();
    }
}
