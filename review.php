<?php
error_reporting(E_ERROR | E_PARSE);
require_once('config/db.php');


$submit = $_POST["submit"];
if (isset($submit)){
  $firstname =$_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email_add =$_POST["email"];
  $feed_back =$_POST["feedback"];

  $sql = "INSERT INTO review (first_name, last_name, email_add, feed_back)
  VALUES ('$firstname', '$lastname', '$email_add', '$feed_back')";

  if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}
$query = "SELECT * FROM review";
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
<a class="active" href="review.php">Leave A Review</a>
<a href="login.php">Login</a>
<a href="products.php">Products</a>
</div>
</nav>

<main class="grid">
<article>
<link href="style.css" type="text/css" rel="stylesheet">

<h1>Please leave us a review below:</h1> 
<h4>This will help us to improve for next time :)</h4>

<h2>Feedback Form</h2>    
<div class="container">    
  <form method="POST" action="#">    
    <div class="row">    
      <div class="col-25">    
        <label for="fname">First Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="first_name" name="firstname" placeholder="Your first name..." style="width: 300px">    
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="last_name">Last Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="last_name" name="lastname" placeholder="Your last name..." style="width: 300px">    
      </div>    
    </div>    
    <div class="row">    
        <div class="col-50">    
          <label for="email">Email Address</label>    
        </div>    
        <div class="col-75">    
          <input type="email" id="email_add" name="email" placeholder="Your preferred email address..." style="width: 300px">    
        </div>    
      </div>    
      <div class="row">    
      <div class="col-25">    
        <label for="feedback">Feedback</label>    
      </div>    
      <div class="col-75">    
        <textarea id="feed_back" name="feedback" placeholder="Give us some feedback :)" style="height:200px; resize: none; width: 302px" maxlength=""></textarea>    
      </div>    
    </div>    
    <div class="row">    
      <input type="submit" name="submit" value="Submit">    
    </div>    
  </form>    
</div>    
<table>
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Feedback</th>
  </tr>
  <?php 

  while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>". $row['first_name'] ."</td>";
  echo "<td>". $row['last_name'] ."</td>";
  echo "<td>". $row['email_add'] ."</td>";
  echo "<td>". $row['feed_back'] ."</td>";

  echo "</tr>";
}
?>
</table>

</article>

</main>

</body>

</html>
