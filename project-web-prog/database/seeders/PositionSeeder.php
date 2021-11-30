<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            'Lecturer',
            'Dean'
        ];
        foreach($positions as $position){
            DB::table('positions')->insert([
                'position' => $position
            ]);
        }
    }
}
