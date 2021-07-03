<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Book Selling</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="contents/css/style.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    body {
      background-image: url('https://media.istockphoto.com/photos/education-concept-with-book-in-library-picture-id944631208?k=6&m=944631208&s=612x612&w=0&h=5Hx0ksAT5Majaz40Iov6oLO6GaDn2cxySnNTDTH3Qk8=')!important;
      background-repeat: no-repeat!important;
      background-attachment: fixed!important;
      background-size: cover!important;
      overflow: hidden;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Book Selling </b>Services</a>
  </div>
    <?php
    if(isset($_SESSION['errorMessageSignin'])){
        echo $_SESSION['errorMessageSignin'];
        unset($_SESSION['errorMessageSignin']);
    }
    ?>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="views/process/data-process.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="signin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
    <br>
    <a href="forgot-pass.php" class="margin-top-bottom-10">I forgot my password</a><br>
    <span>Don't have an account?</span><a href="register.php" class="text-center">Register a new membership</a>

  </div>
</div>
<script src="plugins/jquery/dist/jquery.min.js"></script>
<script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
</body>
</html>
