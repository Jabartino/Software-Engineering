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

    $itemID=$_POST["itemID"];
    $itemName=$_POST["itemName"];
    $itemPrice=$_POST["itemPrice"];
    $itemDes=$_POST["itemDes"];
 
    if (!$itemName || !$itemPrice || !$itemDes) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    $itemID = addslashes($itemID);
    $itemName = addslashes($itemName);
    $itemPrice = addslashes($itemPrice);
    $itemDes = addslashes($itemDes);
    

    @$db = new mysqli('localhost', 'root', '', 'market');

    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }

    if ($itemID == ""){
      $query = "ALTER TABLE items AUTO_INCREMENT=1";
      $stmt = $db->prepare($query);
      $stmt->execute();
    }


    $query = "Insert items values (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("isds", $itemID, $itemName, $itemPrice, $itemDes);
    $stmt->execute();
    
    echo $stmt->affected_rows," Item has been added!";
    
    $db->close();
?>
 
 <a href="show_item.php">Show Item</a>

<form action="upload.php" method="post" enctype='multipart/form-data'>
    <p>Item ID: <input type="number" name="itemID" maxlength="13" size="13" /></p>
    <p>Item Image: <input type="file" name="itemImage" /></p>

    <input type="submit" name="submit" value="Upload Image" />
</form>