
<?php
session_start();


$connection=mysqli_connect('localhost','root','');


mysqli_select_db($connection,'addtocart');

//cart
$array_saved=$_SESSION['cart'];
$total=count($array_saved);
$cart_prod = "";
print_r($array_saved);
echo "<br>";
for($i=0; $i<$total; $i++){
    $c_prod = $array_saved[$i];
    $p_id = $c_prod[0];
    $p_qty = $c_prod[1];
    $cart_prod .= ">>".$p_id."-".$p_qty;
}
$my_email = $_SESSION['user_id'];
$date = date('m-d-Y');
$savings = $_GET['savings'];
if(!empty($array_saved)) {
    $reg = "INSERT INTO `p_checkout`(`email`, `cart`, `saving`,`date`) VALUES ('$my_email', '$cart_prod', '$savings','$date')";
    $run = mysqli_query($connection, $reg);
    if ($run = true) {
        $_SESSION['cart'] = array();
        echo '<script>window.location.href="shoppingCart.php?status=hi"</script>';

    }

}else{
    echo '<script>window.location.href="shoppingCart.php?status=bye"</script>';
}
?>