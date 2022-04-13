<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">محصولات</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">محصولات</li>
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
              <h3 class="card-title">لیست محصولات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>نام</th>
                  <th>عکس</th>
                  <th>قیمت</th>
                  <th>برند</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from pro";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $img = $row['img'];
                    $price = $row['price'];
                    $cat_id = $row['cat_id'];
                    #
                    $get_cat = "select * from cat where id=$cat_id";
                    $run_cat = mysqli_query($con, $get_cat);
                    $row_cat = mysqli_fetch_array($run_cat);
                    $cat_name = $row_cat['name'];
                ?>
                <tr>
                    <td><a target="_blank" href="../pro.php?id=<?php echo($id); ?>"><?php echo($name); ?></a></td>
                    <td><img class="img-fluid" width="10%" src="../img/product/<?php echo($img); ?>" /></td>
                    <td><?php echo($price); ?></td>
                    <td><?php echo($cat_name); ?></td>
                    <td><a class="btn btn-primary" href="index.php?pro_edit&id=<?php echo($id); ?>">ویرایش</a></td>
                    <td><a class="btn btn-warning" href="index.php?pro_del&id=<?php echo($id); ?>">حذف</a></td>
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

