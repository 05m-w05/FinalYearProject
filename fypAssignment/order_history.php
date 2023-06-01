<?php
session_start();
if(isset($_SESSION['user_id'])){

}else{
    header('location:login.php');
}
include ('container/dbcon.php');
include ('container/links.php');


$connection=mysqli_connect('localhost','root','');


mysqli_select_db($connection,'addtocart');
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="style.css" type="text/css">
<head >
    <title>  SHOPPING CART   </title>

</head>
<body>
<div class="navigation">
    <div>

        <ul id='menu'>
            <li><?php
                $username = $_SESSION['user_id'];
                $u_name = explode('@',$username);
                echo $u_name[0];
                ?></li>
            <li><a href='userpage.php'>Back to categories</a></li>
            <li><a href='shoppingCart.php'>Shopping cart</a></li>
        </ul>

    </div>
</div>

<h2 style="text-align: center;"> Order History </h2>
<br>
<?php
    if($_GET['status'] == "true"){
        ?>
        <div>
            <p style="border:solid 1px red; padding: 15px; width: 80%; margin:0 auto;">The Order Deleted Successfully!</p>
        </div>
        <?php
    }else{

    }
?>
<?php
    $s_p_array = array();
    $order_id_array = array();
    $get_email = $_SESSION['user_id'];
    $qry = "SELECT * FROM `p_checkout` WHERE email='$get_email'";
    $result = $connection->query($qry);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cart = $row['cart'];
            $cart_product = explode(">>", $cart);
            $order_id = $row['id'];
            array_push($s_p_array, $cart_product);
            array_push($order_id_array, $order_id);
        }
        // print_r($order_id_array);
    }
    $total=count($s_p_array);

    for($i=0; $i<$total; $i++) {
        echo '
            <table style="width: 80%; margin: 0 auto; margin-block: 20px;" border="2px">
                <tr style="background: #000; color: #fff;">
                    <td colspan="5">Order # '.$i.'</td>
                </tr>
                <tr>
                    <td>#</td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                </tr>
        ';
        $sec_arry = $s_p_array[$i];
        $total_sec=count($sec_arry);
        $f_price = 0;
        $tesco_price = 0;
        $asda_price = 0;
        $coop_price = 0;
        $iceland_price = 0;
        $morrisons_price = 0;
        $sainsburys_price = 0;
        for($j=0; $j<$total_sec; $j++) {
             $cart_p = $sec_arry[$j];
             $cart_sp = explode('-', $cart_p);
             $p_name = $cart_sp[0];
             $p_qty = floatval($cart_sp[1]);
            $qry = "SELECT * FROM `product` WHERE product_ID='$p_name'";
            $result = $connection->query($qry);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $p_name = $row['product_name'];
                    $tesco_price = $tesco_price + ($row['tesco_price']*$p_qty);
                    $asda_price = $asda_price + ($row['asda_price']*$p_qty);
                    $coop_price = $coop_price + ($row['coop_price']*$p_qty);
                    $iceland_price = $iceland_price + ($row['iceland_price']*$p_qty);
                    $morrisons_price = $morrisons_price + ($row['morrisons_price']*$p_qty);
                    $sainsburys_price = $sainsburys_price + ($row['sainsburys_price']*$p_qty);



                    echo '
                            <tr>
                                <td>'.$j.'</td>
                                <td>'.$p_name.'</td>
                                <td>'.$p_qty.'</td>
                            </tr>
                    ';

                }
            }
        }
        $price_list = array($tesco_price,$asda_price, $coop_price,  $iceland_price, $morrisons_price, $sainsburys_price);
        //print_r($price_list);
        $f_price = min($price_list);
        $saving = max($price_list) - min($price_list);
        echo '
                <tr>
                    <td>Total Amount</td>
                    <td colspan="2">'.number_format($f_price,2).'</td>
                 </tr>
                 <tr>
                    <td>Saving Amount</td>
                    <td>£'.$saving.'</td>
                    <td style="text-align: center;"><a href="delete_order.php?id='.$order_id_array[$i].'" style="color:red; font-weight: bold; ">X</a></td>
                </tr>
          </table>
          <br>';
    }
    ?>
        </body>
</html>