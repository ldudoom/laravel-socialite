<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GithubAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        Auth::logout();
        return Socialite::driver('github')->redirect();
    }

    public function callback(): RedirectResponse | \Exception
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            Log::debug('GITHUB USER: ' . json_encode($githubUser));

            $user = User::updateOrCreate(
                ['email' => $githubUser->getEmail()],
                [
                    'name' => $githubUser->getName(),
                    'password' => 'P&ssw0rd',
                    'github_id' => $githubUser->getId(),
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]
            );

            Auth::login($user);

            return redirect('/dashboard');

        } catch (\Exception $e) {
            return $e;
        }
    }
}
