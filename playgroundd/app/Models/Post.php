<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;


    // one is to one
    public function user()
    {
        return $this->belongsTo(User::class);

        // return $this->belongsToMany(User::class);
    }
}
