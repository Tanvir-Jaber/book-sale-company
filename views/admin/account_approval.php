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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Account Request
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Account approval</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Account request list</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $list = $dbmanipulate->PendingRequest();
                                if ($list){
                                    foreach ($list as $lists){
                            ?>
                            <tr>
                                <td><?php echo $lists->name?></td>
                                <td><?php echo $lists->email?></td>
                                <?php if($lists->position == 'Owner'){?>
                                <td><span class="label label-danger"><?php echo $lists->position?></span></td>
                                <?php }
                                else{ ?>
                                    <td><span class="label label-info"><?php echo $lists->position?></span></td>
                                <?php
                                }
                                ?>
                                <td>
                                    <a href="../process/data-process.php?Active_yes_userAccount=<?php echo $lists->no; ?>" style="border-radius: 20%;font-size: 10px" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
                                    <a href="../process/data-process.php?user_bno22=<?php echo $lists->no; ?>" style="border-radius: 20%;font-size: 10px" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

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