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
        // $this->call([
        //     PostSeeder::class,
        // ]);

        // updating...
        // User::where('id', '=', 1)->update([
        //     'name' => 'Updated Name',
        // ]);
        // select * from users where id = 1

        // deleting...
        // User::where('id', '=', 1)->delete();

        // retrieving...
        // $user = User::with(['posts'])->where('id', 2)
        //     ->first();

        // dd($user->toArray());

        $post = Post::where('id', 1)
            // ->join('users', 'posts.user_id', '=', 'users.id')
            // ->join('users', function ($join) {
            //     $join->on('posts.user_id', '=', 'users.id')->where(....);
            // })
            ->where('users.is_active', false)
            ->first();

        dd($post->toArray());

        // select name as fullname from users where id = 1 or created_at = NOW() order by created_at asc LIMIT 5
    }
}
