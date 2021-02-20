<?php $__env->startSection('content'); ?>
    <div class="col-sm-12 text-left ">
    <h1 class="border-bottom border-bot pt-3">Blotters Record</h1>
    </div>
    <div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
        <div class="col-sm-12 pl-0 pr-0 search-bars" >

 <!----------------
    EDIT HERE
 ---------------->


        <div class="topnav navbar navbar">
  <button class="btn btn-success text-white " href="#home">New Blotter Record <i class="fa fa-plus"></i></button>

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
      <div class="col-sm-12 overflow-auto">




  <table id="resident" class="table dataTables_info resident table-striped jambo_table bulk_action text-center border">
            <thead>
               <tr class="headings">
                  <th class="column-title">Action</th>
                  <th class="column-title">Blotter Id </th>
                  <th class="column-title">BlotterStatus </th>
                  <th class="column-title">Date Recorded </th>
                  <th class="column-title">Time Recorded  </th>
                  <th class="column-title">Incident Type </th>
                  <th class="column-title">Incident Date </th>
                  <th class="column-title">Incident Time</th>
                  </th>
                  <th class="bulk-actions" hidden colspan="7">
                     <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
               </tr>
            </thead>
            <tbody>


                <?php if(count($blotter)): ?>
                <?php $__currentLoopData = $blotter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blotter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


               <tr class="odd pointer">
                  <td class=" pt-1 pb-1">
                     <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i>  </a>
                       </td>
                  <td class=" "><?php echo e($blotter->blotter_id); ?></td>
                  <td class=" "><?php echo e($blotter->status); ?></td>
                  <td class=" "><?php echo e(Carbon\Carbon::parse($blotter->date_reported)->toDateString()); ?></td>
                  <td class=" "> <?php echo e(Carbon\Carbon::parse($blotter->time_reported)->toTimeString()); ?></td>
                  <td class=" "><?php echo e($blotter->incident_type); ?></td>
                  <td class=" "><?php echo e(Carbon\Carbon::parse($blotter->date_incident)->toDateString()); ?></td>
                  <td class=" "> <?php echo e(Carbon\Carbon::parse($blotter->time_incident)->toTimeString()); ?></td>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>

            </tbody>
         </table>












      </div>
   </div>
</div>













    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Barangay/resources/views/pages/blotter.blade.php ENDPATH**/ ?>