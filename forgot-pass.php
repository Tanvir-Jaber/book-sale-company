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
        if(isset($_SESSION['errorMessageForgot'])){
            echo $_SESSION['errorMessageForgot'];
            unset($_SESSION['errorMessageForgot']);
        }
        ?>
        <div class="register-box-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <form action="views/process/data-process.php" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" name="forgot-pass" class="btn btn-primary btn-block btn-flat">Request new password</button>
                    </div>
                </div>
            </form>
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
