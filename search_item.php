
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
    <h1> Items Search </h1>

<?php

@$db = new mysqli('localhost', 'root', '', 'market');



    $searchterm = $db->escape_string($_GET['searchterm']);
    if(!$searchterm){
        echo "Nothing was typed into search!! Please type something to search.";
        exit;
    };
    $query = $db->query("SELECT * FROM items WHERE itemName LIKE '%{$searchterm}%'");
    ?>
    <div class="result-count">
        Found <?php echo $query->num_rows; ?> results.
    </div>
    <?php
    if($query->num_rows){
        while($r = $query->fetch_object()){
        ?>
            <div class="result">
                <b><a herf="#"> <?php echo $r->itemName; ?> </a></b>
                <a herf="#"> $<?php echo $r->itemPrice; ?> </a>
                <?php echo "<br />"; ?>
                <a herf="#"> <?php echo $r->itemDes; ?> </a>
                <?php echo "<br />"; ?>
            </div>
        <?php
        }
    }

?>
        

    <br/>
    <a href="show_item.php">Show all items</a>
</main>
</body>

</html>