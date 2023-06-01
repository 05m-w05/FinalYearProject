<?php
session_start();
function delet_product($array, $value){
    $temp=array(); //Create temp array variable.
    foreach($array as $item){ //access array elements.
        if($item[0] != $value){ //Skip the value, Which is equal.
            array_push($temp,$item);  //Push the array element into $temp var.
        }
    }
    return $temp; // Return the $temp array variable.
}

$id=$_POST['idd'];

$_SESSION['cart']= delet_product($_SESSION['cart'],$id);
echo "0";


// $cars = delet_product($cars, "15");




?>