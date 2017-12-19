<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Flat HTML5/CSS3 Login Form</title>

  <link rel="stylesheet" href="{{asset('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/style_login.css')}}">


</head>

<body>
  <div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name" name="username"/>
      <input type="password" placeholder="password" name="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <a href=""><button>login</button></a>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index_login.js"></script> -->

</body>
</html>
