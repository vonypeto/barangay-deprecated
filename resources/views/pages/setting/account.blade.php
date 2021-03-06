@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Account</h1>
</div>

<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >
      
      <!----------------
         EDIT HERE
         ---------------->
         
         {{-- - Tablink - --}}
         <div class="tab-nav ">
            <button class="tablinks active" onclick="schedules(event, 'schedule')">Account Setting</button>
            <button class="tablinks " onclick="schedules(event, 'create') ">Create Account</button>
            <button class="tablinks"  id="tablink-manage-account" onclick="schedules(event, 'manage')">Manage Account</button>
            <button class="tablinks" onclick="schedules(event, 'session')">Session History</button>
         </div>
         
         {{-- - Account Setting Tablink - --}}
         <div id="schedule" class="tabcontent">
            
            <div class="col-sm-12 pt-2">
               
               <!-----
                  START HERE
                  --->

                  <div class="container" style="background-color: rgb(7, 110, 151)">
                     <div class="row">
                        <div class="col-8" style="border: black solid 2px">
                           di ako marunong ng bootstrap AHHHHHHHHHHHH!!!!
                        </div>
                        <div class="col">

                        </div>
                     </div>
                  </div>
                  old password <br>
                  new password <br>
                  comfirm new Password <br>
                  first name <br>
                  last namespace <br>
                  email    <br>
                  username <br>
                  use your imagination to create a login and account setting
                  <!-----
                     END HERE
                     --->
                  </div>
               </div>
               
               
               
               
               {{-- - Create Account Tablink - --}}
               
               <div id="create" class="tabcontent">
                  
                  <div class="row">
                     <div class="col-md-12 order-md-1 d-flex justify-content-center pt-4" >
                        {{-- ------------------------------------------------- form ------------------------------------------------------ --}}
                        <form class="needs-validation" novalidate="" id="create_account_form">
                           <div class="row">
                              
                              {{-- firstname --}}
                              <div class="col-md-6 mb-3">
                                 <label for="firstname">First name</label>
                                 <input type="text" class="form-control" name="create_account_form_firstname" id="create_account_form_firstname" placeholder="Enter First Name">
                                 <span class="text-danger error_text create_account_form_firstname_error"></span>
                              </div>
                              
                              {{-- lastname --}}
                              <div class="col-md-6 mb-3">
                                 <label for="create_account_form_lastname">Last name</label>
                                 <input type="text" class="form-control" name="create_account_form_lastname" id="create_account_form_lastname" placeholder="Enter Last Name" >
                                 <span class="text-danger error_text create_account_form_lastname_error"></span>
                              </div>
                           </div>
                           
                           {{-- username --}}
                           <div class="mb-3">
                              <label for="create_account_form_username">Username</label>
                              <div class="input-group">
                                 <input type="text" class="form-control" name="create_account_form_username" id="create_account_form_username" placeholder="Enter Username">
                                 <span class="text-danger error_text create_account_form_username_error"></span>
                              </div>
                           </div>
                           {{-- email --}}
                           <div class="mb-3">
                              <label for="create_account_form_email">Email</label>
                              <input type="email" class="form-control" name="create_account_form_email" id="create_account_form_email" placeholder="you@example.com">
                              <span class="text-danger error_text create_account_form_email_error"></span>
                           </div>
                           {{-- password --}}
                           <div class="mb-3">
                              <label for="create_account_form_password">Password</label>
                              <input type="password" class="form-control" name="create_account_form_password" id="create_account_form_password" placeholder="Enter password">
                              <span class="text-danger error_text create_account_form_password_error"></span>
                           </div>
                           {{-- verify password --}}
                           <div class="mb-3">
                              <label for="create_account_form_verify_password">Verify Password</label>
                              <input type="password" class="form-control" name="create_account_form_verify_password" id="create_account_form_verify_password" placeholder="Verify password">
                              <span class="text-danger error_text create_account_form_verify_password_error"></span>
                           </div>
                           
                           <hr class="mb-4">
                           <div class="text-center button-center d-flex justify-content-center">
                              {{-- submit --}}
                              <button id="submitBtn" name="" class="btn btn-success col-sm-3 text-center btn-lg btn-block" type="submit">Submit</button>
                              {{-- reset --}}
                              <button id="resetBtn" name="" class="btn btn-primary col-sm-3 text-center btn-lg btn-block center-button" style="margin-top: 0px;"  type="reset">Reset</button>
                           </div>
                        </form>
                        {{-- ------------------------------------------------- form ------------------------------------------------------ --}}
                     </div>
                  </div>
                  
               </div>
               
               {{-- - Manage Account Tablink - --}}
               
               <div id="manage" class="tabcontent">
                  <div class="row ">
                     <div class="col-sm-12 pl-3 ">
                        <form id="manage_account_form">
                           <div class="row">
                              <div class="col-sm-6">
                                 <input type="hidden" name="id" id="manage_account_id" value="" >
                                 <div class="form-group row">
                                    {{-- Username --}}
                                    <label for="manage_account_username"  class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control"  name="manage_account_username" id="manage_account_username" placeholder="Select User" value="" readonly>
                                       <span class="text-danger error_text manage_account_username_error"></span>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    {{-- Current Password --}}
                                    <label for="manage_account_current_password" class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                       <input type="password" class="form-control" name="manage_account_current_password" id="manage_account_current_password" placeholder="Enter Current Password" value="" >
                                       <span class="text-danger error_text manage_account_current_password_error"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 {{-- New Password --}}
                                 <div class="form-group row">
                                    <label for="manage_account_new_password" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                       <input type="password" name="manage_account_new_password" class="form-control" id="manage_account_new_password" placeholder="Enter New Password" value="">
                                       <span class="text-danger error_text manage_account_new_password_error"></span>
                                    </div>
                                 </div>
                                 {{-- Confirm Password --}}
                                 <div class="form-group row">
                                    <label for="manage_account_confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                       <input type="password" name="manage_account_confirm_password" class="form-control" id="manage_account_confirm_password" placeholder="Confirm Password" value="">
                                       <span class="text-danger error_text manage_account_confirm_password_error"></span>
                                    </div>
                                 </div>
                                 
                                 <div class="col-sm-12 pl-0 pr-0  ">
                                    <div class="form-group text-right ">
                                       <button type="submit" id="changepasswordBtn"class="btn btn-success account-button " disabled><b>Change Password</b></button>
                                       
                                       
                                    </div>
                                 </div>
                              </div>
                              
                           </div>
                        </form>
                        <div class="border-buttom border-bot pl-3 pr-3">
                        </div>
                        
                        
                        <div class="col-sm-12 overflow-auto  pt-2">
                           
                           
                           
                           <table id="manage-account-table" class="datatable-element table dataTables_info resident table-striped jambo_table bulk_action text-center border" >
                              <thead>
                                 <tr class="headings">
                                    <th class="column-title">Action</th>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Last Name</th>
                                    <th class="column-title">First Name </th>
                                    <th class="column-title">Username</th>
                                    <th class="column-title">Email</th>
                                    <th class="column-title">Password</th>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                              
                           </tbody>
                        </table>
                        
                     </div>
                     
                     
                     
                  </div>
               </div>
            </div>
            
            {{-- - Session History Tablink - --}}
            
            <div id="session" class="tabcontent">
               <div class="topnav navbar ">
                  <button class="btn btn-primary text-white " href="#home">Clear</button>
                  <div class="search-container">
                     
                     <input class="global_filter" type="text" id="global_filter"   placeholder="Search..." name="search">
                     <button type="submit"><i class="fa fa-search"></i></button>
                     
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     
                     
                     
                     <div class="col-sm-12 overflow-auto pt-3 ">
                        
                        
                        
                        
                        
                        <table id="resident" class="dataTables_info table datatable-element  resident table-striped jambo_table bulk_action text-center border">
                           <thead>
                              <tr class="headings">
                                 <th class="column-title" hidden >session_id </th>
                                 <th class="column-title" hidden >user_id </th>
                                 <th class="column-title">Username </th>
                                 <th class="column-title">Login At </th>
                                 
                                 
                              </th>
                              <th class="bulk-actions" hidden colspan="7">
                                 <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           
                           
                           {{-- @if(count($sessions) > 0)
                              @foreach ($sessions as $sessions)
                              
                              
                              
                              <tr class="even pointer">
                                 <td class=" " hidden>{{ $sessions->session_id }}</td>
                                 <td class=" " hidden>{{ $sessions->user_id }}</td>
                                 <td class=" ">{{ $sessions->username }} </td>
                                 <td class=" ">{{ $sessions->created_at }}</td>
                              </tr>
                              @endforeach
                              @endif --}}
                              
                           </tbody>
                        </table>
                        
                     </div>
                  </div>
                  
               </div>
            </div>
            
            
         </div>
      </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      
      <script type="text/javascript">
         $(function() {
            
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            
            //Table on Manage Account
            var table = $("#manage-account-table").DataTable({
               processing: true,
               dom: 'lrtip',
               serverSide: true,
               ajax: "{{ route('account.index') }}",
               columns: [
               {data: 'action', name: 'action', orderable: false, searchable: false},
               {data: 'account_id', name: 'account_id'},
               {data: 'first_name', name: 'create_account_form_firstname'},
               {data: 'last_name', name: 'create_account_form_lastname'},
               {data: 'username', name: 'create_account_form_username'},
               {data: 'email', name: 'create_account_form_email'},
               {data: 'password', name: 'create_account_form_password'},
               ]
               
            });
            
            //Select Button
            $('body').on('click', '#selectBtn', function () {
               var id = $(this).data('id');
               var username = $(this).data('username');
               $("#changepasswordBtn").removeAttr("disabled");
               
               
               $("#manage_account_id").val(id);

               $("#manage_account_username").val(username);
            });
            
            //Edit
            $('#manage_account_form').on('submit', function (e) {
               e.preventDefault();
               var id = $("#manage_account_id").val();
               alert($("#manage_account_id").val());
               
               $.ajax({
                  type: "PATCH",
                  url: "{{ route('account.index') }}"+'/'+id,
                  data: $('#manage_account_form').serialize(),
                  dataType: 'json',
                  
                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },
                  
                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $("#manage_account_form")[0].reset();
                        $("#changepasswordBtn").attr("disabled", true);
                        alert(data.msg);
                        table.draw();
                     }
                  }
                  
               });
            });
            
            //Delete
            $('body').on('click', '#deleteBtn', function () {
               
               var id = $(this).data("id");
               
               if(confirm("Are You sure want to delete !")){
                  $.ajax({
                     type: "DELETE",
                     url: "{{ route('account.index') }}"+'/'+id,
                     
                     success: function (data) {
                        table.draw();
                     },
                     error: function (data) {
                        console.log('Error:', data);
                     }
                  });
               }
               
               
            });
            
            //Create Account
            $("#create_account_form").on('submit', function (e) { 
               e.preventDefault();
               
               $.ajax({
                  type:"post",
                  url:"{{ route('account.store') }}",
                  data:new FormData(this),
                  dataType:"json",
                  processData:false,
                  contentType:false,
                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },
                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $("#create_account_form")[0].reset();
                        alert(data.msg);
                        table.draw();
                     }
                  }
               });
               
            });

            //Create Account Reset Button
            $("#resetBtn").click(function (e) { 
               $(document).find('span.error_text').text('');
            });
            
         });
      </script>
      @endsection
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
