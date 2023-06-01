
<?php

require_once 'prodconnection.php';

$connection=mysqli_connect('localhost','root','');


mysqli_select_db($connection,'homepage');
$sql = "SELECT * FROM bestprods";
$all_best_prod = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css">



<div class="navigation">
    <ul id='menu'>
        <li><a href='index.php'>Home</a></li>
        <li><a href='login.php'>Login</a></li>
        <li><a href='shoppingCart.php'>Shopping cart</a></li>



    </ul>
</div>

<div class="welcomemsg" >

    <h1>Our top picks</h1>

</div>


<div class=""

<head>
    <title>  HOME   </title>
</head>
<div class="full_page">




<div class="main-container">
<main>

    <?php
        while($row = mysqli_fetch_assoc($all_best_prod)){

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
        <button class="add" onclick="location.href = 'login.php';">Login for more</button>
    </div>
</div>

<?php }; ?>


</main>
</div>

    <footer>

        <p>Brands we compare </p>

    <div class="footerimg" >

        <img  alt="" width="60" height="60" src="./images/Asda.jpg" />
        <img  alt="" width="60" height="60" src="./images/Coop.jpg" />
        <img  alt="" width="60" height="60" src="./images/Iceland.jpg" />
        <img  alt="" width="60" height="60" src="./images/Morrisons.jpg" />
        <img  alt="" width="60" height="60" src="./images/Sainsburys.jpg" />
        <img  alt="" width="60" height="60" src="images/Tesco.jpg" />

    </div>

    </footer>


</div>

</html>