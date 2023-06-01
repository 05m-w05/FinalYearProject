<?php

session_start();
include_once 'register.php';
$connection=mysqli_connect('localhost','root','');


mysqli_select_db($connection,'addtocart');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$select="select * from register_table where email_id='$email'";
$result=mysqli_query($connection,$select);
$num=mysqli_num_rows($result);
if($num==1)
{
    echo " user already exists";

}
else
{
    $reg="insert into register_table(name,email_id,password) values('$name','$email','$password')";
    mysqli_query($connection,$reg);
}
?>