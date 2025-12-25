<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed in correct order due to foreign key dependencies
        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            AcademicInfoSeeder::class,
            LostFoundSeeder::class,
            OrganizationSeeder::class,
            NewsSeeder::class,
            ForumSeeder::class,
        ]);
    }
}
