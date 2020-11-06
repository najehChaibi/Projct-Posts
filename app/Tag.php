<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Post;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function Posts(){
        return $this->belongsToMany(Post::class);
    }
}
