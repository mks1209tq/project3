<?php

namespace Database\Seeders;

use App\Models\Post;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'a@a.com',
            'password' => '$2y$12$kt6DH3V.hOsZxbIJLNZFEOIaUPB4dSyJL1hepO8GSmE1UgMXvtp3q',
        ]);

        $this->call([
            // EmployeeSeeder::class,
            // PositionSeeder::class,
            // OrgSeeder::class,
            // DocumentSeeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,

        ]);
    }
}
