<?php
namespace Database\Seeders;

use App\Models\Post;
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
        $this->call([
            PostSeeder::class,
        ]);

        // $user = User::where('id', '=', 1)->first();
        // $user = User::find(1);

        // dd($user->name);

        // $user = User::where('id', 1)->orWhere('created_at', now())->toSql();

        // $array = ['honda', 'toyota', 'ford'];
        // dd($array)->where();

        // $user = User::with('posts')->where('id', 2)
        //     ->get();

        // dd($user);

        // $post = Post::with(['user' =>
        //     function ($query) {
        //         $query->where('is_active', false);
        //     },
        // ])
        //     ->whereHas('user',
        //         function ($query) {
        //             $query->where('is_active', false);
        //         }
        //     )->where('id', 1)
        //     ->first();

        $post = Post::where('id', 1)
        // ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('users', function ($join) {
                $join->on('posts.user_id', "=", 'users_id'); 
            })
            ->where('users.is_active', false)
            ->first();

        dd($post->toArray());
    }
}
