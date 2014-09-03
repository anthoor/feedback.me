<?php

session_start();

require_once 'user/class/auth.php';

$auth = new Authenticator();
$user = $_POST['user'];
$pass = $_POST['pass'];

if( $auth->validateUser( $user, $pass ) ) {
	$_SESSION['auth'] = "OK";
	$_SESSION['student'] = $auth->getUID();
	header( "Location:user/" );
} else {
	$_SESSION['error'] = "Invalid Username/Password. Try Again.";
	header( "Location:/" );
}

?>
