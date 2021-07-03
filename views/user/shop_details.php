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
if (isset($_SESSION ['Sid']) && isset($_SESSION ['Sname']) && isset($_SESSION ['Semail']) ){
    include_once "user_head.php";
    if (isset($_GET['book_id_reffer'])){
        $Book_data = $dbmanipulate->bookDataCollect($_GET['book_id_reffer']);
    }
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Shop Owner Details
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">owner shop details</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <table  class="table table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Shop Name</th>
                            <th>Location</th>
                            <th>Phone Number</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $list_all_books = $dbmanipulate->viewOwnerFullDetailsInfo();
                        $i = 0;
                        $k = 1;
                        if ($list_all_books){
                            foreach ($list_all_books as $list_all_book){
                                ?>
                                <tr>
                                    <td style="padding: 10px" class="active"><?php echo $k++; ?></td>
                                    <td style="padding: 10px" class="active"><?php echo $list_all_books[$i]->name ?></td>
                                    <td style="padding: 10px" class="danger"><?php echo $list_all_books[$i]->shop_name ?></td>
                                    <td style="padding: 10px" class="success"><?php echo $list_all_books[$i]->address." , ".$list_all_books[$i]->city ?></td>
                                    <td style="padding: 10px" class="success"><?php echo $list_all_books[$i]->pnumber ?></td>
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
    include_once "user_foot.php";
    ?>
    <script>


    </script>
    <?php
}
else{
    header("Location: ../../login.php");
}
?><?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 24-Jun-21
 * Time: 3:47 AM
 */