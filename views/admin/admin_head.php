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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Book Selling</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../plugins/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../contents/css/style.css">
    <link rel="stylesheet" href="../../contents/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../plugins/morris.js/morris.css">
    <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../contents/css/toastr.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        body{
            font-size: 1.5em;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="index.php" class="logo">

            <span class="logo-mini"><b>BS</b></span>

            <span class="logo-lg"><b>Book Selling </b>Services</span>
        </a>
        <nav class="navbar navbar-static-top">

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="https://thumbs.dreamstime.com/b/two-color-admin-vector-icon-strategy-concept-isolated-blue-admin-vector-sign-symbol-can-be-use-web-mobile-logo-eps-149167982.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $details->name?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="https://cdn5.f-cdn.com/contestentries/1733723/43055135/5e49ec7ad607a_thumb900.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $details->name?> - Admin
                                    <small>Member since June. 2021</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../process/data-process.php?Alogout=1"  class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">

        <section style="margin-top: 20px" class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">
                <li class="">
                    <a href="index.php">
                        <i class="fa fa-home"></i> <span>Home</span>
                    </a>
                </li>
                <li class="">
                    <a href="profile.php">
                        <i class="fa fa-user-secret"></i> <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="view_all.php">
                        <i class="fa fa-files-o"></i>
                        <span>View All</span>
                    </a>
                </li>
                <li>
                    <a href="account_approval.php">
                        <i class="fa fa-th"></i> <span>Account Approval</span>
                        <span class="pull-right-container">
                        <!--<small class="label pull-right bg-green">4</small>-->
                        </span>
                    </a>
                </li>
                <li>
                    <a href="order_details.php">
                        <i class="fa fa-edit"></i> <span>Order Details</span>
                        <!--<span class="pull-right-container">
                        <small class="label pull-right bg-green">4</small>
                        </span>-->
                    </a>
                </li>
                <li>
                    <a href="add_notice.php">
                        <i class="fa fa-save"></i> <span>Add Notice</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="AddAdmin.php">
                        <i class="fa fa-bank"></i> <span>Add New Admin</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="view_Admin.php">
                        <i class="fa fa-telegram"></i> <span>Manage Admin</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="trash.php">
                        <i class="fa fa-trash"></i> <span>Trash</span>
                        <span class="pull-right-container">
                        <!--<small class="label pull-right bg-red">4</small>-->
                        </span>
                    </a>
                </li>
            </ul>
        </section>

    </aside>
