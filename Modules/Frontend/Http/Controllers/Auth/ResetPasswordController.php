<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

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
        $Validator = Validator::make($request->all(), [
            'newPassword' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirmPassword' => 'required||same:newPassword',
        ]);

         // validation massage
         if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }
        
        $updatePassword = DB::table('password_resets')
        ->where('token', $request->token)
        ->first();
      
        if(!$updatePassword){
            return response()->json(["status" => 0, "error" => "Your password reset link expired."]);  
        }
      
        $user = User::where('email', $updatePassword->email)
                      ->update(['password' => Hash::make($request->newPassword)]);
      
        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
      
        return response()->json(["status" => 1, "success" => "We have e-mailed your password reset link!"], 200);  
    }
}
