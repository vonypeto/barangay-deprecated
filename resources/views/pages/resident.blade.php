

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Resident Information</h1>
</div>
<div class="Resident-Content main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >
      <div class="topnav navbar navbar">
          <div>
         <button id="createresident" class="btn btn-success text-white " data-toggle="modal" data-target="#residentmodal">New Resident <i class="fa fa-plus"></i></button>
         <button id="bulkdelete" class="btn btn-danger text-white " style="margin-left:2px;" > <i class="fa fa-trash"></i></button>
          </div>


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
                        <input type="hidden" name="resident_id" id="resident_id">
                        <div class="row">
                            <div class="col-sm-6">





                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Last Name</label>
                              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Ex: Mata" value="" required="">

                            </div>
                            <div class="col-sm-6 ">
                              <label >First Name</label>
                              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Ex: John Mark" value="" required="">

                            </div>
                          </div>

                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Middle Name</label>
                              <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Ex: Panlilio" value="" required="">

                            </div>
                            <div class="col-sm-6 ">
                              <label >Alias</label>
                              <input type="text" class="form-control" name="alias" id="alias" placeholder="Ex: JM" value="" required="">

                            </div>
                          </div>





                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Birthday</label>
                              <input type="date" id="birthday" name="birthday" required="required" class="form-control ">

                            </div>
                            <div class="col-sm-6 ">
                              <label >Age</label>
                              <br>
                              <select name="age" id="selectAge" style="height:38px">
                                <option value="">-Select Age-</option></select>
                            </div>
                          </div>










                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Birth of Place
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="birthplace" name="birthplace" placeholder="Ex: Morong, Rizal"   required="required" class="form-control ">
                            </div>
                         </div>


                         <div class="item form-group border solid " style="margin-left: 15px;margin-right: 15px;">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gender
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="radio" id="male" name="gender" value="Male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="Female">
                                <label for="female">Female</label><br>    </div>
                         </div>





                         <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6 item form-group" >
                                <label >Voter Status</label>
                                <br>
                                <select name="voterstatus" id="voterstatus" style="height:38px; width: 100%">
                                <option value="">-Select Voter Status-</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>

                              </select>
                            </div>
                            <div class="col-sm-6 item form-group">
                              <label >Civil Status</label>
                              <br>
                              <select name="civilstatus" id="civilstatus" style="height:38px; width: 100%">
                              <option value="">-Select Marital Status-</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widowed">Widowed</option>
                              <option value="Separated">Separated</option>
                              <option value="Divorced">Divorced</option>
                            </select>
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">CitizenShip
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="citizenship" name="citizenship" placeholder="Ex: Filipino"  required="required" class="form-control ">
                            </div>
                         </div>




                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >Telephone</label>
                             <input type="text" class="form-control"   name="telephone" id="telephone" placeholder="Ex: 123-45-678"  value="" required="">

                           </div>
                           <div class="col-sm-6 ">
                             <label >Mobile</label>
                             <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Ex: 09166041823" value="" required="">

                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Area
                           </label>
                           <div class="col-md-12 col-sm-12 ">
                              <select name="area" id="area" style="height:38px; width: 100%">
                                 <option value="">-Select Area-</option>
                                 @if(count($area_setting) > 0)
                                 @foreach ($area_setting as $area_setting)
                                 <option value="{{  $area_setting->area}}" >{{ $area_setting->area }}</option>


                                 @endforeach
                                 @endif


                               </select>
                              </div>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Height</label>
                              <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="height" id="height" placeholder="" value="0" required="">

                            </div>
                            <div class="col-sm-6 ">
                              <label >Weight</label>
                              <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="weight" id="weight" placeholder="" value="0" required="">

                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="email" id="email" name="email" required="required" placeholder="Ex: johnmark@gmail.com" class="form-control ">
                            </div>
                         </div>







                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >PAG-IBIG</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  name="PAG_IBIG" id="PAG_IBIG" placeholder="Ex: 1234-5678-9101" maxlength = "14" value="" required="">

                           </div>
                           <div class="col-sm-6 ">
                             <label >PHILHEALTH</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="PHILHEALTH" id="PHILHEALTH" placeholder="Ex: 0028-1215160-9" maxlength = "14" value="" required="">

                           </div>
                         </div>


                         <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >SSS</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="SSS" id="SSS" placeholder="Ex: 04-0751449-0"  maxlength = "12" value="" required="">

                           </div>
                           <div class="col-sm-6 ">
                             <label >TIN</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="TIN" id="TIN" placeholder="Ex: 123-456-789-000" maxlength = "15" value="" required="">

                           </div>
                         </div>







                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Spouse
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="spouse" name="spouse" required="required" placeholder="N/A" class="form-control ">
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Father
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="father" name="father" placeholder="N/A" required="required" class="form-control ">
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mother
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="mother" name="mother" required="required" value="" placeholder="N/A" class="form-control ">
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="address_1" name="address_1" placeholder="Ex: P.O. Box 1201, Manila Central Post Office
                               1050 Manila" required="required" class="form-control ">
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 2
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="address_2" name="address_2" placeholder="Ex: P.O. Box 1121, Araneta Center Post Office
                               1135 Quezon City, Metro Manila" required="required" class="form-control ">
                            </div>
                         </div>









                    </div>


                <!----------------
                -->






                    </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                           <div class="col-md-12 col-sm-12 offset-md-4">
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
            <div style="overflow-x:auto;" class=" col-sm-12 overflow-auto display-nones ">
               <table  class=" bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer">
                  <thead>
                     <tr class="headings">
                        <th >
                            <input class="icheckbox_flat-green" type="checkbox"   id="check-all" >

                          </th>
                        <th class="column-title">Action</th>
                        <th class="column-title">Resident_ID</th>
                        <th class="column-title">Last Name </th>
                        <th class="column-title">First Name </th>
                        <th class="column-title">Middle Name </th>

                        <th class="column-title">Civil Status</th>
                        <th class="column-title">Mobile No.</th>

                        <th class="column-title">Gender</th>
                        <th class="column-title">Voter Status</th>

                        </th>
                     </tr>
                  </thead>
                  </tbody>
               </table>


            </div>
         </div>
      </div>
   </div>
</div>








<div class="modal fade" id="residentviewmodal" name="residentviewmodal" tabindex="-1" role="dialog" aria-labelledby="resident-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modelHeading"></h5>



             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>




          <div class="modal-body">
             <form id="residentviewform"  class="modal-input">
                {{ csrf_field() }}
                <input type="hidden" name="resident_idv" id="resident_idv">


                <div class="item form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                   </label>

                   <div class="col-md-6 col-sm-6 ">
                      <input type="text" id="lastnamev" name="lastnamev" required="required" class="form-control ">
                   </div>
                </div>

                <div class="row">


            <div class="col-sm-12">



                <table  id="blotter-resident" class="bulk_action dataTables_info table blotter-resident datatable-element resident table-striped jambo_table bulk_action text-center border border-modal dataTable no-footer">
                    <thead>
                       <tr class="headings">

                          <th class="column-title">Blotter-ID</th>
                          <th class="column-title">Incident Type</th>
                          <th class="column-title">Status </th>
                          <th class="column-title">Date Reported </th>
                          <th class="column-title">Date Incident </th>
                          <th class="column-title">Incident Location</th>


                          </th>
                       </tr>
                    </thead>
                    </tbody>
                 </table>
            </div>






        </div>
                <div class="ln_solid"></div>

             </form>
          </div>
          <div class="modal-footer text-white">
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

