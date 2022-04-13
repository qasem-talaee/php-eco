<?php
include('includes/db.php');
#include('func/get_ip.php');
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>سبد خرید</title>
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
        <li><a href="cart.php">سبد خرید</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">تصویر</td>
                    <td class="text-left">نام محصول</td>
                    <td class="text-left">تعداد</td>
                    <td class="text-right">قیمت واحد</td>
                    <td class="text-right">کل</td>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                    if(isset($_SESSION['email'])){
                      $email = $_SESSION['email'];
                      $get_cart = "select * from cart where user_email='$email' and status='0'";
                      $run_cart = mysqli_query($con, $get_cart);
                    }else{
                      $ip = getUserIP();
                      $get_cart = "select * from uncart where ip='$ip'";
                      $run_cart = mysqli_query($con ,$get_cart);
                    }
                    $total = 0;
                    while($row_cart = mysqli_fetch_array($run_cart)){
                      $id = $row_cart['pro_id'];
                      $count = $row_cart['count'];
                      #
                      $get_pro_d = "select * from pro where id=$id";
                      $run_pro_d = mysqli_query($con, $get_pro_d);
                      $row_pro_d = mysqli_fetch_array($run_pro_d);
                      $name = $row_pro_d['name'];
                      $img = $row_pro_d['img'];
                      $price = $row_pro_d['price'];
                      $total = $total + ($price * $count);
                      ?>
                      <tr>
                        <td colspan="0.5" class="text-center"><a href="pro.php?id=<?php echo($id); ?>"><img src="img/product/<?php echo($img); ?>" width="20%" class="img-thumbnail" /></a></td>
                        <td colspan="1" class="text-left"><a href="pro.php?id=<?php echo($id); ?>"><?php echo($name); ?></a><br />
                        <td colspan="1" class="text-left"><div class="input-group btn-block quantity">
                            <input type="text" name="count" value="<?php echo($count); ?>" size="1" class="form-control" />
                            <span class="input-group-btn">
                            <form method="POST" action="func/del_cart.php"><input type="hidden" name='id' value="<?php echo($pro_id_mini); ?>" /><input type="submit" name='submit' class="btn btn-danger btn-xs remove" value='حذف' />
                            </span></div></td>
                        <td colspan="1" class="text-right"><?php echo($price); ?> تومان</td>
                        <td colspan="1" class="text-right"><?php echo($price * $count); ?> تومان</td>
                      </tr>
                    <?php }
                    ?>
                    
                </tbody>
              </table>
            </div>
          <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>

          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tr>
                  <td class="text-right"><strong>جمع کل:</strong></td>
                  <td class="text-right"><?php echo($total); ?> تومان</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.php" class="btn btn-default">ادامه خرید</a></div>
            <div class="pull-right"><a href="checkout.php" class="btn btn-primary">تسویه حساب</a></div>
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