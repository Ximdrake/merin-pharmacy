<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'fname' => 'Marc Brianne',
                'mname' => 'Ong',
                'lname' => 'Silvano',
                'birthdate' => Carbon::parse('1991-1-12'),
                'age' => 27,
                'contact' => '0926-612-1542',
                'program_id' => 1,
                'school_id' => 4,
                'benefactor_id' => 4,
                'address' => 'Unit 209, Bldg MB27, Pamayanang Diego Silang, Ususan, Taguig City',
                'email' => 'marcbriannesilvano@gmail.com',
                'referral_id' => 1,
                'date_of_signup' => Carbon::parse('2018-7-6'),
                'gender' => 'Male',
                'branch_id' => 1,
                'course' => 'BS Nursing',
                'departure_year_id' => 1,
                'departure_month_id' => 2,
                'status' => 'Active',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'fname' => 'Donnah',
                'mname' => 'Lopez',
                'lname' => 'Poquita',
                'birthdate' => Carbon::parse('1989-1-17'),
                'age' => 29,
                'contact' => '0943-241-7006',
                'program_id' => 2,
                'school_id' => 1,
                'benefactor_id' => 6,
                'address' => '2835 Iglesia Street daet, Camarines Norte',
                'email' => 'marcbriannesilvano@gmail.com',
                'referral_id' => 1,
                'date_of_signup' => Carbon::parse('2018-8-4'),
                'gender' => 'Female',
                'branch_id' => 3,
                'course' => 'BS Nursing',
                'departure_year_id' => 1,
                'departure_month_id' => 2,
                'status' => 'Active',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'fname' => 'Ma. Jessica Nicole',
                'mname' => 'Juanilo',
                'lname' => 'Escobar',
                'birthdate' => Carbon::parse('1991-9-6'),
                'age' => 26,
                'contact' => '0927-025-2053',
                'program_id' => 2,
                'school_id' => 1,
                'benefactor_id' => 8,
                'address' => 'Lot 18, Blk 1, Phasse 1, Agau East Koronadal City, Cotabato',
                'email' => 'nic_jessa@ymail.com',
                'referral_id' => 1,
                'date_of_signup' => Carbon::parse('2018-9-15'),
                'gender' => 'Female',
                'branch_id' => 4,
                'course' => 'BS Nursing',
                'departure_year_id' => 1,
                'departure_month_id' => 2,
                'status' => 'Active',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            )
        );

        DB::table('students')->insert($data);
    }
}
