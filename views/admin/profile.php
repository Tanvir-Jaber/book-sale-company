<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$Adid = $_SESSION ['Aid'];
$Adname = $_SESSION ['Aname'];
$Ademail = $_SESSION ['Aemail'];
$dbmanipulate = new DataManipulation();
$details = $dbmanipulate->showUserProfile($Ademail);
if (isset($_SESSION ['Aid']) && isset($_SESSION ['Aname']) && isset($_SESSION ['Aemail']) ){
    include_once "admin_head.php";
    ?>
    <?php
    if (isset($_SESSION["updateMsg"])){
        echo $_SESSION["updateMsg"];
        unset($_SESSION["updateMsg"]);
    }
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a style="background-color:#0b3e6f;color:white;text-decoration: none" class="nav-link active" href="#activity" data-toggle="tab">Update Profile</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form id="" action="../process/data-process.php" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div style="margin-top: 10px" class="col-sm-12 mb-2">
                                                <input type="hidden" value="<?php echo $Adid?>" name="id">
                                                <input type="text" class="form-control" name="name" value="<?php echo $details->name?>" placeholder="Name">
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input disabled type="text" class="form-control" name="email" value="<?php echo $details->email?>">
                                                <input  type="hidden" class="form-control" name="email" value="<?php echo $details->email?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="change_admin_profile" class="form-control btn w-100 btn-info">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a style="background-color:#0b3e6f;color:white;text-decoration: none" class="nav-link active" href="#activitys" data-toggle="tab">Change Password</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activitys">
                                    <form id="UpdatePass" action="../process/data-process.php" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div style="margin-top: 10px" class="col-sm-12 mb-2">
                                                <input type="hidden" value="<?php echo $Adid?>" name="user_no">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Create password">
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input type="password" class="form-control" name="repass" placeholder="Confirm password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="change-pass" class="form-control btn w-100 btn-danger">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
    <?php
    include_once "admin_foot.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $("#UpdatePass").validate({
            rules:{
                password:{
                    required: true,
                    minlength:6
                },
                repass:{
                    required: true,
                    minlength:6,
                    equalTo:"#password"
                }
            },

            messages:{
                password:{
                    required: "Please provide a strong password",
                    minlength:" Password should be above 5 characters "
                },
                repass:{
                    required: "Please provide a confirm password",
                    minlength:"Password should be above 5 characters ",
                    equalTo:"Confirm Password Should be same to Password"
                }
            }
        });

    </script>
    <?php
}
else{
    header("Location: ../../login.php");
}
?>