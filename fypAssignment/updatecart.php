<?php
session_start();

$id=$_POST['idd'];
$qty=$_POST['qtyy'];
$op = $_POST['op'];

if($op == "plus"){
    $new=++$qty;
}else{
    $new=--$qty;
}



foreach($_SESSION['cart'] as &$value){
    if($value[0] === $id){
        $value[1]=$new;
        break;
    }

}
echo "0";

?>
