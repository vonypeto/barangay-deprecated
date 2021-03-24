<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
  <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <title>Register</title>
</head>
<body>
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
          <form class="register-form" action="register" method="post">
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

          <br><a href="login">Have an account?? Login!</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
