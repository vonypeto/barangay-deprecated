<?php $__env->startSection('content'); ?>
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


                    <?php if(count($schedule) > 0): ?>
                    <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" "><?php echo e($schedule->blotter_id); ?></td>

                      <td class=" "><?php echo e(Carbon\Carbon::parse($schedule->date_reported)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($schedule->time_reported)->toTimeString()); ?></td>
                      <td class=" "><?php echo e($schedule->incident_type); ?></td>
                      <td class=" "><?php echo e(Carbon\Carbon::parse($schedule->date_incident)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($schedule->time_incident)->toTimeString()); ?></td>

                   </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>

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


                    <?php if(count($unschedule) > 0): ?>
                    <?php $__currentLoopData = $unschedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unschedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" "><?php echo e($unschedule->blotter_id); ?></td>

                      <td class=" "><?php echo e(Carbon\Carbon::parse($unschedule->date_reported)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($unschedule->time_reported)->toTimeString()); ?></td>
                      <td class=" "><?php echo e($unschedule->incident_type); ?></td>
                      <td class=" "><?php echo e(Carbon\Carbon::parse($unschedule->date_incident)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($unschedule->time_incident)->toTimeString()); ?></td>

                   </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>

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


                    <?php if(count($today) > 0): ?>
                    <?php $__currentLoopData = $today; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $today): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" "><?php echo e($today->blotter_id); ?></td>

                      <td class=" "><?php echo e(Carbon\Carbon::parse($today->date_reported)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($today->time_reported)->toTimeString()); ?></td>
                      <td class=" "><?php echo e($today->incident_type); ?></td>
                      <td class=" "><?php echo e(Carbon\Carbon::parse($today->date_incident)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($today->time_incident)->toTimeString()); ?></td>

                   </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>

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


                    <?php if(count($settled) > 0): ?>
                    <?php $__currentLoopData = $settled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                   <tr class="odd pointer">
                      <td class=" pt-1 pb-1">
                         <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                           </td>
                      <td class=" "><?php echo e($settled->blotter_id); ?></td>

                      <td class=" "><?php echo e(Carbon\Carbon::parse($settled->date_reported)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($settled->time_reported)->toTimeString()); ?></td>
                      <td class=" "><?php echo e($settled->incident_type); ?></td>
                      <td class=" "><?php echo e(Carbon\Carbon::parse($settled->date_incident)->toDateString()); ?></td>
                      <td class=" "> <?php echo e(Carbon\Carbon::parse($settled->time_incident)->toTimeString()); ?></td>

                   </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>

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
<h1 class="num-align text-center"><b>1</b></h1>
</div>

<div class="alert alert-success alert-size border border-secondary " role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Scheduled Cases</b></h6>
<h1 class="num-align text-center"><b>1</b></h1>
</div>
<div class="alert alert-danger alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Unsettled Cases</b></h6>
<h1 class="num-align text-center"><b>1</b></h1>
</div>
<div class="alert alert-warning alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Unscheduled Cases</b></h6>
<h1 class="num-align text-center"><b>1</b></h1>
</div>

 </div>














</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Barangay/resources/views/pages/schedule.blade.php ENDPATH**/ ?>