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
                View Order Details
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">order details</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <table  class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>Book No</th>
                            <th>Order Name</th>
                            <th>Book Name</th>
                            <th>Book Price</th>
                            <th>Quantity</th>
                            <th>Transaction Details</th>
                            <th>Status</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $list_all_books = $dbmanipulate->viewOrderShowOwnersDetailsInfo($Meemail);
                        $i = 0;
                        if ($list_all_books){
                            foreach ($list_all_books as $list_all_book){
                                ?>
                                <tr>
                                    <td style="padding: 10px" class="active"><?php echo $list_all_books[$i]->reffer_no ?></td>
                                    <td style="padding: 10px" class="active"><?php echo $list_all_books[$i]->name ?></td>
                                    <td style="padding: 10px" class="active"><?php echo $list_all_books[$i]->book_name ?></td>
                                    <td style="padding: 10px" class="danger"><?php echo $list_all_books[$i]->book_price ?></td>
                                    <td style="padding: 10px" class="success"><?php echo $list_all_books[$i]->item ?></td>
                                    <td style="padding: 10px" class="success"><?php echo $list_all_books[$i]->transaction ?></td>
                                    <td class="info">
                                        <?php if ($list_all_books[$i]->status == 'success'){?>
                                            <span class="btn-sm btn-success">Success</span>
                                        <?php } else echo '<span class="btn-sm btn-info">Pending</span>'?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
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
?><?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 22-Jun-21
 * Time: 4:01 AM
 */