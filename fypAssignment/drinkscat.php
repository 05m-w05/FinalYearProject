<?php
session_start();
if(isset($_SESSION['user_id'])){

}else{
    header('location:login.php');
}
include ('container/dbcon.php');
include ('container/links.php');

$sql = "SELECT * FROM product WHERE category='Drinks'";
$drinks_cat = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css">
<div class="navigation">

    <ul id='menu'>
        <li><?php
            $username = $_SESSION['user_id'];
            $u_name = explode('@',$username);
            echo $u_name[0];
            ?></li>
        <li><a href='shoppingCart.php'>Shopping cart <span id="total"><?php echo $total;?></span></a></li>
        <li><a href='userpage.php'>Back to categories</a></li>

    </ul>
</div>

<div class="welcomemsg" >

    <h1>Drinks</h1>

</div>


<div class=""

<head>
    <title>  Drinks   </title>

</head>
<div class="full_page">




    <div class="main-container">
        <?php //print_r($_SESSION['cart']);?>
        <main>

            <?php
            while($row = mysqli_fetch_assoc($drinks_cat)){

                ?>


                <div  class="card">


                    <div class="image">

                        <img  class="prodimg" height="150px" width="150px" alt="" src="<?php echo $row["image_url"]; ?>">

                    </div>

                    <div class="description" >


                        <p class="product_name">Product Name: <?php echo $row["product_name"]; ?></p>
                        <p class="tesco_price">Tesco Price: £<?php echo $row["tesco_price"]; ?></p>
                        <p class="asda_price">Asda Price: £<?php echo $row["asda_price"]; ?></p>
                        <p class="coop_price">Co-op Price: £<?php echo $row["coop_price"]; ?></p>
                        <p class="iceland_price">Iceland Price: £<?php echo $row["iceland_price"]; ?></p>
                        <p class="morrisons_price">Morrisons Price: £<?php echo $row["morrisons_price"]; ?></p>
                        <p class="sainsburys_price">Sainsbury's Price: £<?php echo $row["sainsburys_price"]; ?></p>
                        <button data-id="<?php echo $row["product_ID"]; ?>" class="add cartbutton">Add to cart</button>
                    </div>
                </div>

            <?php };

            ?>


        </main>
    </div>


</div>


<?php include ('cartscript.php');?>
</html>
