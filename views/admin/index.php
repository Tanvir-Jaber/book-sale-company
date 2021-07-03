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
    <section class="content">
      <div class="row">
        <div class="col-lg-4 col-xs-6">

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php
                  $list = $dbmanipulate->PendingRequest();
                  $counts = 0;
                  if ($list){
                      foreach ($list as $value){
                          $counts++;
                      }
                      echo $counts;
                  }
                  else{
                      echo " 0 ";
                  }
                  ?><sup style="font-size: 20px"></sup></h3>

              <p>Pending Request</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php
                  $list = $dbmanipulate->SearchVia();
                  $count = 0;
                  if ($list){
                      foreach ($list as $value){
                          $count++;
                      }
                      echo $count;
                  }
                  else{
                      echo " 0 ";
                  }
                  ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">

          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
                  $list = $dbmanipulate->Admin();
                  $counts = 0;
                  if ($list){
                      foreach ($list as $value){
                          $counts++;
                      }
                      echo $counts;
                  }
                  else{
                      echo " 0 ";
                  }
                  ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Owners</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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