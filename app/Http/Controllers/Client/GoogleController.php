<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            [
                'google_user_id' => $googleUser->id
            ],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make('password@Password!'),
                'google_user_id' => $googleUser->id
            ]

        );

        if (!$user->candidate) {
            $candidate = new Candidate();
            $candidate->user_id = $user->id;
            $candidate->address = null;
            $candidate->resume = null;
            $candidate->save();
        }


        Auth::login($user);

        return redirect(route('client.index', absolute: false));
    }
}
