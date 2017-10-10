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


$setcon = 1;
if($setcon == 2) {
    $servername = "192.168.0.112";
    $username = "feedback_panel";
    $password = "lancius@12#";
    $dbname = "feedback_panel";
} else {
	$servername = "192.168.0.112";	
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

//$base_url = "https://lanciussolutions.com/demo/Feedback_Panel/";
$base_url = "http://192.168.0.112/feedback/";
 
?>