<?php
session_start();

require_once 'class/student.php';
require_once 'class/feedback.php';

switch( $_GET['op'] ) {
	case 'SetSem':
		$fb = new Feedback( $_SESSION['student'] );
		$fb->setSemester( $_GET['val'] );
		$result = $fb->getSubjectsTeachers();
		$print = "";
		foreach ( $result as $sub => $fac ) {
			$print = $print.'<<<'.$sub.':::'.$fac;
		}
		$print = substr( $print, 3 );
		echo $print;
		break;
}
?>