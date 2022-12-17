<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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

        $token = $user->createToken('personal_access_token')->plainTextToken;

        return response()->success(['user' => $user, 'access_token' => $token]);
    }

    public function login(LoginRequest $request)
    {
        $inputs = $request->validated();

        $field = filter_var($inputs['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        $user = User::where($field, $inputs['login'])->first();
 
        if (! $user || ! Hash::check($inputs['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('personal_access_token')->plainTextToken;

        return response()->success(['user' => $user, 'access_token' => $token]);
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
