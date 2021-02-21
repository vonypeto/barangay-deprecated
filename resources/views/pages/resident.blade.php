@extends('layouts.apps')

@section('content')
    <div class="col-sm-12 text-left ">
    <h1 class="border-bottom border-bot pt-3">Resident Information</h1>
    </div>
    <div class="Resident-Content main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
        <div class="col-sm-12 pl-0 pr-0 search-bars" >

 <!----------------
    EDIT HERE
 ---------------->


        <div class="topnav navbar navbar">
  <button class="btn btn-success text-white " href="#home">New Resident <i class="fa fa-plus"></i></button>

  <div class="search-container">
    <form action="/action_page.php">
      <input class="global_filter" type="text" id="global_filter" placeholder="Search..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>




















<div class=" col-sm-12 text-left h-100  pr-0 pl-0 pt-2 pb-2 text-white" >
   <div class="row pl-4 pr-4   ">
      <div class="col-sm-12 border border-bot ">
      </div>
   </div>
   <div class="row pt-4 pl-4 pr-4">
      <div class=" col-sm-12 overflow-auto display-nones ">




  <table id="resident" class="dataTables_info table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer">
            <thead>
               <tr class="headings">
                <th class="column-title" hidden>Resident_ID</th>
                  <th class="column-title">Action</th>
                  <th class="column-title">Last Name </th>
                  <th class="column-title">First Name </th>
                  <th class="column-title">Middle Name </th>
                  <th class="column-title">Alias</th>
                  <th class="column-title">Civil Status</th>
                  <th class="column-title">Mobile No.</th>
                  <th class="column-title">Birthday</th>
                  <th class="column-title">Gender</th>
                  <th class="column-title">Voter Status</th>

                  </th>
                  <th class="bulk-actions" hidden colspan="7">
                     <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
               </tr>
            </thead>
            <tbody>


                @if(count($resident_info))
                @foreach($resident_info as $resident_info)
               <tr class="even pointer">
                <td class=" " hidden >{{ $resident_info->resident_id }}</td>
                  <td class=" pt-1 pb-1">
                     <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                     <a href="#" class="btn btn-info btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i> </a>
                  </td>
                  <td class=" ">{{ $resident_info->lastname }}</td>
                  <td class=" ">{{ $resident_info->firstname }}</td>
                  <td class=" ">{{ $resident_info->middlename }}</td>
                  <td class=" ">{{ $resident_info->alias }}</td>
                  <td class=" ">{{ $resident_info->civilstatus }}</td>
                  <td class=" ">{{ $resident_info->mobile_no }}</td>
                  <td class=" ">{{ $resident_info->birthday }}</td>
                  <td class=" ">{{ $resident_info->gender }}</td>
                  <td class=" ">{{ $resident_info->voterstatus }}</td>
               </tr>
               @endforeach


               @endif


            </tbody>
         </table>












      </div>
   </div>
</div>
















        </div>
    </div>
@endsection



<!----------------------------------------------------------------

<td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>


--->
