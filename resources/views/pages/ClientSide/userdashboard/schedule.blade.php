<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

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
                    <p class="navbar-text" style="margin-top: 15px;margin-right: 11px;color: white;font-size: 20px;"><i class="fa fa-user" style="margin-right: 5px;"></i>{{session("resident.firstname")}}</p><span class="navbar-text"> </span>
                    <div class="dropdown" style="font-size: 20px;"><a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#" style="color: white;"><i class="fa fa-cog" style="margin-right: 5px;"></i>Settings</a>
                        <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;">
                            <a class="dropdown-item" href="/barangay/accountsetting" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settings</a>
                            <a class="dropdown-item" href="/barangay/logout" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Log-out</a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <ul class="nav nav-tabs" style="margin-left: 20px;">
        <li class="nav-item"><a class="nav-link" href="/barangay/home"><i class="fa fa-home" style="margin-right: 5px;"></i>Home</a></li>
        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link active" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fa fa-server" style="margin-right: 5px;"></i>Services</a>
            <div class="dropdown-menu"><a class="dropdown-item" href="/barangay/schedule">Schedule</a><a class="dropdown-item" href="/barangay/blotter">Blotter</a><a class="dropdown-item" href="/barangay/certificate">Certificates</a></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">News</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Info</a></li>
    </ul>
    <div style="margin: 30px;margin-bottom: 80px;">
        <div class="d-flex justify-content-center">
        @if (session()->has("success_certificate"))
        <div class="alert alert-success">
          {{ session()->get("success_certificate")}}
        </div>
        @endif
    </div>
    <div class="jumbotron" style="margin-bottom: 175px;padding-top: 0px;background-color: white !important;">









            <div class="album py-5 bg-white">
                <div class="text-center">
                <h1 >Certificate</h1>
                <br>
                </div>

                <div class="container">

                  <div class="row">
                    @if(count($request_list))
                    @foreach ($request_list as $request_list)
                    <div class="col-md-4">
                      <div class="card mb-4 box-shadow">
                         <div class="bg-info text-white text-center pt-2" stlye="height: 100px">
                            <h4>{{ $request_list->request_type }}</h4>
                        </div>

                        <div class="card-body">
                          <div class="card-text border-bottom solid">


                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <h5>Price</h5>
                                    <h5>{{ $request_list->price }}</h5>
                                </div>
                                <div class="col-sm-6">
                                    <h5>Paid</h5>
                                    <h5>{{ $request_list->paid }}</h5>
                                </div>

                            </div>
                        </div>
                          <div class="d-flex justify-content-between align-items-center">
                              <small class="pl-2"> {{ Carbon\Carbon::parse($request_list->created_at)->toDateString() }}</small>
                            <hr>
                            <div class="btn-group">
                                <a href="schedule/{{ $request_list->request_id }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Print</button>
                              </div>

                          </div>
                        </div>
                      </div>
                    </div>





                    @endforeach
                    @endif
                    </div>



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
