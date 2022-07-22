<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
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
        //
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

    public function getPassword($token)
    {
        return view('frontend::auth.resetPassword', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required||same:newPassword',
            
        ]);
        

        
        $updatePassword = DB::table('password_resets')
        ->where('token', $request->token)
        ->first();
      
        if(!$updatePassword){
            return response()->json(["error" => "Your password reset link expired."], 403);  
        }
      
        $user = User::where('email', $updatePassword->email)
                      ->update(['password' => Hash::make($request->newPassword)]);
      
        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
      
        return response()->json(["success" => "We have e-mailed your password reset link!"], 200);  
    }
}
