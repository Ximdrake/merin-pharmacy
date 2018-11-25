<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(doctor_seeder::class);
        $this->call(patient_seeder::class);    
        $this->call(prescription_seeder::class);     
        $this->call(UsersTableSeeder::class);
       
    }
}
