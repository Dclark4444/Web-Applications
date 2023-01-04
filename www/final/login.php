<?php

require_once 'vendor/autoload.php';

// init configuration
$clientID = '310361055799-vr1it3k42ap88aabqr8hn2i1tevmfmtm.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://compsci.asmsa.org/clarkd22/final/login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $firstname = $google_account_info->givenName;
  print_r($google_account_info);
  print_r($email);
  print_r($name);

  	$servername = "localhost";
  	$username = "clarkd22";
  	$password = "Jackel121";
  	$dbname = "clarkd22";

  	// Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);

  	// Check connection
  	if ($conn->connect_error) {
  	  die("Connection failed: " . $conn->connect_error);
  	}




  	$stmt = $conn->prepare("SELECT `name` FROM userbase WHERE email=?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result(); // get the mysqli result
      $row = $result->fetch_assoc();

     if(!$row)
     {
     $stmt = $conn->prepare("INSERT INTO userbase (`email`, `name`) VALUES (?,?)");
     $stmt->bind_param("ss",$email,$name);
     $stmt->execute();

       	$stmt = $conn->prepare("SELECT name FROM userbase WHERE email=?");
           $stmt->bind_param("s", $email);
           $stmt->execute();
           $result = $stmt->get_result(); // get the mysqli result
           $row = $result->fetch_assoc();
            	$u=implode($row);
            	$stmt->close();
            	session_start();
            	$_SESSION["authentication"] = "valid";
            	$_SESSION["curentUser"]=$u;
            	header("Location: index.php");

 	}
 	else{
 	$u=implode($row);
 	$stmt->close();
 	session_start();
 	$_SESSION["authentication"] = "valid";
 	$_SESSION["currentUser"]=$u;
 	header("Location: index.php");
 }
   }
   else {
   echo "<div class='center'>";
   echo "<h1>LOGIN</h1>
 		<a href='".$client->createAuthUrl()."'><img src='google.png' alt='google'/></a>";
    echo "</div>";
 }
?>



