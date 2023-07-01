<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        // Cek apakah email sudah terdaftar
        $existingUser = User::where('email', $user->email)->first();
        $email = $user->email;

        if ($existingUser) {
            // User sudah terdaftar, langsung login dan redirect ke halaman dashboard
            auth()->login($existingUser);
            dd($user);
            return redirect('/dashboard');
        } else {
            // User belum terdaftar, redirect ke halaman register dengan data dari Google
            return view('auth.register', compact('email'));
        }
    }
    //register
    public function register(Request $request)
    {
        User::create([
            'nama' => $request->fullname,
            'email' => $request->email,
            'no_telp' => $request->phone_number,
            'institusi' => $request->institution,
            'negara' => $request->country,
            'jenis_kelamin' => $request->gender,
            'id_role_user' => $request->category,


        ]);

        // Redirect ke halaman dashboard
        return redirect('/dashboard');
    }
}