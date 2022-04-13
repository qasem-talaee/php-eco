<?php
function add_uncart_cart (){
    session_start();
    include('get_ip.php');
    include('includes/db.php');
    $email = $_SESSION['email'];
    $ip = getUserIP();
    $get_un = "select * from uncart where ip='$ip'";
    $run_un = mysqli_query($con, $get_un);
    if(mysqli_num_rows($run_un) != 0){
        while($row_un = mysqli_fetch_array($run_un)){
            $pro_id = $row_un['pro_id'];
            $count = $row_un['count'];
            #
            $get_exist = "select * from cart where user_email='$email' and pro_id='$pro_id' and status='0'";
            $run_exist = mysqli_query($con, $get_exist);
            if(mysqli_num_rows($run_exist) != 0){
                $row_exist = mysqli_fetch_array($run_exist);
                $cart_id = $row_exist['id'];
                $count_exist = (int)$row_exist['count'];
                $count_new = (string)($count_exist + (int)$count);
                $update = "update cart set count='$count_new' where id=$cart_id";
                $run = mysqli_query($con, $update);
                $del = "delete from uncart where ip='$ip' and pro_id='$pro_id'";
                $run = mysqli_query($con, $del);
            }else{
                $insert = "insert into cart (id, user_email, pro_id, count, date, status, send_status) values (NULL, '$email', '$pro_id', '$count', NOW(), '0', '0')";
                $run = mysqli_query($con, $insert);
                $del = "delete from uncart where ip='$ip' and pro_id='$pro_id'";
                $run = mysqli_query($con, $del);
            }
        }
    }
}
?>