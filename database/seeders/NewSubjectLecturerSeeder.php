<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

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
        $file = 'new_lecturer.csv';
        $fileMetadata = collect(Storage::cloud()->listContents('\\', false))
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($file, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($file, PATHINFO_EXTENSION))
        ->first();
        if($fileMetadata == null){
            Storage::disk('google')->put($file, '"lecturer_id","subject_id"'."\n");
            $fileMetadata = collect(Storage::cloud()->listContents('\\', false))
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($file, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($file, PATHINFO_EXTENSION))
            ->first();
        }
        else{
            $fileMetadata = collect(Storage::cloud()->listContents('/', false))
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($file, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($file, PATHINFO_EXTENSION))
            ->first();
            // error_log(implode('_', array_keys($fileMetadata)));
            $file = $fileMetadata['basename'];
            Storage::disk('google')->put($file, '"lecturer_id","subject_id"'."\n");
        }
        foreach($subjects as $subject){
            $faker = Faker::create('id_ID');
            $n = $faker->numberBetween(2, 4);
            for($i = 0; $i < $n; $i++){
                $lecturer_id = $faker->unique()
                ->randomElement($lecturers)->id;
                Storage::disk('google')->append($file, '"'.$lecturer_id.'",'.'"'.$subject->id.'"'."\n");
            }
        }
    }
}
