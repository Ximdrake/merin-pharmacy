<?php

use Illuminate\Database\Seeder;
use App\Patient;
class patient_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       {$data = [
            [
            'doc_id' => 'Dr. Ximdrake Asidor',
            'firstname'=>'John',
            'middlename' => 'Mao',
            'lastname' => 'Doe',
            'birthdate' =>'12/08/1996',
            'gender' =>'Male',
            'contact_number' =>'09477599352',
            'address' => 'BO Obrero',
            'status' => 'On Maintenance',
            ],
            [
            'doc_id' => 'Dr. Medrell Asidor',
            'firstname'=>'Marie',
            'middlename' => 'Ni',
            'lastname' => 'Suarez',
            'birthdate' =>'03/06/1896',
            'gender' =>'Female',
            'contact_number' =>'09477599352',
            'address' => 'BO Obrero',
            'status' => 'On Maintenance',
            ],
        ];
            foreach($data as $datum){
            Patient::create($datum);
        }
    }
}
}
