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
  <style>
    body {
      background-image: url('https://media.istockphoto.com/photos/education-concept-with-book-in-library-picture-id944631208?k=6&m=944631208&s=612x612&w=0&h=5Hx0ksAT5Majaz40Iov6oLO6GaDn2cxySnNTDTH3Qk8=')!important;
      background-repeat: no-repeat!important;
      background-attachment: fixed!important;
      background-size: cover!important;
      overflow: hidden;
    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Book Selling </b>Services</a>
  </div>
    <?php
    if(isset($_SESSION['errorMessageRegister'])){
        echo $_SESSION['errorMessageRegister'];
        unset($_SESSION['errorMessageRegister']);
    }
    ?>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="views/process/data-process.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <select name="position" class="form-control appearance-none" style="-webkit-appearance: none;">
          <option>Select Account Type</option>
          <option value="Owner">Owner of book seller</option>
          <option value="User">User</option>
        </select>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="reg-btn" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
      </div>
    </form>

    <br>
    <span>Already have an account?</span><a href="login.php" class="text-center">Signin here</a>
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
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
