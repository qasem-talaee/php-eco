<?php 
include('db.php');
session_start();
include('func/get_ip.php');
?>
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
          </div>
          <div id="top-links" class="nav pull-right flip">
            <?php
            if(isset($_SESSION['email'])){ ?>
            <ul>
              <li><a href="logout.php">خروج</a></li>
              <li><a href="profile.php">سلام خوش آمدید <?php echo($_SESSION['email']); ?></a></li>
            <?php }else{ ?>
            <ul>
              <li><a href="login.php">ورود</a></li>
              <li><a href="register.php">ثبت نام</a></li>
            </ul>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </nav>
    <!-- Top Bar End-->

    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="index.php"><img class="img-responsive" src="image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
              <span class="cart-icon pull-left flip"></span>
              <?php
              if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $get_mini = "select * from cart where user_email='$email' and status='0'";
                $run_mini = mysqli_query($con, $get_mini);
                $count_cart = 0;
                $total = 0;
                while($row_mini = mysqli_fetch_array($run_mini)){
                  $pro_id_mini = $row_mini['pro_id'];
                  $count = $row_mini['count'];
                  $get_detail = "select * from pro where id=$pro_id_mini";
                  $run_detail = mysqli_query($con, $get_detail);
                  $row_detail = mysqli_fetch_array($run_detail);
                  $price = $row_detail['price'];
                  $name = $row_detail['name'];
                  $img = $row_detail['img'];
                  $count_cart = $count_cart + 1;
                  $total = $total + ($price * $count);
                }
              }else{
                $ip = getUserIP();
                $get_mini = "select * from uncart where ip='$ip'";
                $run_mini = mysqli_query($con, $get_mini);
                $count_cart = 0;
                $total = 0;
                while($row_mini = mysqli_fetch_array($run_mini)){
                  $pro_id_mini = $row_mini['pro_id'];
                  $count = $row_mini['count'];
                  $get_detail = "select * from pro where id=$pro_id_mini";
                  $run_detail = mysqli_query($con, $get_detail);
                  $row_detail = mysqli_fetch_array($run_detail);
                  $price = $row_detail['price'];
                  $name = $row_detail['name'];
                  $img = $row_detail['img'];
                  $count_cart = $count_cart + 1;
                  $total = $total + ($price * $count);
                }
              }
              ?>
              <span id="cart-total"><?php echo($count_cart); ?> آیتم جمعا <?php echo($total); ?></span></button>
              <ul class="dropdown-menu">
                <li>
                  <table class="table">
                    <tbody>
                      <?php
                      if(isset($_SESSION['email'])){
                        $email = $_SESSION['email'];
                        $get_mini = "select * from cart where user_email='$email' and status='0'";
                        $run_mini = mysqli_query($con, $get_mini);
                      }else{
                        $ip = getUserIP();
                        $get_mini = "select * from uncart where ip='$ip'";
                        $run_mini = mysqli_query($con, $get_mini);
                      }
                      while($row_mini = mysqli_fetch_array($run_mini)){
                        $pro_id_mini = $row_mini['pro_id'];
                        $count = $row_mini['count'];
                        $get_detail = "select * from pro where id=$pro_id_mini";
                        $run_detail = mysqli_query($con, $get_detail);
                        $row_detail = mysqli_fetch_array($run_detail);
                        $price = $row_detail['price'];
                        $name = $row_detail['name'];
                        $img = $row_detail['img']; ?>
                          <tr>
                            <td class="text-center"><a href="pro.php?id=<?php echo($pro_id_mini); ?>"><img class="img-thumbnail" src="img/product/<?php echo($img); ?>"></a></td>
                            <td class="text-left"><a href="pro.php?id=<?php echo($pro_id_mini); ?>"><?php echo($name); ?></a></td>
                            <td class="text-right">x <?php echo($count); ?></td>
                            <td class="text-right"><?php echo($price * $count); ?> تومان</td>
                            <td class="text-center"><form method="POST" action="func/del_cart.php"><input type="hidden" name='id' value="<?php echo($pro_id_mini); ?>" /><input type="submit" name='submit' class="btn btn-danger btn-xs remove" value='حذف' /></form></td>
                          </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>جمع کل</strong></td>
                          <td class="text-right"><?php echo($total); ?> تومان</td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="cart.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a href="checkout.php" class="btn btn-primary"><i class="fa fa-share"></i> تسویه حساب</a></p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Mini Cart End-->
          <!-- جستجو Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
              <button type="button" class="button-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <!-- جستجو End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main آقایانu Start-->
    <div class="container">
      <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="خانه" href="index.php"><span>خانه</span></a></li>
            <li class="mega-menu dropdown"><a>دسته ها</a>
              <div class="dropdown-menu">
                <div class="column col-lg-2 col-md-3"><a href="#">برندها</a>
                  <div>
                    <ul>
                        <?php
                        $get_cat_h = "select * from cat";
                        $run_cat_h = mysqli_query($con, $get_cat_h);
                        while($row_cat_h = mysqli_fetch_array($run_cat_h)){
                            $cat_id = $row_cat_h['id'];
                            $cat_name = $row_cat_h['name']; ?>
                                <li><a href="cat.php?cat=<?php echo($cat_name); ?>"><?php echo($cat_name); ?></a></li>
                        <?php } ?>
                    </ul>
                  </div>
                </div>
                        </li>
                        <li class="mega-menu dropdown"><a href="compare.php">مقایسه</a>
          </ul>
        </div>
      </nav>
    </div>