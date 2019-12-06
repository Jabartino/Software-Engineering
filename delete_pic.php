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
    $itemID=$_GET["itemID"];
       
    @$db = new mysqli('localhost', 'root', '', 'market');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }

    $query = "DELETE FROM pic WHERE itemID={$_GET['itemID']}";
    $stmt = $db->prepare($query);
    $stmt->execute();

    echo "Image deleted from the item";

    $db->close();
?>

<a href="show_item.php">Show Item</a>
    
    
