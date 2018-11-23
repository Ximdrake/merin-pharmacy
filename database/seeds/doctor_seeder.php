<?php

use Illuminate\Database\Seeder;
use App\Doctor;
class doctor_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'firstname'=>'Ximdrake',
            'middlename' => 'Cafe',
            'lastname' => 'Asidor',
            'clinic_location' =>'Davao Doc',
            'license_number' =>'0987654321',
            'contact_number' =>'639477599352',
            'email' => 'asidorx@gmail.com',
            'specialty' => 'sample specialty',
            ],
            [
            'firstname'=>'Medrell',
            'middlename' => 'Cafe',
            'lastname' => 'Asidor',
            'clinic_location' =>'Davao Doc',
            'license_number' =>'0987654321',
            'contact_number' =>'639477599352',
            'email' => 'asidorx@gmail.com',
            'specialty' => 'mao ni',
            ],
        ];
            foreach($data as $datum){
            Doctor::create($datum);
        }
    }
}
