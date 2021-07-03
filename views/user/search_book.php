<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$dbmanipulate = new DataManipulation();
$Adid = $_SESSION ['Sid'];
$Adname = $_SESSION ['Sname'];
$Ademail = $_SESSION ['Semail'];
if (isset($_SESSION ['Sid']) && isset($_SESSION ['Sname']) && isset($_SESSION ['Semail']) ){
    include_once "user_head.php";
    ?>
    <style>
        img:hover {
            animation: shake 0.5s;
            animation-iteration-count: infinite;
        }

        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            10% { transform: translate(-1px, -2px) rotate(-1deg); }
            20% { transform: translate(-3px, 0px) rotate(1deg); }
            30% { transform: translate(3px, 2px) rotate(0deg); }
            40% { transform: translate(1px, -1px) rotate(1deg); }
            50% { transform: translate(-1px, 2px) rotate(-1deg); }
            60% { transform: translate(-3px, 1px) rotate(0deg); }
            70% { transform: translate(3px, 1px) rotate(-1deg); }
            80% { transform: translate(-1px, -1px) rotate(1deg); }
            90% { transform: translate(1px, 2px) rotate(0deg); }
            100% { transform: translate(1px, -2px) rotate(-1deg); }
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Search
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>
        <section class="content">
            <div style="margin-left: auto;margin-right: auto;" class="row">
                <form action="search_book.php" method="get">
                    <div class="col-md-12 row">
                        <div class="col-md-4">
                            <select name="search_type" class="form-control" required>
                                <option value="writer_name">Writer Name</option>
                                <option value="title">Title</option>
                                <option value="shop_name">Shop Name</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 10px" class="col-md-8">
                            <input name="search" type="text" class="form-control" placeholder="Search.." value="<?php echo $_GET['search'] ?>" required>
                        </div>
                    </div>
                </form>
                <?php
                $search_type = $_GET['search_type'];
                $search = $_GET['search'];
                $list_all_books = $dbmanipulate->viewAllBooksForUsersSearch($search_type,$search);
                /*var_dump($list_all_books);*/
                $count_total = count($list_all_books);
                $i = 0;
                echo "<p style='font-weight: bold; font-size: 20px'>Total Search Result Found $count_total <p>";
                if ($list_all_books){
                    foreach ($list_all_books as $list_all_book){
                        ?>
                        <div class="col-lg-3 col-xs-6">
                            <div style="margin-bottom: 10px" class="card" style="width: 18rem;">
                                <img class="img-thumbnail" style="width: 220px;height: 260px!important;" class="card-img-top" src="<?php echo $list_all_books[$i]->image ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5  style="margin-bottom:0;display: block;width:200px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 30ch!important;" class="card-title text-center"><b>Title: <?php echo $list_all_books[$i]->title ?></b></h5>
                                    <span class="card-text"><b>Writer Name: <?php echo $list_all_books[$i]->writer_name ?><b></span>
                                    <?php
                                    $true_xart = $dbmanipulate->checkCartIsStatus($list_all_books[$i]->reffer_no,$Ademail);
                                    if(!$true_xart){
                                        ?>
                                        <form action="../process/data-process.php" method="post">
                                            <input type="hidden" name="image" value="<?php echo $list_all_books[$i]->image ?>">
                                            <input type="hidden" name="name" value="<?php echo $details->name ?>">
                                            <input type="hidden" name="email" value="<?php echo $details->email ?>">
                                            <input type="hidden" name="reffer_no" value="<?php echo $list_all_books[$i]->reffer_no ?>">
                                            <input type="hidden" name="owner_email" value="<?php echo $list_all_books[$i]->email ?>">
                                            <input type="hidden" name="book_name" value="<?php echo $list_all_books[$i]->book_name ?>">
                                            <input type="hidden" name="writer_name" value="<?php echo $list_all_books[$i]->writer_name ?>">
                                            <input type="hidden" name="price" value="<?php echo $list_all_books[$i]->price ?>">
                                            <button type="submit" name="cart-btn-active" class="btn btn-info form-control">Add to cart</button>
                                        </form>
                                        <?php
                                    }else echo "<button style='background-color: #d9534f'  disabled class=\"btn btn-danger form-control\">Add to cart</button>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </section>
    </div>
    <?php
    include_once "user_foot.php";
    ?>

    <?php
}
else{
    header("Location: ../../login.php");
}
?>