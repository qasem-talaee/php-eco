<?php
$target_dir = "../img/product/".date('Y-m').'/';
$id = $_GET['id'];
$get = "select * from pro where id=$id";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$name = $row['name'];
$img = $row['img'];
$price = $row['price'];
$cat_id = $row['cat_id'];
$desc = $row['description'];
$cpu = $row['cpu'];
$ram = $row['ram'];
$camera = $row['camera'];
$storage = $row['storage'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat_id = $_POST['cat_id'];
    $desc = $_POST['desc'];
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $camera = $_POST['camera'];
    $storage = $_POST['storage'];
    #
    if($_FILES['img']['name'] == ''){
          $insert = "update pro set name='$name', price='$price', cat_id='$cat_id', description='$desc', cpu='$cpu', ram='$ram', camera='$camera', storage='$storage' where id=$id";
          $run = mysqli_query($con, $insert);
          if($run){
              echo('<script>location.replace("index.php?pro");</script>');
          }
    }else{
        if(!is_dir($target_dir)){
            mkdir($target_dir);
          }
          $img_name = $_FILES['img']['name'];
          $img_tmp = $_FILES['img']['tmp_name'];
          move_uploaded_file($img_tmp, $target_dir.$img_name);
          $img = date('Y-m').'/'.$img_name;
          #
          $insert = "update pro set name='$name', img='$img', price='$price', cat_id='$cat_id', description='$desc', cpu='$cpu', ram='$ram', camera='$camera', storage='$storage' where id=$id";
          $run = mysqli_query($con, $insert);
          if($run){
              echo('<script>location.replace("index.php?pro");</script>');
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
            <h1 class="m-0 text-dark">ویرایش کردن محصول</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش کردن محصول</li>
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
            <form method="POST" action="index.php?pro_edit&id=<?php echo($id); ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>نام</label>
                        <input type="text" class="form-control" name="name" value="<?php echo($name); ?>">
                    </div>
                    <h3 class="text-warning bg-dark">اگر قصد تغییر عکس را ندارید فیلد زیر را خالی بگذارید</h3>
                    <div class="form-group">
                        <label>عکس</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <div class="form-group">
                        <label>قیمت</label>
                        <input type="text" class="form-control" name="price" value="<?php echo($price); ?>">
                    </div>
                    <div class="form-group">
                        <label>برند</label>
                        <select class="form-control" name="cat_id">
                            <?php
                            $get = "select * from cat";
                            $run = mysqli_query($con, $get);
                            while($row = mysqli_fetch_array($run)){
                                $id = $row['id'];
                                $name = $row['name']; ?>
                                <option value="<?php echo($id); ?>"><?php echo($name); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>CPU</label>
                        <input type="text" class="form-control" name="cpu" value="<?php echo($cpu); ?>">
                    </div>
                    <div class="form-group">
                        <label>RAM</label>
                        <input type="text" class="form-control" name="ram" value="<?php echo($ram); ?>">
                    </div>
                    <div class="form-group">
                        <label>Camera</label>
                        <input type="text" class="form-control" name="camera" value="<?php echo($camera); ?>"> 
                    </div>
                    <div class="form-group">
                        <label>Storage</label>
                        <input type="text" class="form-control" name="storage" value="<?php echo($storage); ?>">
                    </div>
                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea class="form-control" name="desc" rows="5"><?php echo($desc); ?></textarea> 
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

