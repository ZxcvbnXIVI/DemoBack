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
  try {
    $user = Socialite::driver('google')->stateless()->user();

    $model = User::where('email', $user->email)->first();

    // Check if already have an email, if not add a new one.
    if (!$model) {
      $model = User::create([
        'UserName' => $user->name,
        'email' => $user->email,
        'google_id'  => $user->id,
        'email_verified_at',
        'password' => encrypt(''),
        'Role' => null,
        'image_path' => null,
        'current_team_id' => null,
        'profile_photo_path' => null,
      ])->save();
    }

    Auth::login($model);

    return auth()->user();
  } catch (\Exception $th) {
    // Do something when eror.
    throw $th;
  }
}

public function logout()
{
  Auth::logout();
  return redirect('/');
}
}

