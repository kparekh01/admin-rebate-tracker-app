<?php

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
      $file_tmp = $file['temp_name'][$position];         // to a single file while looping.
      $file_size = $file['size'][$position];
      $file_error = $file['error'][$position]; //if an error occurs

      $file_ext = explode('.', $file_name);    //seperate the file extension
      $file_ext = strtolower(end($file_ext));  //make the file extension lower case, just incase

      if(in_array($file_ext, $allowed)){ // check to see if the file extension of each file is in our allowed array.
        if($file_error === 0){
          $new_file_name = uniqid('', true). '.' . $file_ext;
          $file_destination = 'images/' .$new_file_name;
          if(move_uploaded_file($file_tmp, $file_destination)){
            $uploaded[$position] = $file_destination;
          }
          else{
            $failed[$position] = "[{$file_name}] failed to upload!";
          }
        }
        else{
          $failed[$position] = "[{$file_name}] errored with code {$file_error}";
        }
      }
      else{  // if it is not then display error
        echo "only 'pdf' file extensions are allowed to be uploaded, please go back and resubmit your form.";
      }
    }
    if(!empty($uploaded)){
      pritn_r($uploaded);
    }
    if(!empty($failed)){
      pritn_r($failed);
    }
  }


//creating variables to store form values

$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$user_address_1 = $_REQUEST['user_address_1'];
$user_address_2 = $_REQUEST['user_address_2'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$user_zipcode = $_REQUEST['user_zipcode'];
$user_email = $_REQUEST['user_email'];
$user_phone_number = $_REQUEST['user_phone_number'];

$company_name = $_REQUEST['company_name'];
$company_address = $_REQUEST['company_address'];
$company_city = $_REQUEST['company_city'];
$company_state = $_REQUEST['company_state'];
$company_zipcode = $_REQUEST['company_zipcode'];
$company_phone_number = $_REQUEST['company_phone_number'];

//Insert data to Table

mysqli_query($db_connect, "INSERT INTO forms(
  first_name,
  last_name,
  user_address_1,
  user_address_2,
  city,
  state,
  user_zipcode,
  user_email,
  user_phone_number,
  company_name,
  company_address,
  company_city,
  company_state,
  company_zipcode,
  company_phone_number)
  VALUES(
  '$first_name',
  '$last_name',
  '$user_address_1',
  '$user_address_2',
  '$city',
  '$state',
  '$user_zipcode',
  '$user_email',
  '$user_phone_number',
  '$company_name',
  '$company_address',
  '$company_city',
  '$company_state',
  '$company_zipcode',
  '$company_phone_number'
)") or die(mysqli_error($db_connect));

mysqli_close($db_connect);

header("location:form.php?note=sucessfullysubmittedform")

?>
