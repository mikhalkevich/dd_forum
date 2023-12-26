<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getTest(Request $request){
        $user = User::where('email', 'kexicon@gmail.com')->first();
        $token = $user->createToken($request->ip() . ':' . $request->userAgent())->plainTextToken;
        Auth::login($user);
        return response(
            view('welcome', [
                'json' => json_encode([
                    'token' => $token,
                    'user' => $user,
                    'provider' => 'test',
                ]),
            ])
        )->cookie('token', $token, 60 * 24 * 365, '/', '', true, false);
    }
}
