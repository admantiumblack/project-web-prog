<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
            $subjects = DB::table('subjects')->get();
            foreach($subjects as $subject){
                DB::table('forms')->insert([
                    'subject_id' => $subject->id,
                    'period' => '221',
                    'deadline' =>$faker->
                            dateTimeBetween('-3 day', '+1 week')
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
