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
//         // User::factory(10)->create();

//         // User::factory()->create([
//         //     'name' => 'Test User',
//         //     'email' => 'test@example.com',
//         // ]);

//         $post = Post::with(
//             [
//                 'user'=> function ($query) {
//                     $query->where('is_active', false);
//                 }
//             ]
//         )
//         ->whereHas('user', function($query){
//             $query->where('is_active', false);
//         })
// ->where('id', 1)
// ->first();
        
// dd($post->toArray());


        // //joining
        // $post = Post::where('id',1)
        // ->join('users', 'posts.user_id', '=', 'users.id')
        // ->where('users.is_active', false)
        // ->first();
    }
}
