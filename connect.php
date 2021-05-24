<?php
   
   define('DB_HOST','localhost:3307');
   define('DB_NAME','qwellbeing');
   define('DB_USERNAME','root');
   define('DB_PASSWORD','root');
   $conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD, DB_NAME);
   
    //to check db connection
    
    if(!$conn) {
        die("Error in DB connection ". mysqli_connect_error()); 
    } 
    date_default_timezone_set('Asia/Kolkata');
    $error = "";
?>