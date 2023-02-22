<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use App\Mail\NotifyMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Validator;

class ForgetPasswordController extends Controller
{
    /**
     * forget password function
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgetpassword(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'forgetEmail' => 'required|email|exists:users,email',
        ]);

        if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->forgetEmail, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::to($request->forgetEmail)->send(new NotifyMail($token));

        return response()->json(["status" => 1, "success" => "We have E-mailed your password reset link!"], 200);
    }
}
