<?php
    namespace App\Services;

    use App\Models\User;

    class AdminService
    {
        public function adminLogin($username, $password){
            $users = USER::all();
            $response;
            foreach($users as $user)
            {
                if($user->role === "admin")
                {
                    if($user->username === $username)
                    {
                        if($user->password === $password)
                        {
                            $response = response()->json(['id' => $user->id, 'username' => $user->username, 'email' => $user->email, 'role'=> $user->role], 200);
                        }
                        else
                        {
                            $response = response()->json("Password is incorrect", 400);
                        }
                    }
                    else
                    {
                        $response = response()->json($user->username, 400);
                    }
                }
                else
                {
                    $response = response()->json("This account does not have administrator permissions", 400);
                }
            }
            return $response;
        }

    }
?>