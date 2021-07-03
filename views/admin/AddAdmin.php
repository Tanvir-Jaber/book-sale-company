<?php
if(!isset($_SESSION)){
    session_start();
}
$Adid = $_SESSION ['Aid'];
$Adname = $_SESSION ['Aname'];
$Ademail = $_SESSION ['Aemail'];
if (isset($_SESSION ['Aid']) && isset($_SESSION ['Aname']) && isset($_SESSION ['Aemail']) ){
    include_once "admin_head.php";
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Admin</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="card card-danger">
                                <form action="../process/data-process.php" method="post">
                                    <div class="card-body">
                                        <strong><i class="fa fa-book mr-1"></i>Full Name</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required><br>
                                        <strong><i class="fa fa-mail-forward mr-1"></i> Email Address</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" required><br>
                                        <strong><i class="fa fa-user mr-1"></i>Password</strong>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <hr>
                                        <button type="submit" name="newAdmin" style="background: #00adc2;border: #00adc2;color: #ffffff;font-weight: bold" class="btn btn-block"><i class="fa fa-sign-language mr-2" aria-hidden="true"></i>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include_once "admin_foot.php";
}
else{
    header("Location: ../../login.php");
}
?>



