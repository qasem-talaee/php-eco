<?php
include('includes/db.php');
include('func/add_uncart_cart.php');
$email = $pass = '';
$flag = false;
if(isset($_POST['submit'])){
  if($_POST['email'] == '' || $_POST['pass'] == ''){
    $flag = true;
  }else{
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $pass = md5($pass);
    $get_user = "select * from user where email='$email' and pass='$pass'";
    $run_user = mysqli_query($con ,$get_user);
    $count = mysqli_num_rows($run_user);
    if($count != 0){
      $_SESSION['email'] = $email;
      add_uncart_cart();
      header('Location: profile.php');
    }
  }
}
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>ورود</title>
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
        <li><a href="login.php">حساب کاربری</a></li>
        <li><a href="login.php">ورود</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">حساب کاربری ورود</h1>
          <div class="row">
            <div class="col-sm-6">
              <h2 class="subtitle">مشتری جدید</h2>
              <p><strong>ثبت نام حساب کاربری</strong></p>
              <p>با ایجاد حساب کاربری میتوانید سریعتر خرید کرده، از وضعیت خرید خود آگاه شده و تاریخچه ی سفارشات خود را مشاهده کنید.</p>
              <a href="register.php" class="btn btn-primary">ادامه</a> </div>
            <div class="col-sm-6">
              <h2 class="subtitle">مشتری قبلی</h2>
              <form method="POST">
              <p><strong>من از قبل مشتری شما هستم</strong></p>
                <div class="form-group">
                  <label class="control-label" for="input-email">آدرس ایمیل</label>
                  <input type="text" name="email" value="" placeholder="آدرس ایمیل" id="input-email" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-password">رمز عبور</label>
                  <input type="password" name="pass" value="" placeholder="رمز عبور" id="input-password" class="form-control" />
                  <br />
                <input type="submit" value="ورود" class="btn btn-primary" name='submit'/></form>
            </div>
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