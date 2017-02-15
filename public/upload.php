<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
$db_host='localhost';
$db_username='root';
$db_password='root';
$db_name='admin_rebate_tracker_db';

$db_connect=mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_error()){
  echo "Failed to connect to MYSQL " .mysqli_connect_error();
}

if (!mysqli_select_db($db_connect, 'admin_rebate_tracker_db')){
  echo "Database not selected";
}
// $_FILES is an array of arrays returned by html name="file[]", below we loop through the array and filter
// out any non PDF files.
  if(!empty($_FILES['files']['name'][0])){ //let's start by checking that there is atleast one file chosen
    $files = $_FILES['files']; //create a variable here so we don't continously type $_FILES['files']
    $allowed = array('pdf'); // create an array allowed, witht the extension that we want.
    $failed = array();
    $uploaded = array();
    foreach ($files['name'] as $position => $file_name) { //create a loop to go through all files use index of file to point
      $file_tmp = $files['tmp_name'][$position];         // to a single file while looping.
      $file_size = $files['size'][$position];


      $file_ext = explode('.', $file_name);    //seperate the file extension
      $file_ext = strtolower(end($file_ext));  //make the file extension lower case, just incase

      if(in_array($file_ext, $allowed)){ // check to see if the file extension of each file is in our allowed array.
          $new_file_name = uniqid('', true). '.' . $file_ext;
          $file_destination = 'images/' . $new_file_name;
          echo "I've declared the file destination";
          if(move_uploaded_file($file_tmp, $file_destination)){
            $uploaded[$position] = $file_destination;
            echo "if you see this that means the file has been uploaded";
          }
          else{
            $failed[$position] = "[{$file_name}] failed to upload!"; //put non pdf files in failed array.
          }
      }
      else{  // if it is not then display error
        echo "only 'pdf' file extensions are allowed to be uploaded, please go back and resubmit your form.";
      }
    }
    if(!empty($uploaded)){ //show all pdf files uploded
      print_r($uploaded);
    }
    if(!empty($failed)){ //show all files not uploaded.
      print_r($failed);
    }
  }

 ?>
