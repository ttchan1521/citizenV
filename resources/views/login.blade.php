<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <form action="#" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Tên đăng nhập" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Mật khẩu đăng nhập" />
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
  </body>
</html>