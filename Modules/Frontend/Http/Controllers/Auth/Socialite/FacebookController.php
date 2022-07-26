<?php

namespace Modules\Frontend\Http\Controllers\Auth\Socialite;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
         
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }else{
                $userName = explode(" ", $user->name);
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $userName[0],
                        'last_name' => $userName[1],
                        'facebook_id'=> $user->id,
                        'type' => '0',
                        'password' => encrypt('Demo@12345')
                    ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
