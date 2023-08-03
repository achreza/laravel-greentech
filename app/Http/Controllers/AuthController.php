<?php

namespace App\Http\Controllers;

use App\Enums\PositionType;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailPemberitahuan;

class AuthController extends Controller
{





    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Cek apakah email sudah terdaftar
        $existingUser = User::where('email', $user->email)->first();
        $email = $user->email;

        if ($existingUser) {
            // User sudah terdaftar, langsung login dan redirect ke halaman dashboard
            auth()->login($existingUser);
            // save session user id
            $request->session()->put('id_user', $existingUser->id_user);
            //save all user data to session
            $request->session()->put('user', $existingUser);
            if ($existingUser->id_role_user == 3) {
                return redirect('/dashboard-participant');
            }
            return redirect('/dashboard');
        } else {
            // User belum terdaftar, redirect ke halaman register dengan data dari Google
            $page = 'register';
            return view('auth.register', compact('email', 'page'));
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
        $email = $request->email;
        $existingUser = User::where('email', $email)->first();
        // User sudah terdaftar, langsung login dan redirect ke halaman dashboard
        auth()->login($existingUser);
        // save session user id
        $request->session()->put('id_user', $existingUser->id_user);
        //save all user data to session
        $request->session()->put('user', $existingUser);


        $email = $request->email;
        $nama = $request->fullname;
        $data = [
            'subject' => "[ICGT 2023] Account Has Been Created",
            'isi' => "Dear $nama\n Thank you for registering to 2023 13th International Conference of Green Technology (ICGT 2023).\n You can see all your submissions and their status at https://gcms.uin-malang.ac.id/.\n\nRegards, Thank you and have a nice day.\n\nWarmest Regards Technical and Support Staff\n ICGT 2023",
        ];
        Mail::to($email)->send(new EmailPemberitahuan($data));
        //Redirect ke halaman dashboard
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}