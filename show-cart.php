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




<body>
    <main role="main" class="container-fluid">
        <h1> My Cart </h1>
<table cellspacing="15">
    <tr>
        <th>itemID</th>
        <th>itemName</th>
        <th>itemPrice</th>
    </tr>

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

if(empty($_SESSION["cart"])) {
    echo '<br>';
    echo '<br>';
    echo "cart is empty";
    echo '<br>';
    echo '<br>';
}

if(!empty($_SESSION["cart"])) {

    $whereIn = implode(',', $_SESSION['cart']);

    $query = "SELECT itemID, itemName, itemPrice FROM items WHERE itemID in ($whereIn)";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        $total_price = "0";
        while($row = $result->fetch_assoc()) {
            /*echo "itemID: " . $row["itemID"]. " - itemName: " . $row["itemName"]. " -price " . $row["itemPrice"]. "<br>"; */
            echo "<tr><td>" . $row["itemID"] . "</td><td>" . $row["itemName"]. "</td><td>" . $row["itemPrice"]. "</td></tr>";
            $total_price += $row["itemPrice"];
        }
        echo "</table>";
        echo '<hr align="left" width="18%">';
        echo "Total Price: $total_price";
    } else {
        echo "0 results";
    }
}

echo '<br>';
echo '<br>';
echo "<a href='empty-cart.php'>Empty Cart";
echo '<br>';
echo '<a href="show_item.php">My Items</a>';

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';



echo '<br>';
echo '<br>';


$conn-> close();

?>

</body>
</table>
</html>