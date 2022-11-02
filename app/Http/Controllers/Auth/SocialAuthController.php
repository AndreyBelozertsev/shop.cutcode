<?php

namespace App\Http\Controllers\Auth;

use Throwable;
use App\Models\User;
use DomainException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $driver){
        try{
            return Socialite::driver($driver)->redirect();
        }catch(Throwable $e){
            throw new DomainException('произошла ошибка или драйвер не поддерживается ');
        }
        
    }

    public function callback(string $driver){
        if($driver != 'github'){
            throw new DomainException('произошла ошибка или драйвер не поддерживается ');
        }
        $githubUser = Socialite::driver($driver)->user();
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
