<?php
require_once 'prodconnection2.php';

session_start();
if(isset($_SESSION['user_id'])){

}else{
    header('location:login.php');
}

$connection=mysqli_connect('localhost','root','');



mysqli_select_db($connection,'addtocart');
mysqli_select_db($connection,'userpage');




$sql = "SELECT * From product where category='Drinks' ";
$sql2 = "SELECT * From product where category='Essentials' ";
$sql3 = "SELECT * From product where category='Crisps' ";
$sql4 = "SELECT * From product where category='Groceries' ";
$sql5 = "SELECT * From product where category='Household and Cleaning' ";
$sql6 = "SELECT * From product ";
$sql7 = "SELECT * From categories_userpage ";


$drinks_cat = $connection->query($sql);
$essentials_cat = $connection->query($sql2);
$crisps_cat = $connection->query($sql3);
$groceries_cat = $connection->query($sql4);
$all_prod = $connection->query($sql6);

$cat_prod = $connection->query($sql7);







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
        <li><a href='logout.php'>Logout</a></li>
        <li><a href='shoppingCart.php'>Shopping cart</a></li>
        <li><a href="order_history.php">Order History</a> </li>
    </ul>
</div>

<div class="welcomemsg" >

    <h1>Please select a category</h1>

</div>


<div class=""

<head>
    <title>  User Page   </title>
</head>
<div class="full_page">




    <div class="main-container">



        <main class="user_page_flex_rem">

            <?php
            while($row = mysqli_fetch_assoc($cat_prod)){

            ?>


                <div  class="card">


                    <div class="image">

                        <img  class="prodimg" height="150px" width="150px" alt="" src="<?php echo $row["theimg_url"]; ?>">

                    </div>


<div>


                        <a class="catname" href="<?php echo $row["file"]; ?>"><?php echo $row["category"]; ?></a>


</div>
                </div>


            <?php }; ?>
        </main>
    </div>




</div>

</html>