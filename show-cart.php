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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "market";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();


/*var_dump($_SESSION['cart']); */

$whereIn = implode(',', $_SESSION['cart']);

$query = "SELECT * FROM items WHERE itemID in ($whereIn)";





$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["itemName"]. "<br> Price: $" . $row["itemPrice"]. "<br> <br>";
    }
} else {
    echo "0 results";
}

echo '<br>';
echo "<td><a href='empty-cart.php'>Empty Cart</></td>";
echo '<br>';
echo '<a href="show_item.php">My Items</a>';

?>

