<?php
include('includes/db.php');
$pro_id = $_GET['id'];
$get_pro = "select * from pro where id=".$pro_id;
$run_pro = mysqli_query($con, $get_pro);
$row_pro = mysqli_fetch_array($run_pro);
$name = $row_pro['name'];
$img = $row_pro['img'];
$price = $row_pro['price'];
$desc = $row_pro['description'];
$cpu = $row_pro['cpu'];
$ram = $row_pro['ram'];
$camera = $row_pro['camera'];
$storage = $row_pro['storage'];
$cat_id = $row_pro['cat_id'];
$get_cat = "select * from cat where id=".$cat_id;
$run_cat = mysqli_query($con, $get_cat);
$row_cat = mysqli_fetch_array($run_cat);
$cat_name = $row_cat['name'];
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title><?php echo($name); ?></title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap-rtl.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="js/swipebox/src/css/swipebox.min.css">
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
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.php" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="cat.php?cat=<?php echo($cat_name); ?>" itemprop="url"><span itemprop="title"><?php echo($cat_name); ?></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="pro.php?id=<?php echo($pro_id); ?>" itemprop="url"><span itemprop="title"><?php echo($name); ?></span></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/محصولات">
            <h1 class="title" itemprop="name"><?php echo($name); ?></h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="img/product/<?php echo($img); ?>"  data-zoom-image="img/product/<?php echo($img); ?>" /> </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>برند :</b> <a href="cat.php?cat=<?php echo($cat_name); ?>"><span itemprop="brand"><?php echo($cat_name); ?></span></a></li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span itemprop="price"><?php echo($price); ?> تومان<span itemprop="availability" content="موجود"></span></span></li>
                </ul>
                <div id="product">
                  <div class="cart">
                    <div>
                    <form method="POST" action="func/add_cart.php">     
                      <div class="qty">
                        <label class="control-label" for="input-quantity">تعداد</label>
                        <input type="text" name="count" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>
                      <input type="hidden" name='id' value='<?php echo($pro_id); ?>'>
                      <input class="btn-primary" type="submit" name='submit' value="افزودن به سبد" /></form>
                    </div>
                    <div>
                      <br />
                      <a href="func/add_compare.php?id=<?php echo($pro_id); ?>"><i class="fa fa-exchange"></i>مقایسه</a>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
              <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <p><?php echo($desc); ?></p>
                </div>
              </div>
              <div id="tab-specification" class="tab-pane">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td><strong>cpu</strong></td>
                      <td><strong>ram</strong></td>
                      <td><strong>camera</strong></td>
                      <td><strong>storage</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo($cpu); ?></td>
                      <td><?php echo($ram); ?></td>
                      <td><?php echo($camera); ?></td>
                      <td><?php echo($storage); ?></td>
                    </tr>
                  </tbody>
                  </table>

              </div>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
        <?php include('includes/aside.php'); ?>
        </aside>
        <!--Right Part End -->
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
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="js/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
// Elevate Zoom for Product Page image
$("#zoom_01").elevateZoom({
	gallery:'gallery_01',
	cursor: 'pointer',
	galleryActiveClass: 'active',
	imageCrossfade: true,
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 500,
	zoomWindowPosition : 11,
	lensFadeIn: 500,
	lensFadeOut: 500,
	loadingIcon: 'image/progress.gif'
	}); 
//////pass the images to swipebox
$("#zoom_01").bind("click", function(e) {
  var ez =   $('#zoom_01').data('elevateZoom');
	$.swipebox(ez.getGalleryList());
  return false;
});
</script>
<!-- JS Part End-->
</body>
</html>