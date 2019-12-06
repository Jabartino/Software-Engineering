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
        <h1>My Items</h1>


<?php
    @$db = new mysqli('localhost', 'root', '', 'market');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }

    $query="SELECT itemID AS ID, itemName AS Item, itemPrice AS Price, itemDes AS Description FROM items";

    if ($result = $db->query($query)) {

        $num_results = $result->num_rows;
        $num_fields = $result->field_count;

        echo "<table class='table table-responsive'>";
        echo "<tr>";

        $dbinfo = $result->fetch_fields();


       foreach ($dbinfo as $val) {
            echo "<th>".ucwords($val->name)."</th>";
        }

        echo "</tr>";

        while ($row = $result->fetch_row()) {
            echo "<tr>";
            for ($i=0; $i<$num_fields; $i++) {
                echo "<td>". stripslashes($row[$i])."</td>";
            }
            echo "<td><a href='pic.php?itemID=$row[0]'>Show Image</></td>";
            echo "<td><a href='upload.php?itemID=$row[0]'>Add Image</></td>";
            echo "<td><a href='delete_pic.php?itemID=$row[0]'>Delete Image</></td>";
            echo "<td><a href='delete_item.php?itemID=$row[0]'>Delete Item</></td>";
            echo "<td><a href='add-cart.php?itemID=$row[0]'>Add Cart</></td>";
            echo "</tr>";
            echo "<br />";
            
        }



        $result->close();
        echo "</table>";
    }