<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $lecturerSubjects = DB::table('subject_lecturers')->get();
        for($i = 0; $i < 10; $i++){
            $choice = $faker->unique()->randomElement($lecturerSubjects);
            DB::table('complaints')->insert([
                'subject_id' => $choice->subject_id,
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'content' => $faker->text($maxNbChars = 200)
            ]);
        }
    }
}
