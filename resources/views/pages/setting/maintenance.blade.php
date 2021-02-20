

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Barangay Setting</h1>
</div>
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
<div class="col-sm-12 pl-0 pr-0 search-bars" >
<!----------------
   EDIT HERE
   ---------------->

<div class="tab-nav ">
   <button class="tablinks active" onclick="schedules(event, 'schedule') ">Official Committe</button>
   <button class="tablinks" onclick="schedules(event, 'barangay')">Barangay Details</button>
   <button class="tablinks" onclick="schedules(event, 'purok')">Region/Area</button>

</div>




<div id="schedule" class="tabcontent">
   <div class="row">
      <div class="col-sm-12">
         <div class="col-sm-12 overflow-auto pt-3 ">
            <table id="official" class="dataTables_info table datatable-element  resident table-striped jambo_table bulk_action text-center border">
               <thead>
                  <tr class="headings">
                     <th hidden class="column-title">ID</th>
                     <th class="column-title">Name </th>
                     <th class="column-title">Position </th>
                     <th class="column-title">Official Committe </th>

                     <th class="column-title" > Year of Service    </th>
                      <th class="column-title">Action</th>
                     <th class="bulk-actions" hidden colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                     </th>
                  </tr>
               </thead>
               <tbody>
        @if(count($brgy_officials) > 0)
            @foreach($brgy_officials as $brgy_officials)
                  <tr class="even pointer">
                    <td hidden class=" ">{{ $brgy_officials->official_id}}</td>
                    <td class=" ">{{ $brgy_officials->name }}</td>
                    <td class=" ">{{ $brgy_officials->position }} </td>
                    <td class=" ">{{ $brgy_officials->official_committe }}</td> </td>
                    <td class=" ">{{ $brgy_officials->year_of_service }} Years</td>
                    <td class=" pt-1 pb-1">
                       <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i>  </a>
                       <a href="#" class="btn btn-danger btn-xs pr-4 pl-4"><i class="fa fa-times fa-lg"></i>  </a>
                    </td>
                 </tr>
                @endforeach


            @endif
            @if(count($official_empty) > 0)

            @foreach ($official_empty as $official_empty)

            @endforeach
            <tr class="odd pointer">
                <td  hidden class=" ">{{ $official_empty->official_id + 1}}</td>
                <td class=" "></td>
                <td class=" "> </td>
                <td class=" "> </td>
                <td class=" "></td>
                <td class=" pt-1 pb-1">
                   <a href="#" class="btn btn-success btn-xs pr-4 pl-4"><i class="fa fa-plus fa-lg"></i>  </a>
                </td>
             </tr>


             @endif
















               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>






<div id="barangay" class="tabcontent">
   <div class="row">
      <div class="col-sm-6">
         <div class="col-sm-12 overflow-auto pt-3 ">
            <div class="row">
               <div class="col-md-12 order-md-1  pt-4" >
                  <form class="needs-validation" novalidate="">
                     <div class="mb-3">
                        <label for="email">Barangay Logo </label>
                        <input id="profile_image" type="file" class="form-control" class="text-center" name="profile_image" style="padding: 0px !important">
                        <div class="invalid-feedback">
                           Invalid Logo or no image
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="brgy">Barangay Name <span class="text-muted">(Optional)</span></label>
                        <input  class="form-control" id="brgy_name" placeholder="Ex: Barangay San Guillermo">
                        <div class="invalid-feedback">
                           Input Field Required
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="City">City </label>
                        <input type="text" class="form-control" id="address" placeholder="Ex: Morong" required="">
                        <div class="invalid-feedback">
                           Input Field Required
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="Province">Province </label>
                        <input type="text" class="form-control" id="address" placeholder="Ex: Rizal" required="">
                        <div class="invalid-feedback">
                           Input Field Required
                        </div>
                     </div>
                     <div class="text-center button-center d-flex justify-content-center">
                        <button class="btn btn-success col-sm-3 text-center btn-lg btn-block" type="submit">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>









<div id="purok" class="tabcontent">
   <div class="row">
      <div class="col-sm-12">
         <div class="col-sm-12 overflow-auto pt-3 ">
            <table id="region" class="dataTables_info table datatable-element  resident table-striped jambo_table bulk_action text-center border">
               <thead>
                  <tr class="headings">
                     <th hidden class="column-title">ID</th>
                     <th class="column-title">Area </th>
                     <th class="column-title">Population </th>



                      <th class="column-title">Action</th>
                     <th class="bulk-actions" hidden colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                     </th>
                  </tr>
               </thead>
               <tbody>
                @if(count($area_setting) > 0)
                    @foreach ($area_setting as $area_setting)


                  <tr class="even pointer">
                     <td hidden class=" ">{{ $area_setting->area_id }}</td>
                     <td class=" ">{{ $area_setting->area }}</td>
                     <td class=" ">{{ $area_setting->population }} </td>

                     <td class=" pt-1 pb-1">
                        <a href="#" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-pencil fa-lg"></i>  </a>
                        <a href="#" class="btn btn-danger btn-xs pr-4 pl-4"><i class="fa fa-times fa-lg"></i>  </a>
                     </td>
                  </tr>


                    @endforeach
                  @endif

                  @if(count($area_empty) > 0)
                  @foreach ($area_empty as $area_empty)

                  <tr class="odd pointer">
                     <td  hidden class=" ">{{ $area_empty->area_id +1 }}</td>
                     <td contenteditable="true" class=" "></td>
                     <td class=" " ></td>

                     <td class=" pt-1 pb-1">
                        <a href="#" class="btn btn-success btn-xs pr-4 pl-4"><i class="fa fa-plus fa-lg"></i>  </a>
                     </td>
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

</div>
@endsection
