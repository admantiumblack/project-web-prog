<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class SubjectSeeder extends Seeder
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
        foreach($clusters as $cluster){
            $nSubject = $faker->numberBetween(10, 15);
            for($i = 0; $i < $nSubject; $i++){
                DB::table('subjects')->insert([
                    'id' => $faker->unique()
                            ->regexify('[A-Z]{2}[0-9]{3}'),
                    'cluster_id' => $cluster->id,
                    'subject' => $faker->unique()->sentence(3)
                ]);
            }
        }
    }
}
