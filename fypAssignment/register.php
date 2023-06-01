<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css" type="text/css">
<head>
    <title>  REGISTER   </title>
</head>

<div>
<div class="navigation">
    <ul id='menu'>
        <li><a href='index.php'>Index</a></li>
        <li><a href='login.php'>Login</a></li>
        <li><a href='shoppingCart.php'>Shopping cart</a></li>
    </ul>


</div>
</div>
<body>
<h2>  REGISTER   </h2>

<div class="form1">
    <form class='registerform' action="regAuth.php" method="post">
        <h1 class="main-heading">Register Form</h1>
        <input type="text" name='name' placeholder="Name" required/>
        <input type="email" name='email' placeholder="Email" required/>
        <input type="password" name='password' placeholder="password" required/>
        <button>REGISTER</button>
    </form>
</div>


</body>
</html>