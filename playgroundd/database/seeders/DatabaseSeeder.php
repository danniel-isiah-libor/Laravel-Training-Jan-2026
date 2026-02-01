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

        // $this->call([
        //     PostSeeder::class,
        // ]);

        // updating
        // User::where('id', '=', 1)->update([
        //     'name' => 'Updated Name',
        // ]); // select * from users where id = 1

        // deleting
        // User::where('id', '=', 1)->delete();

        // retrieving
        // User::where('id', '=', 1)->first(); // select * from users where id = 1 LIMIT 1
        // $user = User::where('id', 1)->toSql(); // collection of multiple user model

        // and query in SQL
        // $user = User::where('id', 1)->Where('created_at', now())->toSql();

        // or query in SQL
        // $user = User::select('name as fullname')
        //     ->where('id', 1)
        //     ->orderBy('created_at', 'desc')
        //     ->take(5)
        //     ->get();

        $user = User::with(['posts'])->where('id', 5)
            ->first();

        // shortcut for getting an id or 1 user
        // $user = User::find(1);

        // shortcut for getting all
        // $user = User::all();

        // $array = ['honda', 'toyota', 'yamaha'];

        // $array = collect($array);

        // dd($user->toArray());
        // dd($array);

        // nested where clauses
        // $post = Post::with(
        //     [
        //         'user' => function ($query) {
        //             $query->where('is_active', false);
        //         }
        //     ]
        // )
        //     ->whereHas('user', function ($query) {
        //         $query->where('is_active', false);
        //     })
        //     ->where('id', 1)->first();

        $post = Post::where('id', 1)
            // ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('users', function ($join) {
                $join->on('posts.user_id', '=', 'users.id');
            })
            ->where('users.is_active', 'false')
            ->first();

        dd($post->toArray());
    }
}
