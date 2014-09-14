<?php


require_once 'user/config/dbconstants.php';

class Authenticator {
	private $db;
	private $uid;
	private $bid;
	
	public function __construct() {
		$this->db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
	}
	
	public function validateUser( $username, $password ) {
		$query = "SELECT student_id, batch_id, password FROM student WHERE username = ?";
		$statement = $this->db->prepare( $query );
		$statement->bind_param( "s", $username );
		$statement->bind_result( $this->uid, $this->bid, $pass );
		$statement->execute();
		$statement->store_result();

		if( $statement->num_rows == 1 ) {
			$statement->fetch();
			if( $pass == md5( $password ) ) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function getUID() {
		return $this->uid;
	}

	public function getBID() {
		return $this->bid;
	}
}

?>
