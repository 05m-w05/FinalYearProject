<?php
    session_start();
if(isset($_SESSION['user_id'])){

}else{
    header('location:login.php');
}
    $id=$_POST['idd'];
    $qty=$_POST['quantity'];
    $product=array($id, $qty);
    $array_saved=$_SESSION['cart'];
    $total=count($array_saved);
    $total;
    if ($total==0) {
        array_push($_SESSION['cart'],$product);
    }
    $match=2;
    for($i=0; $i<$total; $i++){
        if($array_saved[$i][0]==$id){
            // $array_saved[$i][0];
            $match=1;
            $i=$total;
        }else{
            $match=0;
        }

    }
    if ($match == 1) {
        echo 'matched';
    }else if ($match == 0){
        echo "not match";
        array_push($_SESSION['cart'],$product);
    }else{
        echo "empty";
    }
?>