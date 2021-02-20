


@extends('layouts.apps')
@section('content')

<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Dashboard</h1>
</div>
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 pt-2 text-white" >
<div class="row pl-4 pr-4   ">
   <div class="col-sm-3 form-group text-center dashboard-box">
      <h5 class="mb-3" >Registered Population</h5>
      <h1 class="mb-0">1</h1>
   </div>
   <div class="col-sm-2 form-group text-center dashboard-box">
      <h5 class="mb-3" >Males</h5>
      <h1 class="mb-0">1</h1>
   </div>
   <div class="col-sm-2 form-group text-center dashboard-box">
      <h5 class="mb-3">List of Request</h5>
      <h1 class="mb-0">1</h1>
   </div>
   <div class="col-sm-2 form-group text-center dashboard-box">
      <h5 class="mb-3" >Females</h5>
      <h1 class="">1</h1>
   </div>
   <div class="col-sm-3 form-group text-center dashboard-box">
      <h5 class="mb-3" >Registered Voter</h5>
      <h1 class="">1</h1>
   </div>
   <div class="col-sm-12 border border-bot ">
   </div>
</div>
<div class="row pt-4 pl-4 pr-4">
   <div class="col-sm-8">
      <div class="table-responsive border">
         <div class="col-sm-12 bg-dark text-white pt-2 pb-2 text-left dashboard-margin" >
            <h3 class="mb-0"><b>Barangay  Current Member</b></h3>
         </div>
         <table class="table table-striped jambo_table bulk_action text-center">
            <thead>
               <tr class="headings">
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
                  <td class=" ">121000040</td>
                  <td class=" ">May 23, 2014 11:47:56 PM </td>
                  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                  </td>
               </tr>
               <tr class="odd pointer">
                  <td class=" ">121000039</td>
                  <td class=" ">May 23, 2014 11:30:12 PM</td>
                  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                  </td>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="col-sm-4">
      <div class="table-responsive border text-center">
         <div class="col-sm-12 bg-dark text-white pt-2 pb-2 text-left" >
            <h3 class="mb-0"><b>Areas/Puroks</b></h3>
         </div>
         <table class="table table-striped jambo_table ">
            <thead>
               <tr class="headings">
                  <th class="column-title">Area </th>
                  <th class="column-title">People </th>
               </tr>
            </thead>
            <tbody>
               <tr class="even pointer">
                  <td class=" ">121000040</td>
                  <td class=" ">May 23, 2014 11:47:56 PM </td>
                  </td>
               </tr>
               <tr class="odd pointer">
                  <td class=" ">121000039</td>
                  <td class=" ">May 23, 2014 11:30:12 PM</td>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection

