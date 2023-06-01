<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('location:userpage.php');
}else{

}
?>
<html lang="en">
<meta charset="UTF-8">
<head>
    <title>  LOGIN   </title>
</head>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css">
<div id="full_page">
<style>
    .login_page{
        padding:20px;
        width: 50%;
        margin:0 auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    .login_page input{
        width: 100%;
        padding: 20px;
        font-size:18px;
        margin-top:15px;
        border:none;
        border-bottom:solid 1px gray;
    }
    .login_page button{
        width:100%;
        padding:15px;
        background: lightgray;
        color: #000;
        font-size: 18px;
        font-weight:bold;
        border:solid 2px black;
        margin-top:20px;
    }
    .login_page button:hover{
        background: black;
        color: white;
    }
    .login_page h1{
        text-decoration: none;
        font-size:45px;
    }
</style>
<div>

    <div class="navigation">
        <ul id='menu'>
            <li><a href='index.php'>Index</a></li>
            <li><a href='login.php'>Login</a></li>
            <li><a href='shoppingCart.php'>Shopping cart</a></li>
        </ul>
    </div>
</div>
    <div class="login_page">
        <div style="text-align:center;">
        <img src="https://cdn-icons-png.flaticon.com/512/5509/5509636.png" width="150px">
        </div>
        <h1>  LOGIN   </h1>
        <div class="theloginform">
            <div class="form">
                <form class='loginform' action="authenticate.php" method="post">
                    <input type="email" name='email' placeholder="Email" required/><br><br>
                    <input type="password" name='password' placeholder="password" required/><br><br><br>
                    <button>Authenticate</button>

                    <h5>Dont have an account?</h5>

                    <a class="rebutton" href='register.php'>Register</a></form>
            </div>
        </div>
    </div>

</main>
</div>
</html>