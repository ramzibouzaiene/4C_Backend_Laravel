<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use DB;
use Mail;

class ForgotPasswordController extends Controller
{
    public function forget(Request $request) {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $email = $request->email;

        if(User::where('email', $email)->doesntExist()){
            return response(['message' => 'Email n existe pas'],400);
        }
        $token = Str::random(10);
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()->addHours(6)
        ]);

        Mail::send('Email.forgetpass', ['token' => $token], function($message) use($email){
            $message->to($email);
            $message->subject('Réinitialiser le mot de passe');
        });

        return response(['message' => 'Vérifier votre e-mail'],200);
    }
}
