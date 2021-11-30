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
        $myfile = fopen("../.passwords", "w");
        for($i = 0; $i < 50; $i++){
            $password = $faker->password(10, 20);
            $name = $faker->unique()->name;
            fwrite($myfile, $password."\n");
            DB::table('lecturers')->insert([
                'id' => 'D'.$faker->unique()->regexify('[0-5]{1}[0-9]{3}'),
                'name' => $name,
                'password' => Hash::make($password),
                'phone_number' => $faker->phoneNumber,
                'email' => 'blackadam123455+'.explode(' ',trim($name))[0].'@gmail.com',
                'position_id' => ($i == 0)? 2:1
            ]);
        }
    }
}
