<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('frontend::profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $userId = auth()->user()->id;

        $validated   = $request->validate([
            'email'  => 'required|unique:users,email,'.$userId.',id',
        ], [ 
            'email.unique' => 'This user email already exists.' 
        ]);

        $user = User::updateOrCreate([ 'id' => $userId ], [
            'name' => $request->name,
            'last_name' => $request->lastName,
            'email' => $request->email
        ]);

        return response()->json(["success" => "user updated Successfully"], 200);
    }
    public function changePassword(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'oldPassword'  => 'required',
            'newPassword'  => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirmPassword'  => 'required|same:newPassword',
        ], [ 
            'oldPassword.required' => 'The old password field is required.', 
            'newPassword.required' => 'The new password field is required.',
            'newPassword.regex' => 'At least 1 letter, a number or symbol, at least 8 characters.',
            'confirmPassword.required' => 'The confirm password field is required.',
            'confirmPassword.same' => 'Please enter the same value again.',
        ]);

        // validation massage
        if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }
       
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;
        
        $userId = auth()->user()->id;
        $user = User::find($userId);
        if(Hash::check($oldPassword, $user->password)){
            $user = User::updateOrCreate(['id' => $userId], [
                'password' => Hash::make($newPassword)
            ]);

            auth()->logout();

            return response()->json(['status' => 1, "success" => "user password updated Successfully"]);
        }else{
            return response()->json(['status' => 0, "error" => "old password is not match."]);
        }
    }
}
