<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\User;
use Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Tom Bedgar";
        $user->postal_address = "Fake road, fake county";
        $user->phone_number = "1112111111";
        $user->email = "tomemail@email.com";
        $user->password = Hash::make('secret');
        $user->save(); 

        $patient = new Patient();
        $patient->health_insurance = "1";
        $patient->company_name = "HealthInsurance Inc";
        $patient->policy_num = "123131321321";
        $patient->user_id = $user->id; 
        $patient->save(); 


        $user = new User();
        $user->name = "Ben Conway";
        $user->postal_address = "Fake road, fake county";
        $user->phone_number = "1112111111";
        $user->email = "tomemail@email.com";
        $user->password = Hash::make('secret');
        $user->save(); 

        $patient = new Patient(); 
        $patient->health_insurance = "1";
        $patient->company_name = "HealthInsurance Inc";
        $patient->policy_num = "123131321321";
        $patient->user_id = $user->id; 
        $patient->save(); 
    }
}
