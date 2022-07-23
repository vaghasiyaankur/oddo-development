<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'RePassword' => 'required|same:password',
        ], [
            'username.required' => 'The username field is required.', 
            'email.required' => 'The Email field is required.',
            'email.email' => 'please enter a valid email address',
            'email.unique' => 'EmailId already exists. Kindly use different emailId.',
            'password.required' => 'The Password field is required.',
            'RePassword.required' => 'The Re-Password field is required.',
            'RePassword.same' => 'Please enter the same value again.',
        ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 0;
        $user->save();

        return response()->json(["success" => "account created successfully."], 200);  
          
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

}
