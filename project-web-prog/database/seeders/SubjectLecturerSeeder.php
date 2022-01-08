<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubjectLecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = DB::table('subjects')
                ->select(['id'])->get();
        $lecturers = DB::table('lecturers')->select('id')->get();
        foreach($subjects as $subject){
            $faker = Faker::create('id_ID');
            $n = $faker->numberBetween(5, 15);
            for($i = 0; $i < $n; $i++){
                $lecturer_id = $faker->unique()
                ->randomElement($lecturers)->id;
                $period = $faker->regexify('22[1-2]{1}');
                DB::table('subject_lecturers')->insert([
                    'id'=> $subject->id.$period.$lecturer_id,
                    'subject_id' => $subject->id,
                    'lecturer_id' => $lecturer_id,
                    'period' => $period
                ]);
            }
        }
    }
}
