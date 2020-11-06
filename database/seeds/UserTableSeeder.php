<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User= DB::table('users')->where('email', 'najeh@gmail.com')->first();
        if(! $user){
            User::create([
                'name' => 'najeh',
                'email' => 'najeh@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin'
            ]);
        }
       
    }
}
