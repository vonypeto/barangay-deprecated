<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account Setting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/ClientCSS/Footer-Clean.css">
    <link rel="stylesheet" href="css/ClientCSS/Header-Blue.css">
    <link rel="stylesheet" href="css/ClientCSS/styles.css">
</head>

<body style="margin: 0 0 100px;">
    <header class="header-blue" style="padding-bottom: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="font-size: 45px;font-family: bodoni mt;"><img src="{{ URL::to('images/logo.png') }}" style="resize: both;width: 80px;margin-right: 30px;">University of Rizal System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group mb-0"><label for="search-field"></label></div>
                    </form>
                    <p class="navbar-text" style="margin-top: 15px;margin-right: 11px;color: white;font-size: 20px;"><i class="fa fa-user" style="margin-right: 5px;"></i>Username</p><span class="navbar-text"> </span>
                    <div class="dropdown" style="font-size: 20px;"><a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#" style="color: white;"><i class="fa fa-cog" style="margin-right: 5px;"></i>Settings</a>
                        <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;"><a class="dropdown-item" href="#" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settings</a><a class="dropdown-item" href="#" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Log-out</a></div>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <div class="container">
               <!-- Trigger the modal with a button -->
               {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#account_settings_modal">Open Large Modal</button> --}}

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
                <div id="PhoneNumber" class="row rounded-lg bg-white p-3 m-2">
                    <div class="col">
                        <p class="m-0" style="font-weight: bold;">PHONE NUMBER</p>
                        <p id="account_phone_number" class="m-0">Account Phone Number</p>
                    </div>
                    <div class="col align-self-center"><button class="btn btn-primary btn btn-dark float-right" id="phonenumber_edit" type="button">Edit</button></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>