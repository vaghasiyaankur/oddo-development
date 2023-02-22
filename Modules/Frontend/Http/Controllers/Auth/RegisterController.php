<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use App\Mail\RegisterVerification;
use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Validator;

class RegisterController extends Controller
{

    /**
     * Store a newly created user in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'username' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'RePassword' => 'required|same:password',
        ], [
            'username.required' => 'The username field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'please enter a valid email address',
            'email.unique' => 'EmailId already exists. Kindly use different emailId.',
            'password.required' => 'The Password field is required.',
            'password.regex' => 'At least 1 letter, a number or symbol, at least 8 characters.',
            'RePassword.required' => 'The Re-Password field is required.',
            'RePassword.same' => 'Please enter the same password.',
        ]);

        if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }

        $user = new User();
        $user->name = $request->username;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 0;
        $user->save();

        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        Mail::to($request->email)->send(new RegisterVerification($token));

        return response()->json(["status" => 1, "success" => "A verification link has been sent to your email account"], 200);
    }

    /**
     * User verification function
     * @param string $token
     *
     * @return mixed
     */
    public function userVerification($token)
    {
        $UserVerify = UserVerify::where('token', $token)->first();
        $user = UserVerify::where('token', $token)->where('created_at', '<', Carbon::now()->subHours(1))->first();

        if (!$UserVerify || $user) {
            // return redirect('/')->with('validationfail', 'fail');
            return redirect()->route('home.index')->with(['message' => 'error']);
        }

        $findUser = User::find($UserVerify->user_id);
        $findUser->email_verified_at = Carbon::now()->timestamp;
        $findUser->save();

        Auth::login($findUser);
        if (auth()->check()) {
            if (auth()->user()->type == 'user') {
                UserVerify::where('token', $token)->delete();
                return redirect()->route('home.index');
            }
        } else {
            return redirect()->route('home.index');
        }
    }
}
