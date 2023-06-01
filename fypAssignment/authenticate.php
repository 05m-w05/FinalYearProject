<?php
include_once 'login.php';



$connection=mysqli_connect('localhost','root','');


mysqli_select_db($connection,'addtocart');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];




$select="select * from register_table where email_id='$email' && password='$password'";
$result=mysqli_query($connection,$select);
$num=mysqli_num_rows($result);
if($num==1)
{
    $_SESSION['user_id'] = $email;
    header('location:userpage.php');

}
else
{
    echo "Failed to authenticate";
}
?>