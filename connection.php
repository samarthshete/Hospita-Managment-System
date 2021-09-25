<?php 

$username="root";
$password="";
$dbname="mshms";

// Create connection 

$con=mysqli_connect("localhost",$username,$password,$dbname);
//echo "connection done";

// Check connection

if (mysqli_connect_errno($con))  

{ 
 
echo "Failed to connect to MySQL: " . mysqli_connect_error();

 }

?>