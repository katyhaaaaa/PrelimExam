<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Nexmo\Laravel\Facade\Nexmo;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    //
    public function registration() {
        return view('register');
    }

    public function loginForm() {
        return view('login');

    }

    public function homepage() {
        return view('home');
    }

    public function forget_password() {
        return view('change_password');
    }


    public function register(Request $request) {

        $request->validate([
            'name' => 'required|string|min:8|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string',
            'password' => [
                'required', 'string',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols(),
            ],
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'remember_token' => $token
        ]);

        Mail::send('verification-email', ['user'=>$user], function($mail) use ($user) {
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('denberdeleon@gmail.com', 'PRELIM EXAM');
        });


        Nexmo::message()->send([
            'to'=> '639638753935',
            'from'=> 'Admin',
            'text'=> 'Congratulations. Your Account has been Registered. Please check your Email to Verify'
        ]);


        return redirect('/login')->with('Message','Please check your Sms message in your phone');

    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at==null) {
            return redirect('/login')->with('Error', 'Your Account has not yet verified');
        }

        $login = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!$login) {
            return back()->with('Error','Invalid Credentials.');
        }

        return redirect('/dashboard');

    }


    public function verification(User $user, $token) {
        if($user->remember_token!==$token) {
            return redirect('/login')->with('Error','Invalid Credentials.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('Message', 'Your Account has been succefully verified');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login')->with('Message', 'You have been logout');
    }

    public function change_password() {

    }

    public function update_password() {

    }
}
