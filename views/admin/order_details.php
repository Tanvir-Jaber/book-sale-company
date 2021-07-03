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
    <?php
    if (isset($_SESSION["TostUpdate"])){
        echo $_SESSION["TostUpdate"];
        unset($_SESSION["TostUpdate"]);
    }
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                View All Account
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Trash</li>
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
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $list_all_books = $dbmanipulate->viewAdminOrderDetailsInfo();
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
                                    <td>
                                        <?php if ($list_all_books[$i]->status == 1){?>
                                        <a href="../process/data-process.php?ActiveStatusOneOrder=<?php echo $list_all_books[$i]->cart_no; ?>"style="border-radius: 20%;font-size: 10px" class="btn btn-success"><i class="fa fa-check"></i></a>
                                    <?php }?>
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
        <!-- /.content -->
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