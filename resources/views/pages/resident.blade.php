@extends('layouts.apps')

@section('content')
    <div class="col-sm-12 text-left ">
    <h1 class="border-bottom border-bot pt-3">Resident Information</h1>
    </div>
    <div class="Resident-Content main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
        <div class="col-sm-12 pl-0 pr-0 search-bars" >


        <div class="topnav navbar navbar">
  <button class="btn btn-success text-white " data-toggle="modal" data-target="#residentmodal">New Resident <i class="fa fa-plus"></i></button>


  <script>

    $(document).ready(function(){

        $("#residentform").submit(function(e) {


        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "/resident/add",
          data: $('#residentform').serialize(),
          success: function(response){
            console.log(response)
          //  $('#residentmodal').modal('hide');
            alert("Data Saved");
            $('#residentmodal').modal('hide');

          },
          error: function(error){
          //  $('#residentmodal').modal('hide');
            console.log(error)
            alert("Data Not Saved");
            $('#residentmodal').modal('hide');

          }


        });


      });


    });

















    </script>





















  <div class="modal fade" id="residentmodal" tabindex="-1" role="dialog" aria-labelledby="resident-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">



          <form id="residentform"  class="modal-input">

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" required="required" class="form-control ">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="last-name" name="last-name" required="required" class="form-control">
              </div>
            </div>
            <div class="item form-group">
              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name / Initial</label>
              <div class="col-md-6 col-sm-6 ">
                <input id="middle-name" class="form-control" type="text" name="middle-name">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
              <div class="col-md-6 col-sm-6 ">
                <div id="gender" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
                  </label>
                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="female" class="join-btn"> Female
                  </label>
                </div>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input id="birthday" class="date-picker form-control" required="required" type="text">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">

                <a class="btn btn-primary" type="reset">Reset</a>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>

          </form>







        </div>
        <div class="modal-footer text-white">
            <button class="btn btn-primary" type="button" data-dismiss="modal" >Cancel</button>
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
