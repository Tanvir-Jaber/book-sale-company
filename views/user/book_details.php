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
<style>
    .typewriter{
        display: inline-block;
    }
    .typewriter h1 {
        color: #00ad9c;
        overflow: hidden;
        border-right: .10em solid orange;
        white-space: nowrap;
        margin: 0 auto;
        letter-spacing: .12em; /* Adjust as needed */
        animation:
                typing 3.5s steps(40, end ),
                blink-caret .75s step-end infinite ;

    }
    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }

    /* The typewriter cursor effect */
    @keyframes blink-caret {
        from, to { border-color: transparent }
        40% { border-color: orange; }
    }
    .b-l-s {
        border: 4px #ba55d3;
        border-left-style: solid;
    }
    .b-r-s {
        border: 4px #167e50;
        border-right-style: solid;
    }
    .box-style {
        background-color: rgba(127, 127, 127, 0.1);
        padding: 1rem;
        /*width: 200px;*/
        margin-bottom: 1rem;
    }
</style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Cart
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">cart</li>
            </ol>
        </section>
        <section style="margin-top: 20px" class="content">
            <div style="margin: 25px" class="row">
                <div class="row col-md-8">
                    <?php
                    $results = $dbmanipulate->allCartviaUserEmail($Meemail);
                    $count_book = count($results);
                    /*var_dump($result[0]);*/
                    $k = 0;
                    $item = 0;
                    if ($results){
                        foreach ($results as $result){
                            $k = $k+($result->book_price*$result->item);
                            $item = $item+$result->item;
                            ?>
                                <div class="row box-style b-l-s b-r-s">
                                    <div  class="col-md-5">
                                        <img class="img-thumbnail" style="height: 240px;width: 200px" src="<?php echo $result->image?>">
                                    </div>
                                    <div class="col-md-7">
                                        <p style="font-weight:bold ; font-size: 20px">Book Name: <?php echo $result->book_name?> </p>
                                        <p style="font-size: 20px">Book Price: <?php echo $result->book_price?> </p>
                                        <p style="font-size: 20px">Writer Name: <?php echo $result->writer_name?> </p>
                                        <form action="../process/data-process.php" method="post">
                                            <p style="font-size: 20px">Quantity:
                                                <input style="width: 40px;margin-right: 2px" type="number" name="item_value" min="1" value="<?php echo $result->item?>" required>
                                                <input type="hidden" name="item_no" value="<?php echo $result->cart_no?>" >
                                                <input class="btn-danger" name="cart_delete_item_value" type="submit" value="Delete">
                                                <input class="btn-info" name="cart_update_item_value" type="submit" value="update"></p>
                                        </form>

                                    </div>
                                </div>
                                <?php

                            }
                    ?>
                </div>
                <form action="../process/data-process.php" method="post">
                    <div style="margin-left:20px; padding: 20px" class="col-md-4 img-thumbnail b-l-s">
                        <p style="font-weight:bold;font-family:'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif;font-size: 18px">Name: <?php echo $details->name?></p>
                        <p style="font-weight:bold;font-family:'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif;font-size: 18px">Total Books: <?php echo $count_book?></p>
                        <p style="font-weight:bold;font-family:'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif;font-size: 18px">Total Item: <?php echo $item?></p>
                        <p style="font-weight:bold;font-family:'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif;font-size: 18px">Total Price: <?php echo $k?> TK</p>
                        <p style="text-align: justify"><b>Note:</b> Please Pay through this Number <span style="font-weight: bold" class="text-danger">01850751714</span> then provide transaction number below section.</p>
                        <input type="text" class="form-control" name="transaction-number" placeholder="Transaction Number" required><br>
                        <input type="hidden" class="form-control" name="resutl-all" placeholder="Transaction Number" value="<?php echo $Meemail?>"><br>
                        <input type="submit" name="pay-btn" class="form-control btn btn-danger" value="Pay">
                    </div>
                </form>
            </div>
            <?php } else{
                ?>
                <div class="typewriter">
                    <h1 class="text-center">The Cart Section is Empty.<a href="home.php"> Please Go To Home Page.</a></h1>
                </div><?php
            }
            ?>
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