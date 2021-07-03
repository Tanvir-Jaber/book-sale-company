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
                Order History
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">order history</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <table  class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Price</th>
                            <th>Quantity</th>
                            <th>Transaction Details</th>
                            <th>Status</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $list_all_books = $dbmanipulate->viewOrderDetailsInfo($Meemail);
                        $i = 0;
                        if ($list_all_books){
                            foreach ($list_all_books as $list_all_book){
                                ?>
                                <tr>
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
    include_once "user_foot.php";
    ?>
    <script>


    </script>
    <?php
}
else{
    header("Location: ../../login.php");
}
?>