<?php
session_start();

require_once 'class/admin.php';

switch( $_GET['op'] ) {
	case 'GetCrs':
		$admin = new Admin( $_SESSION['admin'] );
		$result = $admin->getCourses( $_GET['val']);
		$print = "";
		if( count( $result ) != 0 ) {
			foreach ( $result as $id => $name ) {
				$print.= ":::$id---$name";
			}
			$print = substr( $print, 3 );
			echo $print;
		} else {
			echo "NULL";
		}
		break;

	case 'GetBch':
		$admin = new Admin( $_SESSION['admin'] );
		$result = $admin->getBatches( $_GET['val']);
		$print = "";
		if( count( $result ) != 0 ) {
			foreach ( $result as $id => $name ) {
				$print.= ":::$id---$name";
			}
			$print = substr( $print, 3 );
			echo $print;
		} else {
			echo "NULL";
		}
		break;

	case 'GetSem':
		$admin = new Admin( $_SESSION['admin'] );
		$result = $admin->getSemesters( $_GET['val']);
		$print = "";
		if( count( $result ) != 0 ) {
			foreach ( $result as $id => $name ) {
				$print.= ":::$id---$name";
			}
			$print = substr( $print, 3 );
			echo $print;
		} else {
			echo "NULL";
		}
		break;

	case 'GetSub':
		$admin = new Admin( $_SESSION['admin'] );
		$result = $admin->getSubjects( $_GET['val']);
		$print = "";
		if( count( $result ) != 0 ) {
			foreach ( $result as $id => $name ) {
				$print.= ":::$id---$name";
			}
			$print = substr( $print, 3 );
			echo $print;
		} else {
			echo "NULL";
		}
		break;

	case 'GetFb':
		$admin = new Admin( $_SESSION['admin'] );
		$result = $admin->getFeedbacks( $_GET['sub'], $_GET['batch'] );
		$print = "";
		if( count( $result ) != 0 && $result[0] != 0 ) {
			foreach ( $result as $entry ) {
				$print.= ":::$entry";
			}
			$print = substr( $print, 3 );
			echo $print;
		} else {
			echo "NULL";
		}
		break;
}
?>