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
                                <?php
                                if(isset($_GET['notice_id'])){
                                    $noticeId=$_GET['notice_id'];
                                    $noticeData=$dbmanipulate->viewNoticeByid($_GET['notice_id']);
                                }
                                ?>
                                <form action="../process/data-process.php" method="post">
                                    <input type="hidden" name="name" value="<?php echo $details->name?>">
                                    <div class="card-body">
                                        <strong><i class="fa fa-book mr-1"></i>নোটিশ বক্স</strong>
                                        <textarea style="resize: none; height: 150px" name="notice" class="main-search form-control" required><?php echo $noticeData->notice?></textarea>
                                        <input type="hidden" name="notice_id" value="<?php echo $noticeId?>">
                                        <button type="submit" name="editNotice" style="background: #02c27f;border: #00adc2;color: #ffffff;font-weight: bold" class="btn btn-block btn-outline-success mt-1"><i class="fa fa-sign-language mr-2" aria-hidden="true"></i> Update Notice</button>
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
    ?>

    <?php
}
else{
    header("Location: ../../login.php");
}
?>