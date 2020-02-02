<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\PcmRegistration;
use App\User;
use App\SenateList;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //landing page for users and where to begin registration
        return view('home');
    }

    //page to view registration details
    public function greenCard() {        
       try {
         $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('greenCard')->with('PcmRegistration', $user->PcmRegistration);
           
       } catch (Exception $ex) {
        echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";

       }

    }

    //page to update names
    public function updateProfile($id)
    {
        try {
           //die("Hi there..." . $id);
         $PcmRegistration = PcmRegistration::find($id);         
         return view('updateProfile')->with('PcmRegistrations', $PcmRegistration); 
        } catch (Exception $ex) {
            echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";
        }
        
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(Request $request, $id)
    {
        try {         
        
        //updasting in the database
        $this->validate($request, [
            'lname' => 'required|min:3|max:50|alpha',
            'mname' => 'min:3|max:50|alpha',
            'fname' => 'required|min:3|max:50|alpha',
            'email' => 'required|min:3|max:50|',            
            'dob' => 'required|max:50',
            
        ]);

        //Updating records in the database
        $PcmRegistration =  PcmRegistration::find($id);
        $PcmRegistration->lname = $request->input('lname');
        $PcmRegistration->mname = $request->input('mname');
        $PcmRegistration->fname = $request->input('fname');
        $PcmRegistration->email = $request->input('email');
        $PcmRegistration->dob = $request->input('dob');
        $PcmRegistration->save();       
        return redirect('/pcm/greenCard')->with('success', 'Updated successfully');
       
        } catch (Exception $ex) {
        echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n".$ex->getFile();

        }
    }


    //inserting datav into the database
    public function store(Request $request) {
        try {           
       
         $this->validate($request, [
            'fname' => 'required|min:3|max:50|alpha',
            'lname' => 'required|min:3|max:50|alpha',
            'mname' => 'min:3|max:50|alpha|nullable',
    'email' => 'required|min:3|max:50|unique:pcm_registrations,email',            
            'phone' => 'required|numeric|min:11',
            'dob' => 'required|max:50',
            'photo' => 'required|image|nullable|max:1999',
            'gender' => 'required|max:50',
            'maritalstatus' => 'required|max:50',
            'address' => 'required|min:4|max:190',
            'state' => 'required |max:50',
            'school' => 'required|min:4|max:100|',
            'matric' => 'required|min:4|max:100|unique:pcm_registrations,matric',
            'qualification' => 'required |max:50',
            'course' => 'required|min:4|max:50 |',
            'grade' => 'required|max:50',
             'year' => 'required |max:50',        
            'NorthCentral' => 'required |max:50',
            'NorthWest' => 'required |max:50',
            'NorthEast' => 'required |max:50',
            'SouthSouth' => 'required |max:50',            
        ]);

            //checking if name is on the senate list before registration
             $matricNumber = $request->input('matric');
             // $dob = $request->input('dob');
             $lname = $request->input('lname');            
            //$SenateList = SenateList::orderBy('matric')->get();
           $SenateList = DB::table('senate_lists')->where([
             ['matric', '=', $matricNumber],
             // ['dob', '=', $dob],
            ['lname', '=', $lname],
             ])->get();

            if (!$SenateList->isEmpty()) {        
        
         //handles file upload
         if ($request->hasFile('photo')) {
             //get file name with extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //GET the ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/passport', $fileNameToStore);
         }else{
            $fileNameToStore = "NoImage.jpg";
         }

 //assessing the states of origin and given them state code
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
    case 'Taraba':
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
    case 'Cross Rivers':
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


//callup number logic
 $ramdomCode = mt_rand(10, 100000);
 $Callupnumber = "NYSC/".$stateCode."/".date("Y")."/".$ramdomCode;

//Collecting the state for  deployment
$firstState = $request->input('NorthCentral');
$secondState = $request->input('NorthWest');
$thirdState = $request->input('NorthEast');
$fourthState = $request->input('SouthSouth');

//Logic to post PCMS to states ramdomly
$allChoices = array($secondState, $firstState, $fourthState, $thirdState);
$randomlySelectState = shuffle($allChoices);
foreach ($allChoices as $x) {
    $value = $x;   
}
       
       //Registration
       $PcmRegistration = new PcmRegistration;
       $PcmRegistration->fname = $request->input('fname');
       $PcmRegistration->lname = $request->input('lname');
       $PcmRegistration->mname = $request->input('mname');
       $PcmRegistration->email = $request->input('email');
       $PcmRegistration->phone = $request->input('phone');
       $PcmRegistration->dob = $request->input('dob');
       //$PcmRegistration->photo = $request->input('photo');      
      $PcmRegistration->photo = $fileNameToStore;
       $PcmRegistration->gender = $request->input('gender');
       $PcmRegistration->maritalstatus = $request->input('maritalstatus');
       $PcmRegistration->address = $request->input('address');
       $PcmRegistration->state = $request->input('state');
       $PcmRegistration->school = $request->input('school');
       $PcmRegistration->matric = $request->input('matric');
       $PcmRegistration->qualification = $request->input('qualification');
       $PcmRegistration->course = $request->input('course');
       $PcmRegistration->grade = $request->input('grade');
        $PcmRegistration->year = $request->input('year'); 
       $PcmRegistration->NorthCentral = $request->input('NorthCentral');
       $PcmRegistration->NorthWest = $request->input('NorthWest');
       $PcmRegistration->NorthEast = $request->input('NorthEast');
       $PcmRegistration->SouthSouth = $request->input('SouthSouth');
       $PcmRegistration->Callupnumber = $Callupnumber;
       $PcmRegistration->StateofDeployment = $value;
       $PcmRegistration->user_id = auth()->user()->id;
       $PcmRegistration->save();
       return redirect('/home')->with('success', 'Registration successfully');
       }else{
        Auth::logout();
           return redirect('/')->with('error', 'Unauthorized Access.. You are not allowed to register. Please contact your School for assistance');
         }

     } catch (Exception $ex) {
        echo "<p><strong>Caught exception:</strong></p> ", $ex->getMessage(), "\n";
     }

    }

}























































/**
* Gaiya M. Obed
* 19/01/2020
*Web and Mobile Specialist
*/