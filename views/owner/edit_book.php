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
if (isset($_SESSION ['Mid']) && isset($_SESSION ['Mname']) && isset($_SESSION ['Memail']) ){
    include_once "owner_head.php";
    if (isset($_GET['book_id_reffer'])){
        $Book_data = $dbmanipulate->bookDataCollect($_GET['book_id_reffer']);
    }
    ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Book
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">edit book</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a style="background-color:#0b3e6f;color:white;text-decoration: none" class="nav-link active" href="#activity" data-toggle="tab">Edit Book</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form id="" action="../process/data-process.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div style="margin-top: 10px" class="col-sm-6 mb-2">
                                                <input disabled type="text" class="form-control" name="book_no"  placeholder="Book ID" value="<?php echo $Book_data->reffer_no?>" required>
                                                <input  type="hidden" class="form-control" name="book_no"  placeholder="Book ID" value="<?php echo $Book_data->reffer_no?>" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-6 mb-2">
                                                <input type="text" class="form-control" name="book_name"  placeholder="Book Name" value="<?php echo $Book_data->book_name?>" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-6">
                                                <input  type="text" class="form-control" name="writer_name"  placeholder="Writer Name" value="<?php echo $Book_data->writer_name?>" required>
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-6">
                                                <input type="text" class="form-control" name="title"  placeholder="Book Title" value="<?php echo $Book_data->title?>" required>
                                                <input  type="hidden" class="form-control" name="email" value="<?php echo $details->email?>">
                                            </div>
                                            <div style="margin-top: 10px" class="col-sm-6">
                                                <input type="text" class="form-control" name="price"  placeholder="Book Price" value="<?php echo $Book_data->price?>" required>
                                            </div>
                                            <div style="margin-top: 10px;margin-bottom: 10px;" class="col-sm-6">
                                                <input name="file" type="file" class="file-upload-field" accept="image/*" value="<?php echo $Book_data->image?>" >
                                                <input  name="new_image" type="hidden" class="form-control file-upload-fields " accept="image/*" value="<?php echo $Book_data->image?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="edit_book_owner" class="form-control btn w-100 btn-info">Insert Book Details</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
    <?php
    include_once "owner_foot.php";
    ?>
    <script>


    </script>
    <?php
}
else{
    header("Location: ../../login.php");
}
?>