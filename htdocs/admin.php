<?php
session_start();
if (empty($_SESSION['username']) || $_SESSION['id'] !=1 || $_SESSION['isadmin'] !=1) {
header("Location: user.php");
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
<a class="active" href="index.php">Home</a>
<a href="events.html#events">Events</a>
<a href="contactus.html#contact">Contact Us</a>
<a href="review.php">Leave A Review</a>
<a href="login.php">Login</a>
<a href="products.php">Products</a>

</div>
</nav>

<main class="grid">
<article>
<link href="style.css" type="text/css" rel="stylesheet">

<h1>Admin Page</h1> 
<img src="images/railwaysignnight.jpg" alt="Railway Inn from the outside at night">

<p>Welcome to the Railway Inn - Free House, <?php echo  $_SESSION['username']; ?> <a href="logout.php"> Logout</a></p>

<p>Password for the till = 149213</p>
<p>Password for the storage room = 55978456</p>
<p>Password for the iPad = 8954</p>

</main>

</body>

</html>