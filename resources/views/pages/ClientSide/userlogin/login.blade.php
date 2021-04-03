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

  <script>
    
  </script>

  <title>Login</title>
</head>
<body style="background-image: url({{ URL::asset('images/background.png') }}); background-repeat:no-repeat; background-size: cover ">
<header class="header-blue" style="padding-bottom: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><p class="navbar-brand" style="font-size: 45px;font-family: bodoni mt;"><img src="{{ URL::to('images/logo.png') }}" style="resize: both;width: 80px;margin-right: 30px;">University of Rizal System</p>
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
          <h5 class="card-title text-center">Log In</h5>
          {{-- form --}}
          <form class="log-in-form" action="/barangay/login" method="post"> 
            @csrf
            <div class="form-label-group mt-2">
              <label for="client_login_email">Email address</label>
              <input type="text" id="client_login_email" name="client_login_email" class="form-control" placeholder="Email address" autofocus
              value={{ old('client_login_email')}}>
              @error('client_login_email')
              <span class="text-danger error_text create_account_form_lastname_error"> {{ $message }}</span>
              @enderror
            </div>

            <div class="form-label-group mt-2">
              <label for="client_login_password">Password</label>
              <input type="password" id="client_login_password" name="client_login_password" class="form-control" placeholder="Password" >
              @error('client_login_password')
              <span class="text-danger error_text create_account_form_lastname_error">{{ $message }}</span>
              @enderror
            </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase mt-3" id="clientLoginBtn" type="submit">Log in</button>
          </form>
          {{-- end form --}}


          <br><a href="/barangay/register">Don't have an account?? Register!</a>
          <br><a href="/login">Go to admin login ></a>
        </div>
      </div>
      <p class="text-white ">I'll remove the admin link after we're done testing</p>
      <p class="text-white ">Make sure u migrate:fresh & db:seed before loging in</p>
      <p class="text-white ">Check notes on web.php</p>
    </div>
  </div>
</div>

</body>
</html>
