<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <title>Rebate Form</title>
  </head>
  <body>
    <form align="center" action="store" method="post" enctype="multipart/form-data">
      <h3>User Information:</h3>
      <div class="">
        First_name:<input type="text" name="first_name" value="">
      </div>
      <br>
      <div class="">
        Last_name:<input type="text" name="last_name" value="">
      </div>
      <br>
      <div class="">
        Your_address1:<input type="text" name="user_address_1" value="">
      </div>
      <br>
      <div class="">
        Your_address2:<input type="text" name="user_address_2" value="">
      </div>
      <br>
      <div class="">
        Your_city:<input type="text" name="city" value="">
      </div>
      <br>
      <div class="">
        Your_state:<input type="text" name="state" value="">
      </div>
      <br>
      <div class="">
        Your_zipcode:<input type="integer" name="user_zipcode" value="">
      </div>
      <br>
      <div class="">
        Your_email:<input type="text" name="user_email" value="">
      </div>
      <br>
      <div class="">
        Your_phone_number:<input type="text" name="user_phone_number" value="">
      </div>
      <br>

      <h3>Company Information:</h3>
      <div class="">
        Company_name:<input type="text" name="company_name" value="">
      </div>
      <br>
      <div class="">
        Company_address:<input type="text" name="company_address" value="">
      </div>
      <br>
      <div class="">
        Company_city:<input type="text" name="company_city" value="">
      </div>
      <br>
      <div class="">
        Company_state:<input type="text" name="company_state" value="">
      </div>
      <br>
      <div class="">
        Company_zipcode:<input type="integer" name="company_zipcode" value="">
      </div>
      <br>
      <div class="">
        Company_phone_number:<input type="text" name="company_phone_number" value="">
      </div>
      <br>
      <div class="">
        <input type="file" name="files[]" value="" multiple>
      </div>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
