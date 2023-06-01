<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "addtocart";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}




// Session start for the cart
session_start();
error_reporting(0);
if (!empty($_SESSION['cart']) || $_SESSION['cart']!="") {

}else{
    $_SESSION['cart']=array();
}
$total=count($_SESSION['cart']);

if (empty($total)) {
    $count=0;
}

?>


