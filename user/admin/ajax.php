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

}
?>