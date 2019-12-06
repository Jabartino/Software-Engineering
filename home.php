
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    	<title>Home</title>
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
        //get the session id
        session_start();
        if ($_SESSION['username'] == null) {
            header('Location: login.php?logout');
        }
        // Print a greeting:
        echo  '<h1>Welcome, ' . $_SESSION['username'] . '!</h1>';
        echo '<a href="login.php?logout">Logout</a>';
        ?>
        </main>
    </body>
</html>