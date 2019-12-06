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
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["itemImage"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['itemImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $itemID=$_POST["itemID"];

        @$db = new mysqli('localhost', 'root', '', 'market');
        
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
        $insert = $db->query("INSERT INTO pic (itemID, itemImage) VALUES ('$itemID', '$imgContent')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>

<form action="upload.php" method="post" enctype='multipart/form-data'>
    <p>Item ID: <input type="number" name="itemID" maxlength="13" size="13" /></p>
    <p>Item Image: <input type="file" name="itemImage" /></p>

    <input type="submit" name="submit" value="Upload Image" />
</form>