@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">Admin Dashboard</div>
              <div class="panel-body">
                  <h1>Hello Admin</h1>
              </div>
              <div class="row">
                       <div class="col-lg-12">
                           <div class="table-responsive">
                               <table class="table table-bordered table-hover table-striped">
                                   <thead>
                                       <tr>
                                           <th>First_Name</th>
                                           <th>Last_name</th>
                                           <th>User_address1</th>
                                           <th>User_address2</th>
                                           <th>User_city</th>
                                           <th>User_state</th>
                                           <th>User_zipcode</th>
                                           <th>User_email</th>
                                           <th>User_phone</th>
                                           <th>Comp_name</th>
                                           <th>Comp_address</th>
                                           <th>Comp_city</th>
                                           <th>Comp_state</th>
                                           <th>Comp_zipcode</th>
                                           <th>Comp_phonenumber</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                      @foreach ($rebate_forms as $form)
                                       <tr class="odd gradeX" >
                                           <td>{{$form->first_name}}</td>
                                           <td>{{$form->last_name}}</td>
                                           <td>{{$form->user_address_1}}</td>
                                           <td>{{$form->user_address_2}}</td>
                                           <td>{{$form->city}}</td>
                                           <td>{{$form->state}}</td>
                                           <td>{{$form->user_zipcode}}</td>
                                           <td>{{$form->user_email}}</td>
                                           <td>{{$form->user_phone_number}}</td>
                                           <td>{{$form->company_name}}</td>
                                           <td>{{$form->company_address}}</td>
                                           <td>{{$form->company_city}}</td>
                                           <td>{{$form->company_state}}</td>
                                           <td>{{$form->company_zipcode}}</td>
                                           <td>{{$form->company_phone_number}}</td>
                                          @foreach($files as $file)
                                            @if($file->form_id === $form->id)
                                              <td><a href="http://localhost:8888/{{$file->file_path}}">Attachments</a></td>
                                            @endif
                                          @endforeach
                                           <td><a href="" class="btn btn-success btn-lg"> Approve </a></td>
                                       </tr>
                                      @endforeach
                                   </tbody>
                               </table>
                           </div>
                           <!-- /.table-responsive -->
                       </div>
                       <!-- /.col-lg-4 (nested) -->
                       <!-- /.col-lg-8 (nested) -->
                   </div> <!-- /.row -->
            </div>
        </div>
    </div>
@endsection
