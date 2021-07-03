<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$dbmanipulate = new DataManipulation();
$Adid = $_SESSION ['Mid'];
$Adname = $_SESSION ['Mname'];
$Ademail = $_SESSION ['Memail'];
if (isset($_SESSION ['Mid']) && isset($_SESSION ['Mname']) && isset($_SESSION ['Memail']) ){
    include_once "owner_head.php";

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
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Home
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>
        <section class="content">
            <div style="margin-left: auto;margin-right: auto;" class="row">
                <?php
                $list_all_books = $dbmanipulate->viewAllBooksBymail($Ademail);
                $i = 0;
                if ($list_all_books){
                    foreach ($list_all_books as $list_all_book){
                        ?>
                        <div class="col-lg-3 col-xs-6">
                            <div style="margin-bottom: 10px" class="card" style="width: 18rem;">
                                <img style="width: 220px;height: 260px!important;" class="card-img-top" src="<?php echo $list_all_books[$i]->image ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5  style="margin-bottom:0;display: block;width:200px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 30ch!important;" class="card-title text-center"><b>Title: <?php echo $list_all_books[$i]->title ?></b></h5>
                                    <span class="card-text"><b>Writer Name: <?php echo $list_all_books[$i]->writer_name ?><b></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
                ?>


              <!--  <div class="col-lg-4 col-xs-6">
                    <div class="card" style="width: 18rem;">
                        <img style="width: 220px;height: 250px" class="card-img-top" src="https://courses.cs.washington.edu/courses/cse557/00wi/info/images/hearnbaker_big.jpg" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title ">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>-->
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