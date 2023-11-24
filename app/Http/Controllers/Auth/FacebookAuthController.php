<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FacebookAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(): RedirectResponse | \Exception
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            Log::debug('FACEBOOK USER: ' . json_encode($facebookUser));

            $user = User::updateOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName(),
                    'password' => 'P&ssw0rd',
                    'github_id' => $facebookUser->getId(),
                    'github_token' => $facebookUser->token,
                    'github_refresh_token' => $facebookUser->refreshToken,
                ]
            );

            Auth::login($user);

            return redirect('/dashboard');

        } catch (\Exception $e) {
            return $e;
        }
    }
}
