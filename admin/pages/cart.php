<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">سفارشات</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">سفارشات</li>
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
              <h3 class="card-title">لیست سفارشات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>نام</th>
                  <th>ایمیل</th>
                  <th>تاریخ</th>
                  <th>وضعیت ارسال</th>
                  <th>مشاهده</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from cart where status='1' group by user_email order by send_status";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $email = $row['user_email'];
                    $date = $row['date'];
                    $send_status = $row['send_status'];
                    #
                    $get_user = "select * from user where email='$email'";
                    $run_user = mysqli_query($con, $get_user);
                    $row_user = mysqli_fetch_array($run_user);
                    $name = $row_user['name'];
                ?>
                <tr>
                    <td><?php echo($name); ?></td>
                    <td><?php echo($email); ?></td>
                    <td><?php echo($date); ?></td>
                    <td><?php if($send_status == '0'){echo('در انتظار ارسال');}else{echo('ارسال شده');} ?></td>
                    <td><a class="btn btn-primary" href="index.php?show&email=<?php echo($email); ?>">مشاهده</a></td>
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
</div>
<!-- /.content-header -->

