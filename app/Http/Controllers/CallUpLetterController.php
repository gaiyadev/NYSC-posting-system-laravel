<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PcmRegistration;
use App\User;

class CallUpLetterController extends Controller
{
   //private $fpdf;
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


     public function callUpLetter()
    {
        //$details = PcmRegistration::all();
        $user_id = auth()->user()->id;
        //$user = PcmRegistration::find($user_id);
       $users = DB::table('pcm_registrations')->distinct()->where('user_id', $user_id)->first();
       //print_r($users); die;
        return view('callUpLetter')->with('user', $users);
    }
}
