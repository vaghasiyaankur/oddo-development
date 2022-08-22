<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Controller;
use App\Models\logoFavicon;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {

    $logoFavicon = logoFavicon::first();
       return view('admin::auth.login',compact('logoFavicon'));
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();



        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The Email field is required.',
            'email.email' => 'please enter a valid email address',
            'password' => 'The Password field is required.'
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('amenity.index');
            }else{
                return redirect()->route('admin.index');
            }
        }else{
            return redirect()->route('admin.index')
                ->with('error','Credentials are not match.');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('admin/login');
      }
}
