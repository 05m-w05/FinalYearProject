<?php

    //include ('container/dbcon.php');
$connection=mysqli_connect('localhost','root','');


mysqli_select_db($connection,'addtocart');

    $o_id = $_GET['id'];

    $reg="DELETE FROM `p_checkout` WHERE `id`='$o_id'";
    $run = mysqli_query($connection,$reg);

    if($run = true){
        echo '<script>window.location.href="order_history.php?status=true"</script>';
    }else{
        echo '<script>window.location.href="order_history.php?status=error"</script>';
    }
?>