<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewSubjectLecturerSeeder extends Seeder
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
        $myfile = fopen("../new_lecturer.csv", "w");
        fwrite($myfile, '"lecturer_id","subject_id"'."\n");
        foreach($subjects as $subject){
            $faker = Faker::create('id_ID');
            $n = $faker->numberBetween(5, 15);
            for($i = 0; $i < $n; $i++){
                $lecturer_id = $faker->unique()
                ->randomElement($lecturers)->id;
                fwrite($myfile, '"'.$lecturer_id.'",'.'"'.$subject->id.'"'."\n");
            }
        }
        fclose($myfile);
    }
}
