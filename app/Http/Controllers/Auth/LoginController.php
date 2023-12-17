<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\GoogleService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    public function someMethod()
    {
        $googleApiConfig = Config::get('google_api');

        // ใช้ Guzzle Client ผ่าน $this->googleService->client ได้ทุกที่ที่คุณต้องการ
        $response = $this->googleService->client->get('/some-endpoint');
        // ทำสิ่งที่คุณต้องการกับ $response...
    }

    public function showLoginForm()
    {
        return view('auth.login'); // แน่ใจว่าไฟล์ Blade อยู่ที่ resources/views/auth/login.blade.php
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        return dd($user);
        // $users = Socialite::driver('google')->stateless()->user();


        // // เช็คว่ามี user ในระบบหรือไม่
        // $existingUser = User::where('email', $user->email)->first();

        // if ($existingUser) {
        //     auth()->login($existingUser, true);
        // } else {
        //     // ถ้าไม่มีให้สร้าง user ใหม่
        //     $newUser = new User();
        //     $newUser->name = $user->name;
        //     $newUser->email = $user->email;
        //     $newUser->google_id = $user->id;
        //     $newUser->password = bcrypt(str_random(16)); // สร้าง password สุ่ม
        //     $newUser->save();

        //     auth()->login($newUser, true);
        // }

        // return redirect('/');
    }
}

