<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail; 
use App\Mail\RegisterVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('frontend::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
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
            'token' => $token
        ]);

        Mail::to($request->email)->send(new RegisterVerification($token));

        return response()->json(["status" => 1, "success" => "A verification link has been sent to your email account"], 200);      
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frontend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function userVerification($token) {
        $UserVerify = UserVerify::where('token', $token)->first();
        $user = UserVerify::where('token', $token)->where('created_at', '<', Carbon::now()->subHours(1))->first();

        if(!$UserVerify || $user) {
            // return redirect('/')->with('validationfail', 'fail');
            return redirect()->route('home.index')->with([ 'message' => 'error' ]);
        }

        $findUser = User::find($UserVerify->user_id);
        $findUser->email_verified_at = Carbon::now()->timestamp;
        $findUser->save();

        Auth::login($findUser);
        if(auth()->check()) {
            if (auth()->user()->type == 'user') {
                UserVerify::where('token', $token)->delete();
                return redirect('/');
            }
        }else {
            return redirect('/');
        }
    }
}
