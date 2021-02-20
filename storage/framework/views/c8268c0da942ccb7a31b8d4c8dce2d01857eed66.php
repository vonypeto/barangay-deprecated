

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <link href=" <?php echo e(URL::asset('css/app.css')); ?>" rel="stylesheet">
      <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
      <script type="text/javascript" src=" <?php echo e(URL::asset('js/app.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(URL::asset('js/pagination.js')); ?>"></script>
       <script type="text/javascript" src="<?php echo e(URL::asset('js/pagination.min.js')); ?>"></script>

 <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>





      <script type="text/javascript" src="<?php echo e(URL::asset('js/custom.js')); ?>"></script>
   </head>
   <body>
      <div class="d-flex overflow-auto" id="wrapper">
         <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <div id="page-content-wrapper">
            <?php echo $__env->make('inc.top_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-fluid main-body" id="body">
               <?php echo $__env->yieldContent('content'); ?>
            </div>
         </div>
      </div>
   </body>

</html>
<?php /**PATH /opt/lampp/htdocs/Barangay/resources/views/layouts/apps.blade.php ENDPATH**/ ?>