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
                View Admin Details
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Admin</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $list = $dbmanipulate->Admin();
                                if ($list){
                                    foreach ($list as $lists){
                                        ?>
                                        <tr>
                                            <td><?php echo $lists->name?></td>
                                            <td><?php echo $lists->email?></td>
                                            <td><span class="label label-success"><?php echo $lists->position?></span></td>
                                            <td>
                                                <a href="../process/data-process.php?user_bno22=<?php echo $lists->no; ?>" style="border-radius: 20%;font-size: 10px" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
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