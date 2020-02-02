<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SenateList;
use DB;

class LandingPageController extends Controller
{
	//landing page
    public function index() {
    	return view('welcome');
    }

    public function checkSenateList (Request $request) {
    	try {
    		$this->validate($request, [
            'surname' => 'required|min:3|max:50|alpha',           
            'dob' => 'required|max:50',           
            'matric' => 'required|min:4|max:50',              
        ]);

    	   $matricNumber = $request->input('matric');
    	   //$dob = $request->input('dob');
    	   $surname = $request->input('surname');   		

    	 $SenateList = DB::table('senate_lists')->where([
    	 	['matric', '=', $matricNumber],
    	 	//['dob', '=', $dob],
    	 	['lname', '=', $surname],
    	 	 ])->get();

    	 if (!$SenateList->isEmpty()) {
    	 	 $SenateList = DB::table('senate_lists')->select('id',   'lname','fname', 'mname', 'dob', 'gender', 'state', 'school', 'qualification', 'course', 'grade','year')->where('matric', $matricNumber)
                ->first();
    	 	
          if ($SenateList ) {

            echo "<div class'card table-responsive'>
            <table  class='table table-bordered shadow-lg p-3 mb-5'>
                  <thead>
                    <tr>
                      <th class='p-3 mb-5 bg-success text-white'>Firstname</th>
                      <th class='bg-success text-white'>Lastname</th>
                      <th class='bg-success text-white'>Middlename</th>
                      <th class='bg-success text-white'>DOB</th>
                      <th class='bg-success text-white'>Gender</th>
                      <th class='bg-success text-white'>State of Origin</th>
                      <th class='bg-success text-white'>School</th>
                      <th class='bg-success text-white'>Course</th>
                      <th class='bg-success text-white'>Qualification</th>
                      <th class='bg-success text-white'>Class of Degree</th>
                      <th class='bg-success text-white'>Year of graduation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class='text-white bg-success'> $SenateList->fname </td>
                      <td class='text-white bg-success'> $SenateList->lname </td>
                      <td class='text-white bg-success'> $SenateList->mname</td>
                      <td class='text-white bg-success'>$SenateList->dob </td>
                        <td class='text-white bg-success'> $SenateList->gender </td>
                       <td class='text-white bg-success'> $SenateList->state </td>
                      <td class='text-white bg-success'> $SenateList->school </td>
                       <td class='text-white bg-success'> $SenateList->course </td>
                        <td class='text-white bg-success'> $SenateList->qualification </td>
                      <td class='text-white bg-success'>$SenateList->grade </td>
                      <td class='bg-success text-white'> $SenateList->year </td>
                    </tr>                  
                  </tbody>
                </table>
                <h3 style='margin-top:-48px;' class='bg-success text-white text-bold'>Please proceed to create and account and register</h3><br/>
                </div>";

                }
                return view('welcome');
    	 }else{
    	 	echo '
            <br/><br/>
            <h2 class="text-danger text-center">SORRY, RECORD NOT FOUND</h2>';
             
    	 }
         return view('welcome');
    		
    	} catch (Exception $ex) {
    		echo "Error: ".$ex->getMessage();
    	}
    }
}
