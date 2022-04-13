<?php
include('includes/db.php');
$pro_ids = str_split($_SESSION['compare']);
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>مقایسه محصولات</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap-rtl.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet-rtl.css" />
<link rel="stylesheet" type="text/css" href="css/responsive-rtl.css" />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <?php include('includes/header.php'); ?>
    <!-- Main آقایانu End-->
  </div>
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="compare.php">مقایسه محصولات</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">مقایسه محصولات</h1>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td colspan="4"><strong>جزئیات محصول</strong></td>
                </tr>
              </thead>
              <?php
              if($pro_ids[0] == ''){
                echo('<h3>محصولی برای مقایسه وجود ندارد</h3>');
              }else{
                $names = array();
                $imgs = array();
                $prices = array();
                $cats = array();
                $descs = array();
                $cpus = array();
                $rams = array();
                $cameras = array();
                $storages = array();
                for($i=0;$i<count($pro_ids);$i++){
                  $get = "select * from pro where id=".$pro_ids[$i];
                  $run = mysqli_query($con, $get);
                  $row = mysqli_fetch_array($run);
                  array_push($names, $row['name']);
                  array_push($imgs, $row['img']);
                  array_push($prices, $row['price']);
                  array_push($descs, $row['description']);
                  array_push($cpus, $row['cpu']);
                  array_push($rams, $row['ram']);
                  array_push($cameras, $row['camera']);
                  array_push($storages, $row['storage']);
                  $get_cat = "select * from cat where id=".$row['cat_id'];
                  $run_cat = mysqli_query($con, $get_cat);
                  $row_cat = mysqli_fetch_array($run_cat);
                  array_push($cats, $row_cat['name']);
                }
              } ?>
              <tbody>
                <tr>
                  <td>محصولات</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><a href="pro.php?id=<?php echo($pro_ids[$i]); ?>"><strong><?php echo($names[$i]); ?></strong></a></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>تصویر</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td class="text-center"><img class="img-responsive" src="img/product/<?php echo($imgs[$i]); ?>"></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>قیمت</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><?php echo($prices[$i]); ?></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>برند</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><a href="cat.php?cat=<?php echo($cats[$i]); ?>"><?php echo($cats[$i]); ?></a></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>خلاصه</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td class="description"><?php echo($descs[$i]); ?></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>CPU</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><?php echo($cpus[$i]); ?></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>RAM</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><?php echo($rams[$i]); ?></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>Camera</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><?php echo($cameras[$i]); ?></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>Storage</td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td><?php echo($storages[$i]); ?></td>
                  <?php } ?>
                </tr>
              </tbody>
              <tbody>
                <tr>
                  <td></td>
                  <?php
                  for($i=0;$i<count($names);$i++){ ?>
                    <td>
                    <form method="POST" action="func/add_cart.php">
                      <input type="hidden" name='id' value='<?php echo($pro_ids[$i]); ?>'>
                      <input class="btn btn-primary btn-block" type="submit" name='submit' value="افزودن به سبد" />
                    </form>
                    <br>
                    <a class="btn btn-danger btn-block" href="func/del_compare.php?id=<?php echo($pro_ids[$i]); ?>">حذف</a></td>
                  <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
  <!--Footer Start-->
  <?php include('includes/footer.php'); ?>
  <!--Footer End-->
  
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>