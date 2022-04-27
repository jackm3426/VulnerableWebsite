<?php
error_reporting(E_ERROR | E_PARSE);

require_once('config/db.php');
session_start();


$login = $_POST["login"];

if (isset($login)){
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM users WHERE username='$uname'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if ($row['username'] === $uname && $row['password'] === md5($pass)) {

        echo "Logged in!";

        $_SESSION['username'] = $row['username'];

        $_SESSION['isadmin'] = $row['is_admin'];

        $_SESSION['id'] = $row['user_id'];

        header("Location: user.php");

        exit();

    }else{

        header("Location: index.php?error=Incorrect User name or password");

        exit();

    }

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>The Railway Inn - Free House - Cononley</title>

</head>

<body>


<nav>
<div class="topnav">
<h3>The Railway Inn - Free House</h3>
<a href="index.php">Home</a>
<a href="events.html#events">Events</a>
<a href="contactus.html#contact">Contact Us</a>
<a href="review.php">Leave A Review</a>
<a class="active" href=login.php">Login</a>
<a href="products.php">Products</a>
</div>
</nav>

<main class="grid">
<article>
<link href="style.css" type="text/css" rel="stylesheet">

    <h2>Login Page</h2><br>    
    <div class="login">    
    <form id="login" method="post" action="#">    
        <label><b>Username</b>    
        </label>    
        <input type="text" name="uname" id="username" placeholder="Username">    
        <br><br>    
        <label><b>Password</b>    
        </label>    
        <input type="Password" name="pass" id="password" placeholder="Password">    
        <br><br>    
        <input type="submit" name="login" id="login" value="Login">         
    </form>     
</div>    
</body>    
</html>
