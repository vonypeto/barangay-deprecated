

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Settlement Schedule</h1>
</div>
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="row " >
      <div class="col-sm-10 pl-3 pr-0 search-bars" >
         <!----------------
            EDIT HERE
            ---------------->
         <div class="tab-nav ">
            <button class="tablinks active" onclick="schedules(event, 'schedule') ">Scheduled Settlements</button>
            <button class="tablinks" onclick="schedules(event, 'unschedule')">Unscheduled Settlements</button>
            <button class="tablinks" onclick="schedules(event, 'schedule_today')">Schedules Today</button>
            <button class="tablinks" onclick="schedules(event, 'case')">Settled Cases</button>
         </div>
         <div class="topnav navbar-schedule display-flex-nav">
              <div class="search-container ">

                  <input class="global_filter "  id="global_filter" type="text" placeholder="Search..." name="search">
                  <button type="submit"><i class="fa fa-search"></i></button>

            </div>
         </div>

         <div class="modal fade" id="viewscheduledata" name="viewscheduledata" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="viewmodelHeading"></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
         
                  <div class="modal-body">
                     <h6 id="blotterid_schedule"></h6>
                     <h6 id="schedule_data"></h6>
                     <h4>List of Person Involves</h4>
                     <div class="divv"></div>

                     <table id="blotter_list-table" class="bulk_action dataTables_info table datatable-element table-striped jambo_table bulk_action text-center border no-footer">
                        <thead>
                           <tr class="headings">
                              <th class="column-title">Resident Id</th>
                              <th class="column-title">FullName</th>
                              <th class="column-title">Involvement Type</th>
                              <th class="bulk-actions" hidden colspan="7">
                                 <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                           </tr>
                        </thead>
                        <tbody class="blotter-list-data">
              

                        </tbody>
                     </table>

                 
                  </div>
         
                  <div class="modal-footer text-white">
                  </div>
               </div>
            </div>
         </div>





         <div id="schedule" class="tabcontent">







            <table id="table_schedule" class="table dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

                      <th class="column-title">Date Recorded </th>
                      <th class="column-title">Time Recorded  </th>
                      <th class="column-title">Incident Type </th>
                      <th class="column-title">Incident Date </th>
                      <th class="column-title">Incident Time</th>

                      <th class="bulk-actions" hidden colspan="7">
                         <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                   </tr>
                </thead>
                <tbody>


                    @if(count($schedule) > 0)
                    @foreach ($schedule as $schedule)


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" data-id="{{ $schedule->blotter_id }}" class="btn btn-primary btn-xs pr-4 pl-4 viewSchedule"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" ">{{ $schedule->blotter_id }}</td>

                      <td class=" ">{{ Carbon\Carbon::parse($schedule->date_reported)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($schedule->time_reported)->toTimeString() }}</td>
                      <td class=" ">{{ $schedule->incident_type }}</td>
                      <td class=" ">{{ Carbon\Carbon::parse($schedule->date_incident)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($schedule->time_incident)->toTimeString() }}</td>

                   </tr>
                   @endforeach
                   @endif

                </tbody>
             </table>


         </div>















         <div id="unschedule" class="tabcontent">






            <table id="table_unschedule" class="table dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

                      <th class="column-title">Date Recorded </th>
                      <th class="column-title">Time Recorded  </th>
                      <th class="column-title">Incident Type </th>
                      <th class="column-title">Incident Date </th>
                      <th class="column-title">Incident Time</th>

                      <th class="bulk-actions" hidden colspan="7">
                         <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                   </tr>
                </thead>
                <tbody>


                    @if(count($unschedule) > 0)
                    @foreach ($unschedule as $unschedule)


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" data-id="{{ $unschedule->blotter_id }}" class="btn btn-primary btn-xs pr-4 pl-4 viewSchedule"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" ">{{ $unschedule->blotter_id }}</td>

                      <td class=" ">{{ Carbon\Carbon::parse($unschedule->date_reported)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($unschedule->time_reported)->toTimeString() }}</td>
                      <td class=" ">{{ $unschedule->incident_type }}</td>
                      <td class=" ">{{ Carbon\Carbon::parse($unschedule->date_incident)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($unschedule->time_incident)->toTimeString() }}</td>

                   </tr>
                   @endforeach
                   @endif

                </tbody>
             </table>













         </div>








         <div id="schedule_today" class="tabcontent">





            <table id="table_today" class="table dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

                      <th class="column-title">Date Recorded </th>
                      <th class="column-title">Time Recorded  </th>
                      <th class="column-title">Incident Type </th>
                      <th class="column-title">Incident Date </th>
                      <th class="column-title">Incident Time</th>

                      <th class="bulk-actions" hidden colspan="7">
                         <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                   </tr>
                </thead>
                <tbody>


                    @if(count($today) > 0)
                    @foreach ($today as $today)


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" data-id="{{ $today->blotter_id }}" class="btn btn-primary btn-xs pr-4 pl-4 viewSchedule"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" ">{{ $today->blotter_id }}</td>

                      <td class=" ">{{ Carbon\Carbon::parse($today->date_reported)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($today->time_reported)->toTimeString() }}</td>
                      <td class=" ">{{ $today->incident_type }}</td>
                      <td class=" ">{{ Carbon\Carbon::parse($today->date_incident)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($today->time_incident)->toTimeString() }}</td>

                   </tr>
                   @endforeach
                   @endif

                </tbody>
             </table>









         </div>















         <div id="case" class="tabcontent">










            <table id="settled" class="table dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

                      <th class="column-title">Date Recorded </th>
                      <th class="column-title">Time Recorded  </th>
                      <th class="column-title">Incident Type </th>
                      <th class="column-title">Incident Date </th>
                      <th class="column-title">Incident Time</th>

                      <th class="bulk-actions" hidden colspan="7">
                         <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                   </tr>
                </thead>
                <tbody>


                    @if(count($settled) > 0)
                    @foreach ($settled as $settled)


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" data-id="{{ $settled->blotter_id }}" class="btn btn-primary btn-xs pr-4 pl-4 viewSchedule"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" ">{{ $settled->blotter_id }}</td>

                      <td class=" ">{{ Carbon\Carbon::parse($settled->date_reported)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($settled->time_reported)->toTimeString() }}</td>
                      <td class=" ">{{ $settled->incident_type }}</td>
                      <td class=" ">{{ Carbon\Carbon::parse($settled->date_incident)->toDateString() }}</td>
                      <td class=" "> {{ Carbon\Carbon::parse($settled->time_incident)->toTimeString() }}</td>

                   </tr>
                   @endforeach
                   @endif

                </tbody>
             </table>









         </div>
      </div>


 <!----------------

 NAKA PADDING ITO PAKI CENTER ALIGN
 --->





 <div class="col-sm-2 pl-2 pr-4 pt-2 pd-1 " >
    <div class="alert alert-primary alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center "><b>Settled Cases</b></h6>
<h1 class="num-align text-center"><b>{{ $settledCount }}</b></h1>
</div>

<div class="alert alert-success alert-size border border-secondary " role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Scheduled Cases</b></h6>
<h1 class="num-align text-center"><b>{{ $scheduleCount }}</b></h1>
</div>
<div class="alert alert-danger alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Unsettled Cases</b></h6>
<h1 class="num-align text-center"><b>{{ $scheduleCount + $unscheduleCount }}</b></h1>
</div>
<div class="alert alert-warning alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Unscheduled Cases</b></h6>
<h1 class="num-align text-center"><b>{{$unscheduleCount }}</b></h1>


<script type="text/javascript">

   $(function () {

      $('body').on('click', '.viewSchedule', function() {
        var blotter_id = $(this).data('id');

        $.get("{{ route('schedules.index') }}" +'/' + blotter_id +'/edit', function (data) {
         $('#viewscheduledata').modal('show');
         $('#viewmodelHeading').html("View Schedule");
         $('#blotterid_schedule').html("BLotter ID " + data[0].blotter_id);
         $('#schedule_data').html("Schedule Date: " + data[0].schedule_date);

         var len = data[1].length;
         var tbody = ' <tbody class="blotter-list-data"></tbody>';
         if(len > 0){
            $('.blotter-list-data').remove();
            $('#blotter_list-table').append(tbody);
            for(var i = 0; i <len;i++){
               var resident_id = data[1][i].resident_id;
               var person_involve = data[1][i].person_involve;
               var involvement_type = data[1][i].involvement_type;
               var tr = '<tr>'
               +'<td>'+ resident_id +'</td>'+
               '<td>'+ person_involve +'</td>'+
               '<td>'+ involvement_type +'</td>'+
               '</tr>'
             $('.blotter-list-data').append(tr);
            }
         }
         else{
            console.log("No BLotter Data Available");
         }
               });

        });

   });

</script>
</div>

 </div>














</div>
</div>

@endsection

