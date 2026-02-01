<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /* $user = User::with(['posts'])->where('id', 1)->get(); */
        /* dd($user->toArray()); */

        $post = Post::with(['user'])->where('id', 3)->get();
        dd($post->toArray());

        $this->call(PostSeeder::class);
    }
}
