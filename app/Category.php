<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post ;

class Category extends Model
{
    protected $fillable = ['name'];

    public function Posts(){
        return $this->hasMany(Post:: class);
    }
    
}
