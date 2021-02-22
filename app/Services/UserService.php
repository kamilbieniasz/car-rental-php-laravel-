<?php

namespace App\Services;

use App\Models\User;

class UserService{
    public function login($username, $password)
    {
        $users = User::all();
        $response;
        foreach($users as $user)
        {
            if($user->username === $username)
            {
                if($user->password === $password)
                {
                    $currentUser = $user;
                    $response = response()->json(['username' => $user->username, 'email' => $user->email, 'role'=> $user->role], 200);
                }
                else
                {
                    $response = response()->json('Incorrect login or password',400);
                }
            }
        }
        return $response;
    }

    public function register($email, $username, $password)
    {
        $users = User::all();
        $usernameIsFree = false;
        foreach($users as $user)
        {
            if($user->username === $username)
            {
                return response()->json('Username already exists', 400);
            }
            elseif(strlen($password) < 8)
            {
                return response()->json('Password is to short', 400);
            }
            else
            {
                $usernameIsFree = true;
            }
        }
        if($usernameIsFree === true)
        {
            $inputs = ['email'=>$email, 'username'=>$username, 'password'=>$password, 'role'=>'user'];
            User::create($inputs);
            return response()->json('User added', 200);
        }
    }
}
?>