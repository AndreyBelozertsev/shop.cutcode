<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('github')->redirect();
    }

    public function callback(){
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('provider_id', $githubUser->id)->where('provider', 'github')->first();
        
        if ($user) {
            $user->update([
                'thumbnail' => $githubUser->avatar,
                'provider_token' => $githubUser->token,
                'provider_refresh_token' => $githubUser->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $githubUser->name ? $githubUser->name : $githubUser->nickname,
                'email' => $githubUser->email,
                'thumbnail' => $githubUser->avatar,
                'provider' => 'github',
                'provider_id' => $githubUser->id,
                'provider_token' => $githubUser->token,
                'provider_refresh_token' => $githubUser->refreshToken,
            ]);
        }
 
    Auth::login($user);
 
    return redirect('/');
    }
}
