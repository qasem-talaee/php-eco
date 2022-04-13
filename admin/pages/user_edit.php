<?php
$id = $_GET['id'];
$get = "select * from user where id=$id";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$postal = $row['postal'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    if($_POST['new_pass'] == ''){
        $update = "update user set name='$name', email='$email', phone='$phone', address='$address', postal='$postal' where id=$id";
        $run = mysqli_query($con, $update);
        if($run){
            echo('<script>location.replace("index.php?user");</script>');
        }
    }else{
        $new_pass = $_POST['new_pass'];
        $confirm = $_POST['confirm'];
        if($new_pass == $confirm){
            $new_pass = md5($new_pass);
            $update = "update user set name='$name', email='$email', phone='$phone', address='$address', postal='$postal', pass='$new_pass' where id=$id";
            $run = mysqli_query($con, $update);
            if($run){
                echo('<script>location.replace("index.php?user");</script>');
            }
        }
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش کاربران</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش کاربران</li>
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
            <!-- /.card-header -->
            <div class="card-body">
            <form method="POST" action="index.php?user_edit&id=<?php echo($id); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>نام</label>
                        <input type="text" class="form-control" name="name" value="<?php echo($name); ?>">
                    </div>
                    <div class="form-group">
                        <label>ایمیل</label>
                        <input type="email" class="form-control" name="email" value="<?php echo($email); ?>">
                    </div>
                    <div class="form-group">
                        <label>تلفن</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo($phone); ?>">
                    </div>
                    <div class="form-group">
                        <label>آدرس</label>
                        <input type="text" class="form-control" name="address" value="<?php echo($address); ?>">
                    </div>
                    <div class="form-group">
                        <label>کد پستی</label>
                        <input type="text" class="form-control" name="postal" value="<?php echo($postal); ?>">
                    </div>
                    <h4 class="text-warning bg-dark">اگر قصد تغییر پسورد را ندارید فیلدهای زیر را خالی بگذارید</h4>
                    <div class="form-group">
                        <label>پسورد جدید</label>
                        <input type="password" class="form-control" name="new_pass">
                    </div>
                    <div class="form-group">
                        <label>تایید پسورد</label>
                        <input type="password" class="form-control" name="confirm">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="بروزرسانی" name="submit" />
                </div>
              </form>
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

