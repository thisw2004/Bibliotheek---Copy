<?php

namespace App\Models;
//gebruik model user
use App\Models\User;


class UserDAO{

    //function for select all users
    public function GetAllUsers(){
        //select all users using Eloquent
        return User::all();
    }

    //function for select user by id
    public function GetUserById($id){
        //find user on id using Eloquent
        return User::find($id);
    }
    
}

?>