<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminChangePassword extends Controller
{

   /**

     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function changePassword(Request $request)
    {
    try {           
       
      $this->validate($request, [
            'oldPassword' => ['required','min:8'],
            'newPassword' => ['required', 'min:8', 'same:newPassword'],
            'confirmPassword' => ['required', 'min:8', 'same:newPassword'],            
        ]);

        //getting the password of the currently login user
            $hashPassword = Auth::getUser()->password;
            
        if (Hash::check($request->oldPassword, $hashPassword)) {
            if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            } else {
                $user = Admin::find(Auth::id());
                $user->password = $request->newPassword;
               // print($user->password); die();
                $user->save();
                Auth::logout();
                return redirect()->route('Admin')->with('success', 'Password changed successfully');
            }
        }else {
            return redirect()->back()->with('error', 'Current Password is not correct. Please try again');
        }
    } catch (Exception $ex) {
     echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";

    }
}//end
    
}
