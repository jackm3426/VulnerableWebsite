<?php
error_reporting(E_ERROR | E_PARSE);
require_once('config/db.php');

$submit = $_POST["submit"];
if (isset($submit)){
$searchText =$_POST["searchtxt"];


}
$query = "SELECT * FROM products WHERE Name LIKE '%$searchText%'";
$result = mysqli_query($link, $query);
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
<a href="login.php">Login</a>
<a class="active" href="products.php">Products</a>

</div>
</nav>

<main class="grid">
<article>
<link href="style.css" type="text/css" rel="stylesheet">
<link href="products.css" type="text/css" rel="stylesheet">

<form method= "post" action="">
<fieldset class= "fieldset-width">
<table>
<tr>
<th>Image Name</th>
<th>Product Name</th>
<th>Description</th>
<th>Price</th>
</tr>
<?php 

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td><img height='50px'src='". $row['Image'] .".jpg'></td>";
echo "<td>". $row['Name'] ."</td>";
echo "<td>". $row['Description'] ."</td>";
echo "<td>". $row['Price'] ."</td>";

echo "</tr>";
}
?>
</table>




</fieldset>

<fieldset class="fieldset-width">
<legend>Search for a product: </legend>
<label for="textSearch">Search for product by name:</label>

<input type="text" id="search" name="searchtxt" value="" >
<input type="submit" value="Submit" name="submit" >
</fieldset>


</form>

