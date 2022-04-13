<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">برندها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">برندها</li>
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
              <h3 class="card-title">لیست برندها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>نام</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from cat";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $name = $row['name'];
                ?>
                <tr>
                    <td><?php echo($name); ?></td>
                    <td><a class="btn btn-primary" href="index.php?cat_edit&id=<?php echo($id); ?>">ویرایش</a></td>
                    <td><a class="btn btn-warning" href="index.php?cat_del&id=<?php echo($id); ?>">حذف</a></td>
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

