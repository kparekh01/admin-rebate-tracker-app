<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\admin_rebate_tracker_db;

use App\File;

use Illuminate\Support\Facades\Input;

class UserController extends Controller

{
  public function index(){
    return view('users.index');
  }

  public function store(Request $request){
    $rebate = new admin_rebate_tracker_db;

    $rebate->first_name = Input::get('first_name');
    $rebate->last_name = Input::get('last_name');
    $rebate->user_address_1 = Input::get('user_address_1');
    $rebate->user_address_2 = Input::get('user_address_2');
    $rebate->city = Input::get('city');
    $rebate->state = Input::get('state');
    $rebate->user_zipcode = Input::get('user_zipcode');
    $rebate->user_email = Input::get('user_email');
    $rebate->user_phone_number = Input::get('user_phone_number');
    $rebate->company_name = Input::get('company_name');
    $rebate->company_address = Input::get('company_address');
    $rebate->company_city = Input::get('company_city');
    $rebate->company_state = Input::get('company_state');
    $rebate->company_zipcode = Input::get('company_zipcode');
    $rebate->company_phone_number = Input::get('company_phone_number');
    $rebate->save();


    // $_FILES is an array of arrays returned by html name="file[]", below we loop through the array and filter
    // out any non PDF files.
      if(!empty($_FILES['files']['name'][0])){ //let's start by checking that there is atleast one file chosen
        $files = $_FILES['files']; //create a variable here so we don't continously type $_FILES['files']
        $allowed = array('pdf'); // create an array allowed, witht the extension that we want.
        $failed = array();
        $uploaded = array();
        foreach ($files['name'] as $position => $file_name) { //create a loop to go through all files use index of file to point
          $file_error = $files['error'][$position];
          $file_tmp = $files['tmp_name'][$position];         // to a single file while looping.
          $file_ext = explode('.', $file_name);    //seperate the file extension
          $file_ext = strtolower(end($file_ext));  //make the file extension lower case, just incase

          if(in_array($file_ext, $allowed)){ // check to see if the file extension of each file is in our allowed array.
            if($file_error === 0){
              $new_file_name = uniqid('', true). '.' . $file_ext;
              $file_destination = 'images/' . $new_file_name;
              if(move_uploaded_file($file_tmp, $file_destination)){
                $attachment = new File;
                $attachment->file_path = $file_destination; //store the file path to the database
                $attachment->form_id = $rebate->id; //save it attaching the form_id.
                $attachment->save();
                $uploaded[$position] = $file_destination;
              }
              else{
                $failed[$position] = "[{$file_name}] failed to upload!"; //put non pdf files in failed array.
              }
            }
            else{
              $failed[$position] = "[{$file_name}] errored with code {$file_error}";
            }
          }
          else{
            echo "Please attach pdf files only!  Please re-submit this form." . "<br />";
          }
        }
        if(!empty($uploaded)){ //show all pdf files uploded
          echo "This form accepts only pdf file attachments, below is a list of the successfully uploaded files:" . "<br />";
          print_r($uploaded);
          echo "<br />";
        }
        if(!empty($failed)){ //show all files not uploaded.
          echo "Here are the files that were NOT uploaded" . "<br />";
          print_r($failed);
        }
      }
  }
}
