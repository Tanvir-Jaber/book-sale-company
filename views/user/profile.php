<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$Meid = $_SESSION ['Sid'];
$Mename = $_SESSION ['Sname'];
$Meemail = $_SESSION ['Semail'];
$dbmanipulate = new DataManipulation();
$details = $dbmanipulate->showUserProfile($Meemail);
$details_shopOwners = $dbmanipulate->showshopUsersProfile($Meemail);
if ($details_shopOwners){
    $address = $details_shopOwners->address;
    $city = $details_shopOwners->city;
    $state =$details_shopOwners->state;
    $pnumber = $details_shopOwners->pnumber;
}
else{
    $address="";$city="";$state="";$pnumber="";
}
if (isset($_SESSION ['Sid']) && isset($_SESSION ['Sname']) && isset($_SESSION ['Semail']) ){
    include_once "user_head.php";
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
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                                <input type="text" class="form-control" name="name" value="<?php echo $details->name?>" placeholder="Name" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input disabled type="text" class="form-control" name="email" value="<?php echo $details->email?>">
                                                <input  type="hidden" class="form-control" name="email" value="<?php echo $details->email?>">
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input  type="text" class="form-control" name="city" value="<?php echo $city?>" placeholder="City" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input type="text" class="form-control" name="address" value="<?php echo $address?>" placeholder="Address" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input type="text" class="form-control" name="state" value="<?php echo $state?>" PLACEHOLDER="State" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-12">
                                                <input type="text" class="form-control" name="pnumber" value="<?php echo $pnumber?>" placeholder="Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="change_sellers_profile" class="form-control btn w-100 btn-info">Update Profile</button>
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
                                                <input type="hidden" value="<?php echo $Meid?>" name="user_no">
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
    include_once "user_foot.php";
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