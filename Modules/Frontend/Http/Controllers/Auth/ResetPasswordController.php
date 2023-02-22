<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

class ResetPasswordController extends Controller
{
    /**
     * get Password function
     * @param string $token
     *
     * @return \Illuminate\View\View
     */
    public function getPassword($token)
    {
        return view('frontend::auth.resetPassword', ['token' => $token]);
    }

    /**
     * update password function
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

        if (!$updatePassword) {
            return response()->json(["status" => 0, "error" => "Your password reset link expired."]);
        }

        $email = (isset($updatePassword->email) ? $updatePassword->email : false);

        $user = User::where('email', $email)
            ->update(['password' => Hash::make($request->newPassword)]);

        DB::table('password_resets')->where(['email' => $email])->delete();

        return response()->json(["status" => 1, "success" => "We have e-mailed your password reset link!"], 200);
    }
}
