<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                session()->put('name',$finduser->name);

                session()->flash('msg','login successful with existing google account!');
                return redirect()->route('adminDashboard');

            }else{



                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'avatar'=> $user->avatar,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                session()->put('name',$newUser->name);

                session()->flash('msg','login successful!');
                return redirect()->route('adminDashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
