<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
// use Log;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 2[1-2]{1}1
        $faker = Faker::create('id_ID');
        if(empty(DB::table('forms')->count())){
            $path = 'form_results';
            $template = 'template.csv';
            error_log($template);
            $dirs = Storage::disk('google')->directories();
            if(count($dirs) < 1){
                Storage::disk('google')->makeDirectory($path);
                $dirs = Storage::disk('google')->directories();
            }
            $subjects = DB::table('subjects')->get();
            foreach($subjects as $subject){
                $filename = Str::uuid().'.csv';
                $filepath = $dirs[0].'/'.$filename;
                Storage::disk('google')->put($filepath, Storage::get($template));
                $fileMetadata = collect(Storage::cloud()->listContents($dirs[0], false))
                ->where('type', '=', 'file')
                ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
                ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
                ->first();
                $datetime = $faker->dateTimeBetween('-3 day', '+1 week');
                DB::table('forms')->insert([
                    'id' => '221'.$subject->id,
                    'subject_id' => $subject->id,
                    'period' => '221',
                    'deadline' => $datetime->format('Y-m-d').' 23:59:59',
                    'result_path' => $fileMetadata['path']
                ]);
            }
        }
        else{
            $forms = DB::table('forms')->select(['subject_id', 'period'])
                    ->get();
            foreach($forms as $form){
                DB::table('forms')->where('subject_id', $form->subject_id)
                    ->where('period', $form->period)->update([
                        'deadline' =>$faker->
                            dateTimeBetween('-3 day', '+1 week')
                    ]);
            }
        }
    }
}
