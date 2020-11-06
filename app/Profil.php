<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profil extends Model
{
    protected $fillable = [
       'user_id' , 'about', 'facebook', 'tiwtter', 'picture'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
