<?php
session_start();
if(isset($_SESSION['user_id'])){

}else{
    header('location:login.php');
}
include ('container/dbcon.php');
include ('container/links.php');


?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="style.css" type="text/css">
<head >
    <title>  SHOPPING CART   </title>

</head>
<style>
    table, tr, th, td {
        border:solid 1px gray;
        border-collapse: collapse;
        padding:10px;


    }


    .btn_hover{
        padding:10px 20px;
        background-color:lightgray;
        border:solid 2px black;
        font-size:16px;
        text-decoration: none;
        color:#000;
    }
    .btn_hover:hover{
        background-color: black;
        color:#fff;

    }
</style>
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
        <li><a href="order_history.php">Order History</a> </li>
    </ul>

</div>
</div>

<br>
<?php
if($_GET['status'] == "hi"){
    ?>
    <div>
        <p style="border:solid 1px red; padding: 15px; width: 80%; margin:0 auto;">The Order Saved Successfully!</p>
    </div>
    <?php
}else{

}
?>
<body>
<div style="width:80%; margin: 0 auto;">
<h2>  SHOPPING CART   </h2>
<table style="width:100%" >
    <tr>
        <th>#</th>
        <th>Product image</th>
        <th>Product Name</th>
        <th>Quantity Product</th>
<!--        <th>Single Product Price</th>-->
<!--        <th>Total Price</th>-->
<!--        <th>Total saving</th>-->
        <th>Action</th>


    </tr>

<?php //print_r($_SESSION['cart']);
$array_saved=$_SESSION['cart'];
$total=count($array_saved);


for($i=0; $i<$total; $i++){
    echo '<tr>';
    $p_id = $array_saved[$i][0];
    $sql = "SELECT * FROM `product` WHERE `product_ID`='$p_id'";
    $drinks_cat = $connection->query($sql);
    while($row = mysqli_fetch_assoc($drinks_cat)){
        $p_1 = $row['tesco_price'];
        $p_2 = $row['asda_price'];
        $p_3 = $row['iceland_price'];
        $p_4 = $row['morrisons_price'];
        $p_5 = $row['coop_price'];
        $p_6 = $row['sainsburys_price'];

        $min_price = min($p_1,$p_2,$p_3,$p_4,$p_5,$p_6);
        $max_price = max($p_1,$p_2,$p_3,$p_4,$p_5,$p_6);

        $qty = $array_saved[$i][1];
        $sprice = number_format($min_price,2);//single price
        $tprice = number_format($min_price*$qty,2); //total price
        $maxtprice = number_format($max_price*$qty,2);//total max price for saving calculation
        $totsav = number_format($maxtprice-$tprice,2);
        

         echo '
                <th>'.$i.'</th>
                <th><img  class="prodimg"  width="100px" alt="" src="'. $row["image_url"].'"></th>
                <th>'.$row["product_name"].'</th>
                <th><button  id="minus'.$p_id.'" data-id="'.$p_id.'">-</button>&nbsp;<input type="text"  id="qty'.$p_id.'" value="'.$qty.'">&nbsp;<button  id="plus'.$p_id.'" data-id="'.$p_id.'">+</button></th>
<!--                <th><span id="sprice'.$p_id.'">'.$sprice.'</span></th>
//                <th><span id="tprice'.$p_id.'">'.$tprice.'</span></th>
//                <th><span id="maxtprice'.$p_id.'">'.$totsav.'</span></th>
-->                <th><span class="delete_cart" data-id="'.$p_id.'" style="color:red; font-weight: bold; font-size: 20px; cursor:pointer;" >X</span></th>
            
         ';

    ?>



        <script>
            $('#plus<?php echo $p_id; ?>').on('click',function(e){
                e.preventDefault();
                //var total=$('#subtotal1').val();
                // getting total price
                var id=$(this).data('id');
                // getting product id
                var quantity = $('#qty<?php echo $p_id; ?>').val();
                // getting getting actual qtyyy
                //var get_price=$('#get_price<?php echo $p_id; ?>').val();
                var plus = 'plus';
                // getting getting actual price
                if(quantity>=1){
                    $.ajax({
                        url:'updatecart.php',
                        type:"POST",
                        data:{idd:id,qtyy:quantity, op:plus},
                        success:function(data){
                            //alert(data);
                            if (data=="0") {
                                new_quantity=++quantity;
                                $('#qty<?php echo $p_id; ?>').val(new_quantity);
                                var sprice = $('#sprice<?php echo $p_id; ?>').html();
                                tprice = parseFloat(sprice)*new_quantity;
                                tprice = tprice.toFixed(2);
                                $('#tprice<?php echo $p_id; ?>').html(tprice);
                            }
                        }
                    });
                }
            });
        </script>


        <script>
            $('#minus<?php echo $p_id; ?>').on('click',function(e){
                e.preventDefault();
                //var total=$('#subtotal1').val();
                // getting total price
                var id=$(this).data('id');
                // getting product id
                var quantity = $('#qty<?php echo $p_id; ?>').val();
                // getting getting actual qtyyy
                //var get_price=$('#get_price<?php echo $p_id; ?>').val();
                // getting getting actual price
                var minus = 'minus';
                if(quantity>=2){
                    $.ajax({
                        url:'updatecart.php',
                        type:"POST",
                        data:{idd:id,qtyy:quantity, op:minus},
                        success:function(data){
                            //alert(data);
                            if (data=="0") {
                                new_quantity=--quantity;
                                $('#qty<?php echo $p_id; ?>').val(new_quantity);
                                var sprice = $('#sprice<?php echo $p_id; ?>').html();
                                tprice = parseFloat(sprice)*new_quantity;
                                tprice = tprice.toFixed(2);
                                $('#tprice<?php echo $p_id; ?>').html(tprice);
                            }
                        }
                    });
                }
            });
        </script>

        <?php
    }

    echo '</tr>';
}
include ('deletescript.php');


?>
</table>

<table style="width:30%; " align="right">
    <?php
    $s_p_array = array();
    $p_stores = array('tesco_price', 'asda_price', 'coop_price', 'iceland_price', 'morrisons_price', 'sainsburys_price');
    $d_stores = array('Tesco', 'Asda', 'Coop', 'Iceland', 'Morrisons', 'Sainsburys'); //store names

    for($z=0; $z<=5; $z++){
        $s_name = $d_stores[$z];
        $store_icon = $s_name. '.jpg';

        $total_cart_price = 0;
        $array_saved=$_SESSION['cart'];
        $total=count($array_saved);

        for($i=0; $i<$total; $i++) {
            $p_id = $array_saved[$i][0];
            $sql = "SELECT * FROM `product` WHERE `product_ID`='$p_id'";
            $drinks_cat = $connection->query($sql);
            while ($row = mysqli_fetch_assoc($drinks_cat)) {
                $p_1 = $row[$p_stores[$z]];

                $qty = $array_saved[$i][1];
               // $sprice = number_format($p_1, 2);//single price
                $tprice = $p_1 * $qty; //total price
                $total_cart_price = $total_cart_price + $tprice; //whole cart price
            }
        }
        echo '
            <tr style="height: 20px;">
                <th><img width="70" height="70" src="./images/' . $store_icon . '" alt="' . $s_name . '"></th> 
                <td><p style="padding: 15px;">£'.number_format($total_cart_price,2).'</p></td>
            </tr>
        ';
        array_push($s_p_array, $total_cart_price);
    }

    $min_price_key = array_keys($s_p_array, min($s_p_array))[0];
    $winner_store = $d_stores[$min_price_key];
    ?>
    <tr style="height: 20px;">
        <th><p  style="padding: 15px;">Winner: <?php echo $winner_store;?> </p></th>
        <td><p style="padding: 15px;">£<?php echo number_format(min($s_p_array),2);?> </p></td>
    </tr>
    <tr style="height: 20px;">
        <th><p  style="padding: 15px; ">Total saving:</p></th>
        <td><p style="padding: 15px;">£<?php $saving = max($s_p_array) - min($s_p_array); echo number_format($saving,2); ?></p></td>
    </tr>
    <tr class="COUC" style="height: 20px; justify-content: space-around text-align: right">
        <td colspan="2" style="text-align: center "><p style="padding: 15px;">
            <a href="shoppingCart.php" class="btn_hover"  >Update Cart</a> <br>
             <br> <br>   <a href="checkout.php?savings=<?php echo $saving;?>" class="btn_hover" ">Check Out</a>
            </p> </td>
    </tr>

</table>
<?php //print_r($s_p_array)?>
</div>
</body>
</html>