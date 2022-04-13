<?php
$email = $_GET['email'];
$get_user = "select * from user where email='$email'";
$run_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_array($run_user);
$name = $row_user['name'];
$phone = $row_user['phone'];
$address = $row_user['address'];
$postal = $row_user['postal'];

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">جزییات سفارش</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">جزییات سفارش</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جزییات کاربر</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h5>نام :‌</h5>
                <p><?php echo($name); ?></p>

                <h5>ایمیل :‌</h5>
                <p><?php echo($email); ?></p>

                <h5>تلفن :‌</h5>
                <p><?php echo($phone); ?></p>

                <h5>آدرس :‌</h5>
                <p><?php echo($address); ?></p>

                <h5>کد پستی :‌</h5>
                <p><?php echo($postal); ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">جزییات سفارش</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>نام</th>
                  <th>تعداد</th>
                  <th>قیمت هر واحد</th>
                  <th>قیمیت کل محصول</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from cart where user_email='$email' and status='1' and send_status='0'";
                $run = mysqli_query($con, $get);
                $total1 = 0;
                while($row = mysqli_fetch_array($run)){
                    $pro_id = $row['pro_id'];
                    $count = $row['count'];
                    #
                    $get_pro = "select * from pro where id=$pro_id";
                    $run_pro = mysqli_query($con, $get_pro);
                    $row_pro = mysqli_fetch_array($run_pro);
                    $name = $row_pro['name'];
                    $price = $row_pro['price'];
                    $total1 = $total1 + ($price * $count);
                ?>
                <tr>
                    <td><a target="_blank" href="../pro.php?id=<?php echo($pro_id); ?>"><?php echo($name); ?></a></td>
                    <td><?php echo($count); ?></td>
                    <td><?php echo($price); ?></td>
                    <td><?php echo($count * $price); ?></td>
                </tr>

                <?php } ?>
              </table>
              
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <h4 class="card-title">کل پرداختی کاربر به تومان <?php echo($total1); ?></h4><br />
            <a class="btn btn-primary btn-block" href="func/change.php?email=<?php echo($email); ?>">تغییر وضعیت ارسال سبد خرید</a><br>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
<!-- /.content-header -->

