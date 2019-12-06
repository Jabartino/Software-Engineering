<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="topnav">
  <a href="webPage.html">Home</a>
  <a href="show_item.php">My Items</a>
  <a href="#bio">Bio</a>
  <a class="active" href="show-cart.php">Cart</a>
  <div class="search-container">
    <form action="search_item.php">
      <input type="text" class="form-control" id="searchterm" name="searchterm" />
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "All session variables are now removed, and the session is destroyed.";
echo "<br>";
echo '<a href="show_item.php">My Items</a>';
?>
