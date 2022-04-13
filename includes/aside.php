<?php include('db.php'); ?>
<h3 class="subtitle">پرفروش ها</h3>
    <?php
    $get_a_pro = "select * from pro order by rand() limit 10";
    $run_a_pro = mysqli_query($con, $get_a_pro);
    while($row_a_pro = mysqli_fetch_array($run_a_pro)){
        $id = $row_a_pro['id'];
        $name = $row_a_pro['name'];
        $price = $row_a_pro['price'];
        $img = $row_a_pro['img']; ?>
            <div class="side-item">
            <div class="product-thumb clearfix">
                <div class="image"><a href="pro.php?id=<?php echo($id); ?>"><img src="img/product/<?php echo($img); ?>"  class="img-responsive" /></a></div>
                <div class="caption">
                <h4><a href="pro.php?id=<?php echo($id); ?>"><?php echo($name); ?></a></h4>
                <p class="price"><?php echo($price); ?> تومان</p>
                </div>
            </div>
    <?php } ?>
    
</div>