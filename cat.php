<?php
$cat = $_GET['cat'];
include('includes/db.php');
$get_cat = "select * from cat where name='".$cat."'";
$run_cat = mysqli_query($con, $get_cat);
$row_cat = mysqli_fetch_array($run_cat);
$cat_id = $row_cat['id'];
$get_pro = "select * from pro where cat_id='".$cat_id."'";
$run_pro = mysqli_query($con, $get_pro);
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title><?php echo($cat); ?></title>
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
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cat.php?cat=<?php echo($cat); ?>"><?php echo($cat); ?></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
        <?php include('includes/aside.php'); ?>
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title"><?php echo($cat); ?></h1>
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
            </div>
          </div>
          <br />
          <div class="row products-category">
            <?php
            while($row_pro = mysqli_fetch_array($run_pro)){
              $id = $row_pro['id'];
              $img = $row_pro['img'];
              $name = $row_pro['name'];
              $price = $row_pro['price']; ?>

            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="pro.php?id=<?php echo($id); ?>"><img src="img/product/<?php echo($img); ?>" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="pro.php?id=<?php echo($id); ?>"><?php echo($name); ?> </a></h4>
                    <p class="price"> <?php echo($price); ?> تومان</p>
                  </div>
                  <div class="button-group">
                  <form method="POST" action="func/add_cart.php">
                  <input type="hidden" name='id' value='<?php echo($id); ?>'>
                  <input class="btn-primary" type="submit" name='submit' value="افزودن به سبد" />
                </form>
                    <div class="add-to-links">
                    <a href="func/add_compare.php?id=<?php echo($id); ?>"><i class="fa fa-exchange"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
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