<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="topnav">
            <a href="home.php">Home</a>
            <a href="addItem.html">Add item</a>
            <a href="show_item.php">Items</a>
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

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['itemID']);

?>

<p>

    Product added to cart 
    <br>
    <a href="show_item.php"> Add more items
    <br>
    <a href="show-cart.php"> View Cart
</p>