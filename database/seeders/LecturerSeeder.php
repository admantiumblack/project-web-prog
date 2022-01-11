<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->seed(666);
        // $myfile = fopen("../.passwords", "w");
        for($i = 0; $i < 60; $i++){
            $password = 'password';
            $name = $faker->unique()->name;
            $lecturerId = 'D'.$faker->unique()->regexify('[0-5]{1}[0-9]{3}');
            $email = 'blackadam123455+'.$lecturerId.'_'.explode(' ',trim($name))[0].'@gmail.com';
            $position = DB::table('positions')->where('position', $i == 0? 'Dean':'Lecturer')->first()->id;
            // fwrite($myfile, $position.'_'.$lecturerId.'_'.$email.'_'.$password."\n");
            DB::table('lecturers')->insert([
                'id' => $lecturerId,
                'name' => $name,
                'password' => Hash::make($password),
                'phone_number' => $faker->phoneNumber,
                'email' => $email,
                'position_id' => $position
            ]);
        }
    }
}
