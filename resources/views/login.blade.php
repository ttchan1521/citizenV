<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Sign in Form</title>
  </head>
  <body>
    <div class="container">
      <div class="signin-signup">
          <form action="#" class="sign-in-form" id="form">
          <input type="hidden" id="token" value="{{ @csrf_token() }}">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="username" placeholder="Tên đăng nhập" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="pas placeholder="Mật khẩu đăng nhập" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>CitizenV</h3>
            <p>
              Điều tra dân số
            </p>
          </div>
          <img src="{{ asset('img/login.png')}}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{ asset('js/login.js')}}"></script>
  </body>
</html>
