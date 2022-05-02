<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function register(Request $request)
    {
        /*$attr = $request->validate([
            'name' => ['required|string'],
            'email' => ['required|string|email|unique:users,email'],
            'password' => ['required|string|min:6|confirmed'],
        ]);*/
     //   return $request;

        $user_data = [
            
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'lastname' => $request['lastname'],
            'cin' => $request['cin'],
        ];
      //  return $user_data;
        $user = User::create($user_data);

        return [
            'token' => $user->createToken('API Token')->plainTextToken
        ];
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json(['message'=>'Credentials not match'], 401);
        }

        return [
            'token' => auth()->user()->createToken('API Token')->plainTextToken , 'user'=>auth()->user()
        ];
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}