@extends('layouts.apps')

@section('content')
    <div class="col-sm-12 text-left ">
    <h1 class="border-bottom border-bot pt-3">Blotters Record</h1>
    </div>
    <div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
        <div class="col-sm-12 pl-0 pr-0 search-bars" >

 <!----------------
    EDIT HERE
 ---------------->


        <div class="topnav navbar navbar">
  <button class="btn btn-success text-white " href="#home" data-toggle="modal" data-target="#blottermodal" id="createNewBlotter">New Blotter Record <i class="fa fa-plus"></i></button>

  <div class="modal fade" id="blottermodal" name="blottermodal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modelHeading"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <form id="blotterform"  name="blotterform" class="modal-input">
               {{ csrf_field() }}
               <input type="hidden" name="blotter_id" id="blotter_id">

               <label for="incident_narrative">Incident Narrative</label>
               <textarea name="incident_narrative" id="incident_narrative" cols="30" rows="10"></textarea>
               <button type="submit" id="saveBtn">Save New Blotters</button>
            </form>
         </div>

         <div class="modal-footer text-white">
         </div>
      </div>
   </div>
</div>



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




  <table id="resident" class="dataTables_info table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer data-table">
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
            </tbody>
         </table>

         <script type="text/javascript">

            $(function () {
                  $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
               });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('blotters.index') }}",
                columns: [
                  //   {data: 'incident_narrative', name: 'incident_narrative'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'blotter_id', name: 'blotter_id'}
                ]
            });
             $('#createNewBlotter').click(function () {
                 $('#saveBtn').val("create-blotter");
                 $('#blotter_id').val('');
                 $('#blotterform').trigger("reset");
                 $('#modelHeading').html("Create New Blotter");
                 $('#blottermodal').modal('show');
             });

             $('body').on('click', '.editBlotter', function () {
               var blotter_id = $(this).data('id');
               $.get("{{ route('blotters.index') }}" +'/' + blotter_id +'/edit', function (data) {
                  $('#modelHeading').html("Edit Blotters");
                  $('#saveBtn').val("edit-blotter");
                  $('#blottermodal').modal('show');
                  $('#blotter_id').val(data.blotter_id);
                  $('#incident_narrative').val(data.incident_narrative);
               })
            });
         
             $('#saveBtn').click(function (e) {
                e.preventDefault();
               //  $(this).html('Save');
            
                $.ajax({
                  data: $('#blotterform').serialize(),
                  url: "{{ route('blotters.store') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
             
                      $('#blotterform').trigger("reset");
                      $('#blottermodal').modal('hide');
                      table.draw();
                 
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      $('#saveBtn').html('Save Changes');
                  }
              });
            });

            $('body').on('click', '.deleteBlotter', function () {
            
            var blotter_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            
            $.ajax({
                  type: "DELETE",
                  url: "{{ route('blotters.store') }}"+'/'+blotter_id,
                  success: function (data) {
                     table.draw();
                  },
                  error: function (data) {
                     console.log('Error:', data);
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


