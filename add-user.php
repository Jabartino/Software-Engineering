    
<?php

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



    // Flag variable to track success:
    $okay = true;

    $uName="";
    $fName="";
    $lName="";
    $password="";
    $confirmPassword="";
    if (isset($_POST['submit'])) {  //if the form was submitted
        // Validate the password:
        $uName=$_POST["uName"];
        $fName=$_POST["fName"];
        $lName=$_POST["lName"];
        $password=$_POST["password"];
        $confirmPassword=$_POST["confirmPassword"];
        if (empty($_POST['password'])) {
            echo '<p>Please enter your password.</p>';
            $okay = false;
        }
        // Check the two passwords for equality:
        if ($_POST['password'] != $_POST['confirmPassword']) {
            echo '<p>Your confirmed password does not match the original password.</p>';
            $okay = false;
        }
        
    }

    if (isset($_POST['submit']) && $okay) {  
       


        $sql_u = "SELECT * FROM user WHERE uName='$uName'";
  	    $res_u = mysqli_query($conn, $sql_u);

  	    if (mysqli_num_rows($res_u) > 0) {
  	        echo "Sorry... username already taken"; 	
    	} else {

            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (uName, fName, lName, pass)
            VALUES ( '$uName', '$fName', '$lName', '$password')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                session_start();
                $_SESSION['username'] = $uName;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        } 
    }
    
?>

<a href="home.php"> home </a>
 