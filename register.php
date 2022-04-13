<?php
include('includes/db.php');
$name = $email = $phone = $address = $postal = $pass = $confirm = '';
$flag_form = $flag_pass = $flag_user = false;
if(isset($_POST['submit'])){
  if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['address'] == '' || $_POST['postal'] == '' || $_POST['pass'] == '' || $_POST['confirm'] == ''){
    $flag_form = true;
  }else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];
    if($pass != $confirm){
      $flag_pass = true;
    }else{
      $get_user = "select * from user where email='".$email."'";
      $run_user = mysqli_query($con, $get_user);
      $count = mysqli_num_rows($run_user);
      if($count != 0){
        $flag_user = true;
      }else{
        $pass = md5($pass);
        $insert = "insert into user (id,name,email,phone,address,postal,pass) values (NULL, '$name', '$email', '$phone', '$address', '$postal', '$pass')";
        $run_insert = mysqli_query($con, $insert);
        if($run_insert){
          header('Location: login.php');
        }
      }
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
<title>ثبت نام</title>
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
        <li><a href="register.php">ثبت نام</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">ثبت نام حساب کاربری</h1>
          <?php
            if($flag_form){
              echo('<h1 class="title text-warning">لطفا اطلاعات خواسته شده را تکمیل کنید</h1>');
            }
            if($flag_pass){
              echo('<h1 class="title text-warning">پسوردها مثل هم نیستند</h1>');
            }
            if($flag_user){
              echo('<h1 class="title text-warning">شما قبلا ثبت نام کرده اید</h1>');
            }
          ?>
          <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.php">صفحه لاگین</a> مراجعه کنید.</p>
          <form class="form-horizontal" method="POST">
            <fieldset id="account">
              <legend>اطلاعات شخصی شما</legend>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="" name="name">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="" name="phone">
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>آدرس</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">آدرس</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="آدرس " value="" name="address">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="" name="postal">
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>رمز عبور شما</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="رمز عبور" value="" name="pass">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" value="" name="confirm">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="ثبت نام" name='submit' id='submit'>
              </div>
            </div>
          </form>
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