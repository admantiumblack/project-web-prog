<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clusterList = [
            'Web Programming',
            'Artificial Intelligent',
            'Embedded System',
            'Cyber Security',
            'Database'
        ];
        foreach($clusterList as $cluster){
            DB::table('clusters')->insert([
                'cluster' => $cluster
            ]);
        }
    }
}
