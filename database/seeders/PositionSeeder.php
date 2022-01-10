<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $ids = [
            1,
            2
        ];

        foreach($positions as $position){
            DB::table('positions')->insert([
                'position' => $position
            ]);
        }
        foreach($ids as $id){
            DB::table('positions')->insert([
                'id' => $id
            ]);
        }
    }
}
