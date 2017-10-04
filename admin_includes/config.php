<?php
session_start(); 
date_default_timezone_set("Asia/Kolkata");

//Set session expiry time
//Expire the session if user is inactive for 30
//minutes or more.
$expireAfter = 30; 
//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
        header("Location: logout.php");
  		exit;
    }    
}
//End Session expiry time here


$setcon = 2;
if($setcon == 1) {
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "";
} else {
	$servername = "192.168.0.107";	
	$username = "root";
	$password = "root";
	$dbname = "feedback_demo";
}  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$base_url = "http://localhost/feedback/";
 
?>