<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">حذف کاربران</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
              <li class="breadcrumb-item active">حذف کاربران</li>
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
                <h3 class="text-center">آیا از این کار اطمینان دارید؟امکان بازگشت اطلاعات وجود ندارد</h3>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <a href="func/del_user.php?id=<?php echo($_GET['id']); ?>" class="btn btn-warning">بله حذف کن</a>
                  <a href="index.php?user" class="btn btn-primary">خیر برگرد</a>
                </div>
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
