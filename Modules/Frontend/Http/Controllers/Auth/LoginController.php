<?php

namespace Modules\Frontend\Http\Controllers\auth;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * login function
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $Validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'The Email field is required.',
            'email.email' => 'please enter a valid email address.',
            'password.required' => 'The Password field is required.',
            'password.min' => 'please enter a valid password and try again.',
        ]);

        // validation massage
        if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }

        $user = User::where('email', $input['email'])->first();

        if ($user == null || $user->email_verified_at == null) {
            return response()->json(["status" => 0, "error" => "please verify your account."]);
        }

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 'user') {
                return response()->json(["status" => 1, "success" => "login successfully."]);
            } else {
                return response()->json(["status" => 0, "error" => "Email-Address And Password Are Wrong."]);
            }
        } else {
            return response()->json(["status" => 0, "error" => "Email-Address And Password Are Wrong."]);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
