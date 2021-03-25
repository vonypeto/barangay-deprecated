<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account Setting</title>

    <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
</head>

<body style="margin: 0 0 100px;">
    <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>

    <header class="header-blue" style="padding-bottom: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="/barangay/home" style="font-size: 45px;font-family: bodoni mt;"><img src="{{ URL::to('images/logo.png') }}" style="resize: both;width: 80px;margin-right: 30px;">University of Rizal System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group mb-0"><label for="search-field"></label></div>
                    </form>
                    <p class="navbar-text" id="navbar-username" style="margin-top: 15px;margin-right: 11px;color: white;font-size: 20px;"><i class="fa fa-user" style="margin-right: 5px;"></i>{{session("resident.firstname")}}</p><span class="navbar-text"> </span>
                    <div class="dropdown" style="font-size: 20px;"><a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#" style="color: white;"><i class="fa fa-cog" style="margin-right: 5px;"></i>Settings</a>
                        <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;"><a class="dropdown-item" href="/barangay/accountsetting" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settings</a><a class="dropdown-item" href="/barangay/logout" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Log-out</a></div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <ul class="nav nav-tabs" style="margin-left: 20px;">
        <li class="nav-item"><a class="nav-link" href="/barangay/home"><i class="fa fa-home" style="margin-right: 5px;"></i>Home</a></li>
        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fa fa-server" style="margin-right: 5px;"></i>Services</a>
            <div class="dropdown-menu"><a class="dropdown-item" href="/barangay/schedule">Schedule</a><a class="dropdown-item" href="/barangay/blotter">Blotter</a><a class="dropdown-item" href="/barangay/certificate">Certificates</a></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">News</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Info</a></li>
    </ul>


    <div class="container">

        <div class="modal fade " id="account_settings_modal" role="dialog">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h4 class="modal-title ">Change Account Settings</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" >&times;</button>
                </div>
                <div class="modal-body">
                    <form id="account_settings_form" name="account_settings_form" class="form-horizontal m-2">
                        {{-- hidden var --}}
                        <input type="text" name="current_id" id="current_id" hidden>
                        <input type="text" name="table_edit" id="table_edit" hidden>

                        {{-- Label 1 --}}
                        <div class="form-group row p-2">
                            <label for="new_input_modal" id="modal_label1"  class="font-weight-bold">Label1</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control font-weight-bold" id="new_input_modal" name="new_input_modal">
                            <span class="text-danger error_text new_input_modal_error new_input_email_modal_error new_input_username_modal_error"></span>
                            </div>
                        </div>

                        {{-- Label 3 // this only show when password is being change --}}
                        <div class="form-group row p-2" id="password_edit_modal">
                            <label for="current_password_modal_confirmation" id="modal_label2" class="font-weight-bold">CONFIRM NEW PASSWORD</label>
                            <div class="col-sm-12">
                            <input type="password" id="current_password_modal_confirmation" name="current_password_modal" placeholder="Confirm New Password" class="form-control ">
                            <span class="text-danger error_text current_password_modal_confirmation_error"></span>
                            </div>
                        </div>

                        {{-- Label 2 --}}
                        <div class="form-group row p-2">
                            <label for="current_password_modal" id="modal_label2" class="font-weight-bold">CURRENT PASSWORD</label>
                            <div class="col-sm-12">
                            <input type="password" id="current_password_modal" name="current_password_modal" placeholder="Enter Password to save changes" class="form-control ">
                            <span class="text-danger error_text current_password_modal_error"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right" id="saveBtn" value="create" >Save changes
                            </button>
                        </div>
                    </form>                            
                </div>
            </div>
        </div>
    </div>


    <div style="margin-bottom: 227px;padding-left: 50px;">
        <h2 style="margin: 20px;">My Acount</h2>
        <div class="container rounded-lg bg-dark col-8 p-3 m-3" style="margin-left: 100px;">
            <h3 class="text-white">Customize Information</h3>
            <div class="container p-2">
                <div id="Firstname" class="row rounded-lg bg-white p-3 m-2">
                    <div class="col">
                        <p class="m-0" style="font-weight: bold;">FIRST NAME</p>
                        <p id="account_firstname" class="m-0">Account Firstname</p>
                    </div>
                    <div class="col align-self-center"><button class="btn btn-primary btn btn-dark float-right" id="firstname_edit" type="button">Edit</button></div>
                </div>
                <div id="Lastname" class="row rounded-lg bg-white p-3 m-2">
                    <div class="col">
                        <p class="m-0" style="font-weight: bold;">LAST NAME</p>
                        <p id="account_lastname" class="m-0">Account Lastname</p>
                    </div>
                    <div class="col align-self-center"><button class="btn btn-primary btn btn-dark float-right" id="lastname_edit" type="button">Edit</button></div>
                </div>
                <div id="Username" class="row rounded-lg bg-white p-3 m-2">
                    <div class="col">
                        <p class="m-0" style="font-weight: bold;">USERNAME</p>
                        <p id="account_username" class="m-0">Account Username</p>
                    </div>
                    <div class="col align-self-center"><button class="btn btn-primary btn btn-dark float-right" id="username_edit" type="button">Edit</button></div>
                </div>
                <div id="Email" class="row rounded-lg bg-white p-3 m-2">
                    <div class="col">
                        <p class="m-0" style="font-weight: bold;">EMAIL</p>
                        <p id="account_email" class="m-0">Account Email</p>
                    </div>
                    <div class="col align-self-center"><button class="btn btn-primary btn btn-dark float-right" id="email_edit" type="button">Edit</button></div>
                </div>
                <div id="Password" class="row rounded-lg bg-white p-3 m-2">
                    <div class="col align-self-center">
                        <p class="m-0" style="font-weight: bold;">PASSWORD</p>
                    </div>
                    <div class="col align-self-center"><button class="btn btn-primary btn btn-dark float-right" id="password_edit" type="button">Edit</button></div>
                </div>
            </div>
        </div>
    </div>
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
       $(function() {
            //Global Varibles
            var current_id = {{ session("resident.id") }};
            var isFirstname = false;
            showUserInfo(current_id);

            //Ajax
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

        //For hidding modal label 3
        $("#password_edit_modal").hide();

        //On modal close
        $("#account_settings_modal").on("hidden.bs.modal", function () {
            $("#account_settings_form")[0].reset();
            $(document).find('span.error_text').text('');
            $("#password_edit_modal").hide();
            $("#new_input_modal").attr("name","new_input_modal");
            $("#current_password_modal_confirmation").attr("name","current_password_modal");
            $("#new_input_modal").attr("type","text");
            isFirstname = false;
        });

               // Show info for Client Account Setting
               function showUserInfo(id){
            $.get('/barangay/' + id +'/edit', function (data) {
                $("#account_firstname").text(data.first_name);
                $("#account_lastname").text(data.last_name);
                $("#account_username").text(data.username);
                $("#account_email").text(data.email);
            })
        }

        // Modal for firstname edit
        $('body').on('click', '#firstname_edit', function () {
            var id = current_id;
            $.get('/barangay/' + id +'/edit', function (data) 
            {
                $('#account_settings_modal').modal('toggle');
                $("#account_settings_modal").show();

                $('#modal_label1').text("NEW FIRST NAME");
                $("#new_input_modal").val(data.first_name);

                $('#current_id').val(id);
                $('#table_edit').val("firstname");

                isFirstname = true;
            })
        });

        // Modal for Lastname edit
        $('body').on('click', '#lastname_edit', function () {

            var id = current_id;
            $.get('/barangay/' + id +'/edit', function (data) {
                $('#account_settings_modal').modal('toggle');
                $("#account_settings_modal").show();

                $('#modal_label1').text("NEW LAST NAME");
                $("#new_input_modal").val(data.last_name);

                $('#current_id').val(id);
                $('#table_edit').val("lastname");
            })
        });

        //Modal for username edit
        $('body').on('click', '#username_edit', function () {
            var id = current_id;  
            $.get('/barangay/' + id +'/edit', function (data)  {
            $('#account_settings_modal').modal('toggle');
            $("#account_settings_modal").show();

            $('#modal_label1').text("NEW USERNAME");
            $("#new_input_modal").val(data.username);

            $("#new_input_modal").attr("name","new_input_username_modal");

            $('#current_id').val(id);
            $('#table_edit').val("username");
            })
        });

        // Modal for email edit
        $('body').on('click', '#email_edit', function () {

            var id = current_id;
            $.get('/barangay/' + id +'/edit', function (data)  {
                $('#account_settings_modal').modal('toggle');
                $("#account_settings_modal").show();

                $('#modal_label1').text("NEW EMAIL");
                $("#new_input_modal").val(data.email);

                $("#new_input_modal").attr("name","new_input_email_modal");

                $('#current_id').val(id);
                $('#table_edit').val("email");
            })
        });

        // Modal for password edit
        $('body').on('click', '#password_edit', function () {

            var id = current_id;
            $.get('/barangay/' + id +'/edit', function (data) {
                $('#account_settings_modal').modal('toggle');
                $("#account_settings_modal").show();

                $('#modal_label1').text("NEW PASSWORD");
                $("#new_input_modal").attr("placeholder", "Enter new password");

                $('#current_id').val(id);
                $('#table_edit').val("password");


                $("#new_input_modal").attr("type","password");
                $("#current_password_modal_confirmation").attr("name","current_password_modal_confirmation");
                $("#password_edit_modal").show();
            })
        });

        //Modal on submit
        $("#account_settings_form").on('submit', function (e) {
            e.preventDefault();

            $firstname = $("#new_input_modal").val();

            $.ajax({
                type:"post",
                url:"{{ route("ClientAccountSettingCheck") }}",
                data: $("#account_settings_form").serialize(),
                dataType:"json",
                beforeSend:function(){
                    $(document).find('span.error_text').text('');
                },
                success: function (data) {
                    if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+"_error").text(val[0]);
                    });
                    }
                    else{
                    $('#account_settings_modal').modal('hide');
                    alert(data.msg);
                    showUserInfo(current_id);
                    $("#account_settings_form")[0].reset();
                    $(document).find('span.error_text').text('');

                    if(isFirstname == true){
                        $("#navbar-username").html('<i class="fa fa-user" style="margin-right: 5px;"></i>' + $firstname );
                    }
                    }
                }
            });
        });

       }) // end of ready function





    </script>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script type="text/javascript" src=" {{ URL::asset('js/app.js') }}"></script>

<!---datatable-->


<script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>



<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

<!--pagination-->
<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/pagination.min.js') }}"></script>
</html>