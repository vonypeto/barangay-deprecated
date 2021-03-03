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
         <form class="needs-validation" novalidate="">
            <div class="row">
               <div class="col-md-6 mb-3">
                  <label for="firstName">First name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                     Valid first name is required.
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                     Valid last name is required.
                  </div>
               </div>
            </div>
            <div class="mb-3">
               <label for="username">Username</label>
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="username" placeholder="Username" required="">
                  <div class="invalid-feedback" style="width: 100%;">
                     Your username is required.
                  </div>
               </div>
            </div>
            <div class="mb-3">
               <label for="email">Email <span class="text-muted">(Optional)</span></label>
               <input type="email" class="form-control" id="email" placeholder="you@example.com">
               <div class="invalid-feedback">
                  Please enter a valid email address
               </div>
            </div>
            <div class="mb-3">
               <label for="address">Password</label>
               <input type="text" class="form-control" id="address" placeholder="password" required="">
               <div class="invalid-feedback">
                  Wrong Password
               </div>
            </div>
            <div class="mb-3">
               <label for="address2">Verify Password <span class="text-muted"></span></label>
               <input type="text" class="form-control" id="address2" placeholder="verify password">
               <div class="invalid-feedback">
                  Wrong Password
               </div>
            </div>
            <hr class="mb-4">
            <div class="text-center button-center d-flex justify-content-center">
               <button class="btn btn-success col-sm-3 text-center btn-lg btn-block" type="submit">Submit</button>
               <button class="btn btn-primary col-sm-3 text-center btn-lg btn-block center-button" style="margin-top: 0px;"  type="reset">Reset</button>
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
         <form>
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="username" class="col-sm-3 col-form-label">Username</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" placeholder="Username" value="">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="confirm-password" class="col-sm-3 col-form-label">Confirm Password</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" id="confirm-password" placeholder="Verify Password" value="" >
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="password" class="col-sm-2 col-form-label">Password</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" value="">
                     </div>
                  </div>
                  <div class="col-sm-12 pl-0 pr-0  ">
                     <div class="form-group text-right ">
                        <button type="submit" class="btn btn-success account-button "><i class=" fa fa-check "></i><b></b></button>


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
                <th class="column-title" hidden>ID</th>
                  <th class="column-title">Action</th>
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

     var table = $(".manage-account-table").DataTable({
         processing: true,
         dom: 'lrtip',
         serverSide: true,
         ajax: "{{ route('account.index') }}",
         columns: [
             {data: 'action', name: 'action', orderable: false, searchable: false},
             {data: 'first_name', name: 'firstname'},
             {data: 'last_name', name: 'lastname'},
             {data: 'username', name: 'username'},
             {data: 'email', name: 'email'},
             {data: 'password', name: 'password'},
         ]
         
     });
      
   });
 </script>
@endsection

















