<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="topnav">
    <a href="webPage.html">Home</a>
    <a href="user.html">Create User</a>
    <a href="login.php">Login</a>
  <div class="search-container">
    <form action="search_item.php">
      <input type="text" class="form-control" id="searchterm" name="searchterm" />
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<?php
if (isset($_GET['logout'])) {
    session_start();
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
}
echo '<title>Login</title></head>';
echo '<body><main role="main" class="container-fluid"><h1>Login Form</h1>';

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {
    $uName = trim(stripslashes($_POST['uName']));
    $pass = trim(stripslashes($_POST['pass']));
    if (($pass == '') || ($uName == '')) { // Forgot a field.
        echo '<p>Please make sure you enter both an username and a password!</p>';
    } else {
            //open database connection



        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "market";
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

    
        $query = "SELECT pass FROM user WHERE  uName = '".$uName."'";
        $result = $conn->query($query);
        $num_results = $result->num_rows;
        if ($num_results == 1) {
            $row = $result->fetch_assoc();
            $hash_stored = $row['pass'];
    
    
            if (password_verify($pass, $hash_stored)){
                session_start();
                echo '<h2> password!<br />Try again.</h2>';
                $_SESSION['username'] = $uName;
                //redirect
                header('Location: home.php?sessionid='.session_id());
            } else {
                echo '<h2>Invalid password!<br />Try again.</h2>';
            }
        } else { // Incorrect!
            echo '<h2>User name not found!<br />Try again.</h2>';
        }
    }
} ?>



	<form action="login.php" method="post">
        <div id="order-data" class="form-div">
            <div class="form-group">
                <label for="uName" >User Name</label>
                <input type="text" class="form-control" id="uName" name="uName" placeholder="Enter username" />
            </div>
            <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="pass" class="form-control" id="pass" name="pass" placeholder="Password">
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Log in</button>

		<input type="hidden" name="submitted" value="true" />

	</form>
</body>
</html>

