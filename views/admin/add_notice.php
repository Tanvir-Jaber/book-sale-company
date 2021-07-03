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
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Notice
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">New notice</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="card card-success">
                                <div class="card-header">
                                </div>
                                <form action="../process/data-process.php" method="post">
                                    <input type="hidden" name="name" value="<?php echo $details->name?>">
                                    <div class="card-body">
                                        <strong><i class="fa fa-book mr-1"></i>নোটিশ বক্স</strong>
                                        <input type="text" name="notice_title" class="form-control" placeholder="দয়া করে আপনি শিরোনাম লিখুন" required>
                                        <textarea style="resize: none; height: 150px" name="notice" class="main-search form-control" required></textarea>
                                        <button type="submit" name="addNotice" style="background: #02c27f;border: #00adc2;color: #ffffff;font-weight: bold" class="btn btn-block btn-outline-success mt-1"><i class="fa fa-sign-language mr-2" aria-hidden="true"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info" >
                            <?php

                            if(isset($_SESSION['inserMsg'])){
                                echo $_SESSION['inserMsg'];
                                unset($_SESSION['inserMsg']);
                            }
                            if(isset($_SESSION['updateMsg'])){
                                echo $_SESSION['updateMsg'];
                                unset($_SESSION['updateMsg']);
                            }
                            if(isset($_SESSION['deleteMsg'])){
                                echo $_SESSION['deleteMsg'];
                                unset($_SESSION['deleteMsg']);
                            }
                            ?>
                            <div class="card-body">

                            </div>

                            <h5><i class="fa fa-info"></i> নোটিশ দেখুন:</h5>
                            <?php
                            $list = $dbmanipulate->viewNoticeInfo();

                            if($list){
                                foreach ($list as $lists){
                                    ?>
                                    <div class="row">
                                        <div style="padding-left: 25px" class="col-md-10"><b><?php $date = $lists->date; echo  date(' m/d/Y', strtotime($date));?></b></div>
                                        <div  class="col-md-2 btn-group" style="display: flex;justify-content: right!important;">
                                            <a style="text-decoration: none" href="edit_notice.php?notice_id=<?php echo $lists->no?>" class="btn btn-primary btn-outline-secondary btn-round"> Edit</a>
                                            <a style="text-decoration: none" href="../process/data-process.php?delete_notice=<?php echo $lists->no?>" class="btn btn-danger btn-outline-success btn-round">Delete</a>
                                        </div>
                                    </div>
                                    <div style="text-transform:capitalize;font-weight:bold;white-space:pre-wrap;font-size: 30px; padding-left: 13px"><?php echo $lists->title?></div>
                                    <div style="white-space:pre-wrap;font-size: 17px; padding-left: 13px"><?php echo $lists->notice?></div>
                                    <?php
                                }}

                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include_once "admin_foot.php";
    ?>

    <?php
}
else{
    header("Location: ../../login.php");
}
?>