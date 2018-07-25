<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try{
            $socialUser = Socialite::driver('google')->user();
        }
        catch(\Exception $e){
            return redirect('/');
        }
        // Check if user email exist in the User's Table
        $user = User::where('email', $socialUser->getEmail())->first();
        // if not, create user
        if(!$user){
            $user = User::firstOrCreate(
                ['email'=>$socialUser->getEmail()],
                ['name'=>$socialUser->getName()],
                ['role'=>"user"]
            );
            // sign-in user, and redirect to the dashboad
            auth()->login($user);
            return redirect('/dashboard');
        } else {
            // if user email is found, sign-in user, and redirect to the dashboad
            auth()->login($user);
            return redirect('/dashboard');
        }
    }
}
