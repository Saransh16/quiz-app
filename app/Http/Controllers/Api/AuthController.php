<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $inputs = $request->validated();

        $user = User::create([
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'user_name' => $this->getUserName(),
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password'])            
        ]);

        return response()->success(['message' => 'User registered successfully.', 'user' => $user]);
    }

    private function getUserName()
    {
        while(true) {

            $random_num = rand(10000000, 99999999);

            if(! User::where('user_name' ,$random_num)->exists()) break;
        }
 
        return $random_num;
    }
}
