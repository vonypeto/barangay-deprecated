

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

<div class="tab-nav ">
    <button class="tablinks active" onclick="schedules(event, 'schedule')">Account Setting</button>
   <button class="tablinks " onclick="schedules(event, 'create') ">Create Account</button>
   <button class="tablinks" onclick="schedules(event, 'manage')">Manage Account</button>
   <button class="tablinks" onclick="schedules(event, 'session')">Session History</button>

</div>








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







<div id="create" class="tabcontent">

      <div class="row">
      <div class="col-md-12 order-md-1 d-flex justify-content-center pt-4" >
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
      </div>
   </div>

</div>




<div id="manage" class="tabcontent">
   <div class="row ">
      <div class="col-sm-12 pl-3 ">
         <form>
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
                     <div class="col-sm-9">
                        <input type="text" y class="form-control" id="staticEmail" placeholder="Username">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Confirm Password</label>
                     <div class="col-sm-9">
                        <input type="text" y class="form-control" id="staticEmail" placeholder="Verify Password">
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group row">
                     <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="New Password">
                     </div>
                  </div>
                  <div class="col-sm-12 pl-0 pr-0  ">
                     <div class="form-group text-right ">
                        <button type="submit" class="btn btn-success account-button "><i class="  fa fa-check "></i><b ></b></button>

                     </div>
                  </div>
               </div>
            </div>
         </form>
         <div class="border-buttom border-bot pl-3 pr-3">
         </div>


      <div class="col-sm-12 overflow-auto  pt-2">






  <table id="manage_account" class="datatable-element table dataTables_info resident table-striped jambo_table bulk_action text-center border" >
            <thead>
               <tr class="headings">
                <th class="column-title" hidden>ID</th>
                  <th class="column-title">Action</th>
                  <th class="column-title"> Last Name</th>
                  <th class="column-title">First Name </th>
                  <th class="column-title">Username</th>
                  <th class="column-title">Email</th>
                  <th class="column-title">Password</th>
                  </th>
                  <th class="bulk-actions" hidden colspan="7">
                     <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
               </tr>
            </thead>
            <tbody>

                account
                @if(count($account) > 0)
                @foreach ($account as $account)


               <tr class="even pointer">
                <td class=" " hidden>{{ $account->account_id }}</td>
                  <td class=" pt-1 pb-1">
                     <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i>  </a>
                 <a href="#" class="btn btn-danger btn-xs pr-4 pl-4"><i class="fa fa-times fa-lg"></i>  </a>
               </td>

                  <td class=" ">{{ $account->last_name }}</td>
                  <td class=" ">{{ $account->first_name }} </td>
                  <td class=" ">{{ $account->username }}</td>
                  <td class=" ">{{ $account->username }}</td>

                  <td class=" ">{{ $account->password }} </td>
               </tr>
               @endforeach
                @endif
            </tbody>
         </table>






      </div>

















      </div>
   </div>
</div>



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


                @if(count($sessions) > 0)
                    @foreach ($sessions as $sessions)



               <tr class="even pointer">
                  <td class=" " hidden>{{ $sessions->session_id }}</td>
                  <td class=" " hidden>{{ $sessions->user_id }}</td>
                  <td class=" ">{{ $sessions->username }} </td>
                  <td class=" ">{{ $sessions->created_at }}</td>
               </tr>
                     @endforeach
               @endif

            </tbody>
         </table>

      </div>
       </div>

      </div>
</div>













   <!----------------










<div class=" col-sm-12 text-left h-100  pr-0 pl-0 pt-2 pb-2 text-white" >
   <div class="row pl-4 pr-4   ">
      <div class="col-sm-12 border border-bot ">
      </div>
   </div>
   <div class="row pt-4 pl-4 pr-4">
      <div class="col-sm-12 overflow-auto">




  <table id="resident" class="table dataTables_info resident table-striped jambo_table bulk_action text-center border">
            <thead>
               <tr class="headings">
                  <th class="column-title">Action</th>
                  <th class="column-title">Name </th>
                  <th class="column-title">Position </th>
                  <th class="column-title">Official Committe </th>
                  </th>
                  <th class="bulk-actions" hidden colspan="7">
                     <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
               </tr>
            </thead>
            <tbody>
               <tr class="even pointer">
                  <td class=" pt-1 pb-1">
                     <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                     <a href="#" class="btn btn-info btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i> </a>
                  </td>
                  <td class=" ">121000040</td>
                  <td class=" ">May 23, 2014 11:47:56 PM </td>
                  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
               </tr>
               <tr class="odd pointer">
                  <td class=" pt-1 pb-1">
                     <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                     <a href="#" class="btn btn-info btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i> </a>
                  </td>
                  <td class=" ">121000039</td>
                  <td class=" ">May 23, 2014 11:30:12 PM</td>
                  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                  </td>
               </tr>
            </tbody>
         </table>












      </div>
   </div>
</div>













      --->




</div>
</div>
@endsection

















