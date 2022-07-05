<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        
        
        $user_data = [
            'role_id' => intval($request['role_id']),
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


        /*
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'cin' => $request->cin,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return [
            'token' => $user->createToken('API Token')->plainTextToken
        ]; */
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