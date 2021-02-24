

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Resident Information</h1>
</div>
<div class="Resident-Content main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >
      <div class="topnav navbar navbar">
         <button id="createresident" class="btn btn-success text-white " data-toggle="modal" data-target="#residentmodal">New Resident <i class="fa fa-plus"></i></button>
         
         
         
         <div class="modal fade" id="residentmodal" name="residentmodal" tabindex="-1" role="dialog" aria-labelledby="resident-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modelHeading"></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>




                  <div class="modal-body">
                     <form id="residentform"  class="modal-input">
                        {{ csrf_field() }}
                        <div class="item form-group">
                           <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 ">
                              <input type="text" id="lastname" name="lastname" required="required" class="form-control ">
                           </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                           <div class="col-md-6 col-sm-6 offset-md-3">
                              <button type="submit" id="submit" class="btn btn-success resident-button">Submit</button>
                              <a class="btn btn-primary" type="button" data-dismiss="modal" style="margin-left: 4px;" >Cancel</a>
                              <input class="btn btn-primary" type="reset" value="Reset">
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="modal-footer text-white">
                  </div>
               </div>
            </div>
         </div>
         <div class="search-container">
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
               <table  class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer">
                  <thead>
                     <tr class="headings">
                     
                        <th class="column-title">Action</th>
                        <th class="column-title">Resident_ID</th>
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
                     </tr>
                  </thead>
                  </tbody>
               </table>
               <script>
                  // global app configuration object
                  var config = {
                      routes: {
                          resident: "{{ route('resident.index') }}",
                          resident_store: "{{ route('resident.store') }}"
                      }
                  };
               </script>
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

