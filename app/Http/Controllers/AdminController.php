<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SenateList;
use DB;
use App\User;
use App\PcmRegistration;



class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //fecting from user table
    $users = DB::table('users')->orderBy('id', 'desc')->select('id')->offset(0)->limit(1)->get();
//fetching from pcm table
     $pcms = DB::table('pcm_registrations')->orderBy('id', 'desc')->select('user_id')->offset(0)->limit(1)->get();
//fetching from senate table
    $SenateFetch = DB::table('senate_lists')->orderBy('id', 'desc')->select('id')->offset(0)->limit(1)->get();
        //die();
        return view('admin.dashboard')->with('users', $users)
      ->with('fetchs', $SenateFetch)->with('pcms', $pcms);
    }

    public function senateList() {
        return view('admin.senateList');
    }


    public function showChangePasswordForm () {
        return view('admin.adminChangePass');
    }


    public function senateViewList() {
       try {
         $SenateList = DB::table('senate_lists')->latest()->paginate(1);
        return view('admin.viewList')->with('SenateLists', $SenateList);  
       } catch (Exception $ex) {
           echo "Error:".$ex->getMessage();
       }
    }

//editing d list

    public function updateSenate($id) {
        try {
           //die("Hi there..." . $id);
         $SenateList = SenateList::find($id);         
         return view('admin.updateList')->with('SenateLists', $SenateList); 
        } catch (Exception $ex) {
            echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";
        }
        
    }


        public function destroy($id)
        {
            $SenateList =  SenateList::find($id);
            $SenateList->delete();
            return redirect('senate/view')->with('success', 'Deleted successfully');

        }



    public function saveSenate(Request $request, $id) {

        try {
            $this->validate($request, [
            'fname' => 'required|min:3|max:50|alpha',
            'lname' => 'required|min:3|max:50|alpha',
            'mname' => 'min:3|max:50|alpha',
            'dob' => 'required|max:50',
            'gender' => 'required|max:50',
            'state' => 'required |max:50',
            'school' => 'required|min:4|max:100',
            'qualification' => 'required |max:50',
            'course' => 'required|min:4|max:50',
             'matric' => 'required|min:4|max:50|unique:senate_lists,matric',
            'grade' => 'required|max:50',
             'year' => 'required |max:50', 
            
        ]);


       $SenateList =  SenateList::find($id);
       $SenateList->fname = $request->input('fname');
       $SenateList->lname = $request->input('lname');
       $SenateList->mname = $request->input('mname');
       $SenateList->dob = $request->input('dob');
       $SenateList->gender = $request->input('gender');
       $SenateList->state = $request->input('state');
       $SenateList->school = $request->input('school');
       $SenateList->qualification = $request->input('qualification');
       $SenateList->course = $request->input('course');
       $SenateList->matric = $request->input('matric');
       $SenateList->grade = $request->input('grade');
       $SenateList->year = $request->input('year');  
       $SenateList->save();

       return redirect('/senate/view')->with('success', 'Updated successfully');
             
         } catch (Exception $e) {
        echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";

         }

    }

    public function senateListStore (Request $request) {
         try {
            $this->validate($request, [
            'fname' => 'required|min:3|max:50|alpha',
            'lname' => 'required|min:3|max:50|alpha',
            'mname' => 'max:50|alpha|nullable',
            'dob' => 'required|max:50',
            'gender' => 'required|max:50',
            'state' => 'required |max:50',
            'school' => 'required|min:4|max:100',
            'qualification' => 'required |max:50',
            'course' => 'required|min:4|max:50',
             'matric' => 'required|min:4|max:50|unique:senate_lists,matric',
            'grade' => 'required|max:50',
             'year' => 'required |max:50',             
        ]);

    $stateSelected = $request->input('state');

  switch ($stateSelected) {
    case 'Kaduna':
         $stateCode = 'KDU';
        break;
    case 'Kano':
    $stateCode = "KN";
        break;
    case 'Katsina':
    $stateCode = "KAT";
        break;
    case 'Lagos':
        $stateCode = "LAG";
        break;
    case 'Ekiti':
        $stateCode = "EK";
        break;
    case 'Tarabe':
        $stateCode = "TAR";
        break;
    case 'Adamawa':
        $stateCode = "ADA";
        break;
    case 'Fct':
        $stateCode = "FCT";
        break;
    case 'Yobe':
        $stateCode = "YOB";
        break;
    case 'Nassarawa':
        $stateCode = "NAS";
        break;
    case 'Bauchi':
        $stateCode = "BAU";
        break;
    case 'Ogun':
        $stateCode = "OGU";
        break;
    case 'Ondo':
        $stateCode = "OND";
        break;
    case 'Osun':
        $stateCode = "OSU";
        break;
    case 'Borno':
        $stateCode = "BOR";
        break;
    case 'Zamfara':
        $stateCode = "ZAM";
        break;
    case 'Rivers':
        $stateCode = "RIV";
        break;
    case 'Niger':
        $stateCode = "NIG";
        break;
    case 'Sokoto':
        $stateCode = "SOK";
        break;
    case 'Oyo':
        $stateCode = "OYO";
        break;
    case 'Delta':
        $stateCode = "DEL";
        break;
    case 'Ebonyi':
        $stateCode = "EBO";
        break;
    case 'Cross River':
        $stateCode = "CR";
        break;
    case 'Benue':
        $stateCode = "BEN";
        break;
    case 'Bayelsa':
        $stateCode = "BAY";
        break;
    case 'Anambra':
        $stateCode = "ANA";
        break;
    case 'Akwa Ibom':
        $stateCode = "AI";
        break;
    case 'Kebbi':
        $stateCode = "KEB";
        break;
    case 'Plateau':
        $stateCode = "PLA";
        break;
    case 'Jigawa':
        $stateCode = "JIG";
        break;
    case 'Kwara':
        $stateCode = "KWA";
        break;
    case 'Kogi':
        $stateCode = "KOG";
        break;
    case 'Imo':
        $stateCode = "IMO";
        break;
    case 'Gombe':
        $stateCode = "GOM";
        break;
    case 'Enugu':
        $stateCode = "ENU";
        break;
    case 'Rivers':
        $stateCode = "RIV";
        break;    
    default:
     $stateCode = 'NYSC';
        break;
}


   $ramdomCode = mt_rand(10, 100000);
   $Callupnumber = "NYSC/SenateList/".$stateCode."/".date("Y")."/".$ramdomCode;
//storing in database
   $SenateList = new SenateList;
   $SenateList->fname = $request->input('fname');
   $SenateList->lname = $request->input('lname');
   $SenateList->mname = $request->input('mname');
   $SenateList->dob = $request->input('dob');
   $SenateList->gender = $request->input('gender');
   $SenateList->state = $request->input('state');
   $SenateList->school = $request->input('school');
   $SenateList->qualification = $request->input('qualification');
   $SenateList->course = $request->input('course');
   $SenateList->matric = $request->input('matric');
   $SenateList->grade = $request->input('grade');
   $SenateList->year = $request->input('year');  
   $SenateList->Callupnumber = $Callupnumber;
   $SenateList->save();

       return redirect('/senate')->with('success', 'Added successfully');             
         } catch (Exception $e) {
        echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";

         }
    }

   
}































/**
* Gaiya M. Obed
* 19/01/2020
*Web and Mobile Specialist
*/