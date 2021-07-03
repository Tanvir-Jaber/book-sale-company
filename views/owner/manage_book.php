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
                Manage Books
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">books</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
               <div class="col-md-12">
                   <table  class="table table-bordered table-condensed table-hover">
                       <thead>
                       <tr>
                           <th >Book Name</th>
                           <th>Writer Name</th>
                           <th>Title</th>
                           <th>Action</th>
                       </tr>

                       </thead>
                       <tbody>
                       <?php
                       $list_all_books = $dbmanipulate->viewAllBooksBymail($Meemail);
                       $i = 0;
                       if ($list_all_books){
                           foreach ($list_all_books as $list_all_book){
                               ?>
                               <tr>
                                   <td style="padding: 10px" class="active"><?php echo $list_all_books[$i]->book_name ?></td>
                                   <td style="padding: 10px" class="success"><?php echo $list_all_books[$i]->writer_name ?></td>
                                   <td style="padding: 10px" class="warning"><?php echo $list_all_books[$i]->title ?></td>
                                   <td class="info">
                                       <a href="../process/data-process.php?book_id_reffer=<?php echo $list_all_books[$i]->book_no ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                       <a href="edit_book.php?book_id_reffer=<?php echo $list_all_books[$i]->book_no ?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-copy"></span></a>
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
?>