<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$Meid = $_SESSION ['Mid'];
$Mename = $_SESSION ['Mname'];
$Meemail = $_SESSION ['Memail'];
$dbmanipulate = new DataManipulation();
$details = $dbmanipulate->showUserProfile($Meemail);
$details_shopOwners = $dbmanipulate->showshopOwnersProfile($Meemail);
if ($details_shopOwners){
    $address = $details_shopOwners->address;
    $city = $details_shopOwners->city;
    $state =$details_shopOwners->state;
    $pnumber = $details_shopOwners->pnumber;
}
else{
    $address="";$city="";$state="";$pnumber="";
}
if (isset($_SESSION ['Mid']) && isset($_SESSION ['Mname']) && isset($_SESSION ['Memail']) ){
    include_once "owner_head.php";
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
                View Notice
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">notice</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="callout callout-info" >
                            <h3>Admin Notice</h3>
                            <?php
                            $notice = $dbmanipulate->viewNoticeInfo();

                            if($notice){
                                foreach ($notice as $list){
                                    $date=$list->date;
                                    $dateArray = explode("-",$date);

                                    $dateRevers= array_reverse($dateArray);
                                    $stringDate = implode("-", $dateRevers);
                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong style="color: #28a745"><?php echo"Date:- ". $list->date?></strong><span style="font-size: 20px; color: #a71d2a">
                                                <p style="font-weight:bold;white-space:pre-wrap;font-size: 30px;"><?php echo $list->title?></p>
                                        </div>

                                        <br>

                                        <div class="mb-2" style="white-space:pre-wrap;font-size: 17px; padding-left: 13px"><?php echo $list->notice?></div>
                                    </div>
                                    <hr>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include_once "owner_foot.php";
    ?>
    <?php
}
else{
    header("Location: ../../login.php");
}
?>