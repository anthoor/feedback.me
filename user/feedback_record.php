<?php

session_start();

require_once 'class/student.php';
require_once 'class/feedback.php';

if( !isset( $_SESSION['auth']) || !$_SESSION['auth'] == "OK" ) {
	header( "Location:/" );
}

$student = new Student( $_SESSION['student'] );
$fb = new Feedback($_SESSION['student']);

$tid = $_POST['subj'];
$sid = $_SESSION['student'];
$sem = $_POST['sem'];

$cols = "";
$vals = "";
$i=0;
foreach ($_POST as $key => $value) {
	if( $key != 'sem' && $key != 'subj' ) {
		$i += 1;
		$cols .= $key;
		$vals .= $value;
		if( $i < 41 ) {
			$cols .= ",";
			$vals .= ",";
		}
	}
}

if( $fb->insertFeedback( $sid, $tid, $cols, $vals ) ) {
	$_SESSION['feedback'] = "Feedback Successfully Recorded.";
} else {
	$_SESSION['feedback'] = "Feedback was not Recorded Correctly. Try Again.";
}

header("Location:/user/")
?>