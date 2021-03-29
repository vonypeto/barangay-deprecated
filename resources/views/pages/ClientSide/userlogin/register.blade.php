<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
  <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/homepage_css/Footer-Clean.css">
  <link rel="stylesheet" href="css/homepage_css/Header-Blue.css">
  <link rel="stylesheet" href="css/homepage_css/styles.css">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <title>Register</title>
</head>
<body style="background-image: url({{ URL::asset('images/background.png') }}); background-repeat:no-repeat; background-size: cover ">
<header class="header-blue" style="padding-bottom: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="/home" style="font-size: 45px;font-family: bodoni mt;"><img src="{{ URL::to('images/logo.png') }}" style="resize: both;width: 80px;margin-right: 30px;">University of Rizal System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group mb-0"><label for="search-field"></label></div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          @if (session()->has("success_register"))
          <div class="alert alert-success">
            {{ session()->get("success_register")}}
          </div>
          @endif
          <h5 class="card-title text-center">Register</h5>
          {{-- form --}}
          <form class="register-form" action="/barangay/register" method="post">
            @csrf
            <div class="form-label-group mt-2">
              <label for="register_firstname">First name</label>
              <input type="text" id="register_firstname" name="register_firstname" class="form-control" placeholder="Enter First Name" 
              value={{ old('register_firstname')}}>
              @error('register_firstname')
              <span class="text-danger error_text"> {{ $message }}</span>
              @enderror
            </div>
            {{-- lastname --}}
            <div class="form-label-group mt-2">
              <label for="register_lastname">Last name</label>
              <input type="text" id="register_lastname" name="register_lastname" class="form-control" placeholder="Enter Last Name" 
              value={{ old('register_lastname')}}>
              @error('register_lastname')
              <span class="text-danger error_text"> {{ $message }}</span>
              @enderror
            </div>

            {{-- username --}}
            <div class="form-label-group mt-2">
              <label for="register_username">Username</label>
              <input type="text" id="register_username" name="register_username" class="form-control" placeholder="Enter Username" 
              value={{ old('register_username')}}>
              @error('register_username')
              <span class="text-danger error_text"> {{ $message }}</span>
              @enderror
            </div>

            {{-- email address --}}
            <div class="form-label-group mt-2">
              <label for="register_email">Email address</label>
              <input type="text" id="register_email" name="register_email" class="form-control" placeholder="Email address" 
              value={{ old('register_email')}}>
              @error('register_email')
              <span class="text-danger error_text"> {{ $message }}</span>
              @enderror
            </div>

            {{-- password --}}
            <div class="form-label-group mt-2">
              <label for="register_password">Password</label>
              <input type="password" id="register_password" name="register_password" class="form-control" placeholder="Password" >
              @error('register_password')
              <span class="text-danger error_text">{{ $message }}</span>
              @enderror
            </div>

            {{-- verify password --}}
            <div class="form-label-group mt-2">
              <label for="register_password_confirmation">Verify Password</label>
              <input type="password" id="register_password_confirmation" name="register_password_confirmation" class="form-control" placeholder="Please Verify Password" >
              @error('register_password_confirmation')
              <span class="text-danger error_text"> {{ $message }}</span>
              @enderror
            </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase mt-3" id="registerBtn" type="submit">Confirm Register</button>
          </form>
          {{-- end form --}}

          <br><a href="/barangay/login">Have an account?? Login!</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
