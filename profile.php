<?php
include('includes/db.php');
if(!isset($_SESSION['email'])){
    header('Location: index.php');
}
$email = $_SESSION['email'];
$get_u = "select * from user where email='$email'";
$run_u = mysqli_query($con, $get_u);
$row_u = mysqli_fetch_array($run_u);
$name_u = $row_u['name'];
$pass = $row_u['pass'];
$address = $row_u['address'];
$postal = $row_u['postal'];
$phone = $row_u['phone'];
$flag_form = $flag_pass = $flag_user = false;
if(isset($_POST['submit'])){
  if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['address'] == '' || $_POST['postal'] == ''){
    $flag_form = true;
  }else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $old_pass = $_POST['old_pass'];
    if($old_pass == ''){
      $update = "update user set name='$name', email='$email', phone='$phone', address='$address', postal='$postal' where email='$email'";
      $run_update = mysqli_query($con ,$update);
      if($run_update){
        $flag_user = true;
      }
    }else{
      if(md5($old_pass) == $pass){
        $new_pass = $_POST['pass'];
        $confirm = $_POST['confirm'];
        if($new_pass == $confirm){
          $new_pass = md5($new_pass);
          $update = "update user set name='$name', email='$email', phone='$phone', address='$address', postal='$postal', pass='$new_pass' where email='$email'";
          $run_update = mysqli_query($con ,$update);
          if($run_update){
            $flag_user = true;
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8"/>
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>فروشگاه اینترنتی موبایل</title>
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
      <div class="row">
        
        <!-- Left Part Start-->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <?php include('includes/aside.php'); ?>
        </aside>
        <!-- Left Part End-->
        
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">ویرایش اطلاعات حساب</h1>
          <?php
            if($flag_form){
              echo('<h1 class="title text-warning">لطفا اطلاعات خواسته شده را تکمیل کنید</h1>');
            }
            if($flag_pass){
              echo('<h1 class="title text-warning">پسوردها مثل هم نیستند</h1>');
            }
            if($flag_user){
              echo('<h1 class="title text-warning">اطلاعات با موفقیت بروز شد</h1>');
            }
          ?>
          <form class="form-horizontal" method="POST">
            <fieldset id="account">
              <legend>اطلاعات شخصی شما</legend>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="<?php echo($name_u); ?>" name="name">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="<?php echo($email); ?>" name="email">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="<?php echo($phone); ?>" name="phone">
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>آدرس</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">آدرس</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="آدرس " value="<?php echo($address); ?>" name="address">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="<?php echo($postal); ?>" name="postal">
                </div>
              </div>
            </fieldset>
            <fieldset>
            <h2 class="title text-warning">اگر قصد تغییر پسورد را ندارید فیلدهای زیر را خالی بگذارید</h2>
              <legend>رمز عبور شما</legend>
              
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور قبلی</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="رمز عبور قبلی" value="" name="old_pass">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور جدید</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="رمز عبور جدید" value="" name="pass">
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
                <input type="submit" class="btn btn-primary" value="بروزرسانی" name='submit' id='submit'>
              </div>
            </div>
          </form>
          <div class="col-sm-9" id="content">
          <h1 class="title">سفارشات شما</h1>
          <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <td><strong>نام</strong></td>
                  <td><strong>عکس</strong></td>
                  <td><strong>تعداد</strong></td>
                  <td><strong>قیمت</strong></td>
                  <td><strong>تاریخ سفارش</strong></td>
                  <td><strong>وضعیت ارسال</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php
                $get_cart = "select * from cart where user_email='$email' order by send_status";
                $run_cart = mysqli_query($con, $get_cart);
                while($row_cart = mysqli_fetch_array($run_cart)){
                  $pro_id = $row_cart['pro_id'];
                  $count = $row_cart['count'];
                  $date = $row_cart['date'];
                  $status = $row_cart['send_status'];
                  #
                  $get_pro = "select * from pro where id=$pro_id";
                  $run_pro = mysqli_query($con, $get_pro);
                  $row_pro = mysqli_fetch_array($run_pro);
                  $name = $row_pro['name'];
                  $img = $row_pro['img'];
                  $price = $row_pro['price']; ?>

                  <tr>
                    <td><a href="pro.php?id=<?php echo($pro_id); ?>"><?php echo($name); ?></a></td>
                    <td><div class="image"><img width="50%" class="img-responsive" src="img/product/<?php echo($img); ?>" /></div></td>
                    <td><?php echo($count); ?></td>
                    <td><?php echo($count * $price); ?></td>
                    <td><?php echo($date); ?></td>
                    <td>
                      <?php 
                        if($status == '0'){
                          echo('ارسال نشده');
                        }else{
                          echo('ارسال شده');
                        }
                      ?>
                    </td>
                  </tr>

                <?php } ?>
                
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