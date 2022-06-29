<?php
 
   $servername = "localhost";
   $database = "banksystem";
   $username = "root";
   $password = "";
   $rowlen=0;
 $conn = mysqli_connect($servername, $username, $password,$database);
 if (!$conn)
 {
    die("Sorry we failed to connect to the server please try again:".mysqli_connect_error()); 
}
?>