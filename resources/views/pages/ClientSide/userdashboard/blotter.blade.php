<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blotter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body style="margin: 0 0 100px;">
    <input type="hidden" name="current_resident" id = "current_resident" data-id = {{ session("resident.id") }}>
    
    <header class="header-blue" style="padding-bottom: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="/barangay/home" style="font-size: 45px;font-family: bodoni mt;"><img src="{{ URL::to('images/logo.png') }}" style="resize: both;width: 80px;margin-right: 30px;">University of Rizal System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group mb-0"><label for="search-field"></label></div>
                    </form>
                    <p class="navbar-text" style="margin-top: 15px;margin-right: 11px;color: white;font-size: 20px;"><i class="fa fa-user" style="margin-right: 5px;"></i>{{session("resident.firstname")}}</p><span class="navbar-text"> </span>
                    <div class="dropdown" style="font-size: 20px;"><a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#" style="color: white;"><i class="fa fa-cog" style="margin-right: 5px;"></i>Settings</a>
                        <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;"><a class="dropdown-item" href="/barangay/accountsetting" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settings</a>
                            <a class="dropdown-item" href="/barangay/logout" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Log-out</a></div>
                    </div>
                </div>
                </div>
            </div>
        </nav>
    </header>
    <ul class="nav nav-tabs" style="margin-left: 20px;">
        <li class="nav-item"><a class="nav-link" href="/barangay/home"><i class="fa fa-home" style="margin-right: 5px;"></i>Home</a></li>
        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link active" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fa fa-server" style="margin-right: 5px;"></i>Services</a>
            <div class="dropdown-menu"><a class="dropdown-item" href="/barangay/schedule">Schedule</a><a class="dropdown-item" href="/barangay/blotter/{{ session("resident.id") }}">Blotter</a><a class="dropdown-item" href="/barangay/certificate">Certificates</a></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">News</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Info</a></li>
    </ul>

{{-- Content --}}


<style>
    .card-container{
        width: 300px;
        height: 200px;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 25px rgba(0,0,0,0.2);

    }

    /* .card-container h4, h6{
        font-family: Arial, Helvetica, sans-serif;
    } */

    .card-container .card-header{
        width: 100%;
        height: 65%;
        background: rgb(0, 87, 121);
        padding-left: 1.8rem;
        padding-top: 1.2rem;
    }

    .card-container .card-content {
        padding: 0.5rem;
        position: relative;
    }

    .card-container .card-content p{
        color: black;
        font-size: 0.9rem;
        
    }

    .card-container .card-content .card-content-btn{
        position: absolute;
        top: 1rem;
    }

    .card-container .card-content .card-content-btn button{
        border-radius: 50%;
    }
</style>

<div style="margin: 30px;margin-bottom: 80px;">
    <div class="jumbotron" style="margin-bottom: 175px;">
        <div class="container " style="margin: 0 auto;color: white;padding: 15px;border-radius: 25px;margin-bottom: 10px;">
           
            <div class="row justify-content-center">
                @foreach ($data as $item)
                <div class="col col-4" style="margin-bottom: 4rem">
                    
                    <div class="card-container">
                        <div class="card-header">
                            <h4>{{ $item->incident_type }}</h4>
                            <h6>{{ $item->incident_location}}</h6>
                            <h6>{{ $item->status }}</h6>
                        </div>

                        <div class="card-content">
                            <div class="card-content-btn">
                                <a href="/barangay/blotter/pdf/{{  session("resident.id") }}/{{ $item->blotter_id }}" data-id="{{ $item->blotter_id }}" class="btn btn-info btn-xs pr-4 pl-4"><i class="fa fa-download fa-lg"></i> </a>';
                                <a href="#" data-id="{{ $item->blotter_id }}"  id="viewBlotter" class="btn btn-primary btn-xs pr-4 pl-4"><i class="fa fa-folder fa-lg"></i> </a>';
                            </div>
                        </div>
                    </div>

                </div>

                @endforeach
            </div>
           
         
        </div>
    </div>
</div>



<div class="modal fade" id="viewblottermodal" name="viewblottermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="viewmodelHeading"></h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
 
          <div class="modal-body">
             <table  class="bulk_action dataTables_info table datatable-element table-striped jambo_table bulk_action text-center border no-footer">
                <thead style="background: rgb(0, 87, 121); color:white;">
                   <tr class="headings">
                      <th class="column-title">Blotter Id</th>
                      <th class="column-title">Status</th>
                      <th class="column-title">Incident Location</th>
                      <th class="column-title">Incident Type</th>
                      <th class="column-title">Incident Date</th>
                      <th class="column-title">Incident Time</th>
                      <th class="column-title">Schedule Date</th>
                      {{-- <th class="column-title">Schedule Time</th> --}}
                   </tr>
                </thead>
                <tbody>
                   <tr>
                      <td id="viewblotter_id"></td>
                      <td id="status"></td>
                      <td id="viewincident_location"></td>
                      <td id="viewincident_type"></td>
                      <td id="viewdate_incident"></td>
                      <td id="viewtimeof_incident"></td>
                      <td id="viewschedule_date"></td>
                      {{-- <td id="viewschedule_time"></td> --}}
                   </tr>
                </tbody>
             </table>
             <hr>
 
             <h5>List of Person Involves</h5>
 
             <table id="blotter_list-table" class="bulk_action dataTables_info table datatable-element table-striped jambo_table bulk_action text-center border no-footer">
                <thead style="background: rgb(0, 87, 121); color:white;">
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
             <h4>Incident Narrative</h4>
             <textarea name="viewincident_narrative" id="viewincident_narrative" rows="10" style="width: 100%; border:none;" disabled></textarea>
             {{-- <form id="blotterform"  name="blotterform" class="modal-input">
             </form> --}}
          </div>
 
 
 
          <div class="modal-footer text-white">
          </div>
       </div>
    </div>
 </div>



{{-- End Content --}}


    <div style="margin: 20px;"></div>
    <footer class="footer-clean" style="background-color: gray;position: absolute;left: 0;bottom: 0;height: 174px;width: 100%;overflow: hidden;margin-top: 30px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript">

$('body').on('click', '#viewBlotter', function(){
               var blotter_id = $(this).data('id');
               $.get("{{ route('blotters.index') }}" +'/' + blotter_id +'/edit', function (data) {
                  $('#viewmodelHeading').html("View BLotter");
                  $('#status').html(data[0].status);
                  $('#viewblottermodal').modal('show');
                  $('#viewblotter_id').html(data[0].blotter_id);
                  $('#viewincident_location').html(data[0].incident_location);
                  $('#viewincident_type').html(data[0].incident_type);
                  $('#viewdate_incident').html(data[0].date_incident);
                  $('#viewtimeof_incident').html(data[0].time_incident);


                  $('#viewschedule_date').html(data[0].schedule_date);
                  // $('#viewschedule_time').html(data[0].schedule_time);
                  $('#viewincident_narrative').val(data[0].incident_narrative);

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
               })
             });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>