<?php
$id = $_GET['id'];
$get = "select * from cat where id=$id";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$name = $row['name'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $insert = "insert into cat (id, name) values (NULL, '$name')";
    $run = mysqli_query($con, $insert);
    if($run){
        echo('<script>location.replace("index.php?cat");</script>');
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش کردن برند</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش کردن برند</li>
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
            <form method="POST" action="index.php?cat_edit&id=<?php echo($id); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>نام</label>
                        <input type="text" class="form-control" name="name" value="<?php echo($name); ?>">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="ویرایش کردن" name="submit" />
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

