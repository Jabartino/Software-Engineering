<?php
if(!empty($_GET['itemID'])){

    @$db = new mysqli('localhost', 'root', '', 'market');
    
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    $result = $db->query("SELECT itemImage FROM pic WHERE itemID = {$_GET['itemID']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        header("Content-type: image/jpg"); 
        echo $imgData['itemImage']; 
    }else{
        echo 'Image not found...';
    }
}
?>