<?php

namespace App\Http\Controllers;

use App\Enums\PositionType;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AuthController extends Controller
{


    public function sendEmail()
    {
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->Port = env('MAIL_PORT');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');

            // Pengirim
            $mail->setFrom('greentech.notification@gmail.com', 'GreenTech Notification');

            // Penerima
            $mail->addAddress('achmadfahreza950@gmail.com', 'Achmad Fahreza');

            // Isi Email
            $mail->isHTML(true);
            $mail->Subject = 'Subject of the Email';
            $mail->Body = 'Body of the Email';

            // Kirim Email
            $mail->send();

            return 'Email sent successfully!';
        } catch (Exception $e) {
            return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    }


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



        // Redirect ke halaman dashboard
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}