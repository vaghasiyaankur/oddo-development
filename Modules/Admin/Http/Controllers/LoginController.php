<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\LogoFavicon;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    use AuthenticatesUsers;

    /**
     * This is Static function  logoFavicon
     *
     * @return object $LogoFavicon
     */
    public function index()
    {
        $logoFavicon = LogoFavicon::first();
        return view('admin::auth.login', compact('logoFavicon'));
    }

    /**
     * @var string $redirectTo
     */
    protected $redirectTo = 'admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login user function
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The Email field is required.',
            'email.email' => 'please enter a valid email address',
            'password' => 'The Password field is required.',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('admin.index')->with('error', 'Credentials are not match.');
            }
        } else {
            return redirect()->route('admin.index')
                ->with('error', 'Credentials are not match.');
        }
    }

    /**
     * user Logout function
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
