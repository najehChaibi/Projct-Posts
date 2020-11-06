<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;

class dashboardController extends Controller
{
    public function index(){
        return view('dashboard.index',[ 
        'posts_count'=>Post::all()->count(),
        'users_count'=> User::all()->count(),
        'categories_count'=> Category::all()->count(),

        ]);
    }
}
