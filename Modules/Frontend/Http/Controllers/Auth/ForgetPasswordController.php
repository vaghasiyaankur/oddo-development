<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Mail;
use Validator;

use App\Mail\NotifyMail;

class ForgetPasswordController extends Controller
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

    public function forgetpassword(Request $request)
    {
        // dd($request->toarray());
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
