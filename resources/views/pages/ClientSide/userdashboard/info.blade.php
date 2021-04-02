<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href={{ URL::asset('fonts\vendor\font-awesome/fontawesome5-overrides.min.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
</head>

<body style="margin: 0 0 169px;">
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
                            <a class="dropdown-item" href="/barangay/logout" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Log-out</a>
                        </div>
                    </div>
                    <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;"><a class="dropdown-item" href="#" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settingt</a></div>
                </div>
                </div>
            </div>
        </nav>
    </header>
    <ul class="nav nav-tabs" style="margin-left: 20px;">
        <li class="nav-item"><a class="nav-link" href="/barangay/home"><i class="fa fa-home" style="margin-right: 5px;"></i>Home</a></li>
        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link " aria-expanded="false" data-toggle="dropdown" href="#"><i class="fa fa-server" style="margin-right: 5px;"></i>Services</a>
            <div class="dropdown-menu"><a class="dropdown-item" href="/barangay/schedule">Schedule</a><a class="dropdown-item" href="/barangay/blotter">Blotter</a><a class="dropdown-item" href="/barangay/certificate">Certificates</a></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="/barangay/news">News</a></li>
        <li class="nav-item active"><a class="nav-link" href="/barangay/info">Info</a></li>
    </ul>
    <div style="margin: 50px;">
        <div class="jumbotron">
            <h1>Contact Us</h1>
            <div class="container" style="padding: 20px;">
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-phone" style="margin-right: 10px;"></i><strong>Phone</strong></p>
                        <p style="margin-left: 30px;">012345678902</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fas fa-mail-bulk" style="margin-right: 10px;"></i><strong>Email</strong></p>
                        <p style="margin-left: 30px;">testemail@email.com</p>
                    </div>
                </div>
            </div>
            <h1>Other Government Hotlines</h1>
            <div class="container" style="padding: 20px;">
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-dot-circle-o" style="margin-right: 10px;"></i>National Emergency Hotline in the Philippines : 911<br></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-dot-circle-o" style="margin-right: 10px;"></i>Philippine National Police Hotline: 117 or (02) 8722-0650<br></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-dot-circle-o" style="margin-right: 10px;"></i>Philippine Red Cross: 143 or (02) 8527-8385 to 95<br></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-dot-circle-o" style="margin-right: 10px;"></i>Bureau of Fire Protection: (02) 8426-0219 or (02) 8426-3812<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin: 50px;margin-bottom: 200px;">
        <div class="jumbotron">
            <h1>Frequently Ask Questions</h1>
            <div class="container" style="padding: 20px;">
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-question" style="margin-right: 10px;"></i><strong>Random Question</strong></p>
                        <p style="margin-left: 30px;">Random Answer</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-question" style="margin-right: 10px;"></i><strong>Random Question</strong></p>
                        <p style="margin-left: 30px;">Random Answer</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-question" style="margin-right: 10px;"></i><strong>Random Question</strong></p>
                        <p style="margin-left: 30px;">Random Answer</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class="fa fa-question" style="margin-right: 10px;"></i><strong>Random Question</strong></p>
                        <p style="margin-left: 30px;">Random Answer</p>
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