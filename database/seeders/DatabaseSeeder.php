<?php

namespace Database\Seeders;

use App\Models\Article;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();
        Article::factory(20)->create();

        $users = User::all();

        Article::all()->each(function($article) use ($users) {
            $article->users()->attach($users->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
