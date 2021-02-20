<?php $__env->startSection('content'); ?>
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Account</h1>
</div>
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
<div class="col-sm-12 pl-0 pr-0 search-bars" >
<!----------------
   EDIT HERE
   ---------------->
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
<div class="row row-heights" >
<div class="col-sm-12 pl-3 pr-3 search-bars" >
<!----------------
   EDIT HERE
   ---------------->
<div class="tab-nav ">
   <button class="tablinks active" onclick="schedules(event, 'create') ">Official Committe</button>
   <button class="tablinks" onclick="schedules(event, 'manage')">Barangay Setting</button>
   <button class="tablinks" onclick="schedules(event, 'test')">Region/Area</button>
 
</div>



<div id="test" class="tabcontent">
   <div class="topnav navbar ">
      <button class="btn btn-primary text-white " href="#home">Clear</button>
      <div class="search-container">
         <form action="/action_page.php">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
         </form>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         TABLE
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Barangay/resources/views/pages/maintenance.blade.php ENDPATH**/ ?>