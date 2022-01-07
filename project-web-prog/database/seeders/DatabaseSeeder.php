<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ClusterSeeder::class,
            PositionSeeder::class,
            LecturerSeeder::class,
            ClusterSCCSeeder::class,
            SubjectSeeder::class,
            SubjectLecturerSeeder::class,
            FormSeeder::class
        ]);
    }
}
