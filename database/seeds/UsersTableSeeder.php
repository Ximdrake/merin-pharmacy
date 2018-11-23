<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
                'firstname'=> 'Ximdrake',
                'lastname'=> 'Asidor',
                'password' => bcrypt('123456'),
                'email' => 'admin@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            )
        );

        DB::table('users')->insert($data);
    }
}
