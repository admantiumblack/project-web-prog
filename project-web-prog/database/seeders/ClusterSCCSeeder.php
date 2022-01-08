<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClusterSCCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $clusters = DB::table('clusters')->select('id')->get();
        $lecturers = DB::table('lecturers')->where('positon_id', '1')->select('id')->get();
        $nClusters = count($clusters);
        for($i = 0; $i < $nClusters; $i++){
            $cluster = $faker->unique()
            ->randomElement($clusters)->id;
            $lecturer = $faker->unique()
            ->randomElement($lecturers)->id;
            DB::table('cluster_sccs')->insert([
                'id' => $cluster.$lecturer,
                'cluster_id' => $cluster,
                'lecturer_id' => $lecturer,
                'date_appointed' => date("Y-m-d")
            ]);
        }
        // echo $clusters;
        // echo $lecturers;
    }
}
