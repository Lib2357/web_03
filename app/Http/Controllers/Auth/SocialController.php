<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $provider)
    {
        $driver = Socialite::driver($provider)->stateless();

        if ($provider === 'facebook') {
            $driver->fields(['name', 'picture.width(1920)'])->setScopes([]);
        }

        return $driver->redirect();
    }

    public function callback(string $provider)
    {
        try {
            $driver = Socialite::driver($provider)->stateless();

            if ($provider === 'facebook') {
                $driver->fields(['name', 'picture.width(1920)'])->setScopes([]);
            }

            $socialUser = $driver->user();

            $email = $socialUser->getEmail();
            $providerId = $socialUser->getId();
            $name = $socialUser->getName() ?: $socialUser->getNickname() ?: 'Social User';

            $user = User::where('provider', $provider)
                ->where('provider_id', $providerId)
                ->first();

            if (! $user && filled($email)) {
                $user = User::where('email', $email)->first();
            }

            if (blank($email)) {
                $email = sprintf('%s_%s@no-email.local', $provider, $providerId);
            }

            if (! $user) {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'provider' => $provider,
                    'provider_id' => $providerId,
                    'avatar' => $socialUser->getAvatar(),
                    'student_id' => 'SV'.rand(1000, 9999),
                ]);
            } else {
                $user->fill([
                    'name' => $user->name ?: $name,
                    'provider' => $provider,
                    'provider_id' => $providerId,
                    'avatar' => $socialUser->getAvatar() ?: $user->avatar,
                ])->save();
            }

            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Throwable $e) {
            return redirect('/login')->with('error', 'Dang nhap that bai: '.$e->getMessage());
        }
    }
}
