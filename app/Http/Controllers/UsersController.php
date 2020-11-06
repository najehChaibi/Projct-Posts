<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profil;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',user::all());
    }

    public function makeAdmin (User $user){
        $user-> role ="admin";
        $user->save();
        return redirect(route('users.index'));
    }

    public function profil(User $user){
        $profil = $user->profil;
        return view('users.profil', ['user'=> $user, 'profil' => $profil]);
    }


    public function update( User $user,  Request $request){
    //    dd($request->all());

    $profil= $user->profil;
    $data = $request->all();
    $user -> update($data);
    $profil -> update($data);
    return redirect(route('home'));
      


    }
}
