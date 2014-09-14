<?php

require_once 'config/dbconstants.php';
require_once 'student.php';

class Feedback {
	private $student;
	private $semester;

	public function __construct( $sid ) {
		$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		$this->student = new Student( $sid );
		$this->semester = "";
	}

	public function getSemesters() {
		$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		$query = "SELECT semester.sem_name, semester.sem_id FROM semester, student, batch WHERE semester.course_id = batch.course_id AND student.batch_id = batch.batch_id AND student.student_id = ?";
		$statement = $db->prepare( $query );
		$sid = $this->student->getID();
		$statement->bind_param( "i", $sid );
		$statement->bind_result( $name, $id );
		$statement->execute();
		$result = array();
		while( $statement->fetch() ) {
			$result[ $id ] = $name;
		}
		return $result;
	}

	public function setSemester( $sem ) {
		$this->semester = $sem;
	}

	public function getSubjectsTeachers() {
		$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		$query = "SELECT subject.subject_name, faculty.faculty_name, teaches.t_id FROM subject, faculty, teaches WHERE teaches.batch_id = ? AND teaches.sub_id IN (SELECT subject.subject_id FROM subject WHERE subject.sem_id = ?) AND teaches.faculty_id = faculty.faculty_id AND teaches.sub_id = subject.subject_id";
		$statement = $db->prepare( $query );
		$bid = $this->student->getBatchID();
		$statement->bind_param( "ii", $bid, $this->semester );
		$statement->bind_result( $sub, $fac, $tid );
		$statement->execute();
		$result = array();
		while( $statement->fetch() ) {
			$result[ $sub ] = $fac.'>>>'.$tid;
		}
		return $result;
	}

	public function insertFeedback( $sid, $tid, $cols, $vals ) {
		$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

		$cols = "(student_id,t_id,".$cols.")";
		$valArray = explode( ",", $vals );
		$i = 0;
		$v = "(";
		$d = "";
		while( $i < 42 ) {
			$v .= "?,";
			$i += 1;
			$d .= "i";
		}
		$v .= "?,?)";
		$d .= "is";


		$query = "INSERT INTO feedback $cols VALUES $v";
		$statement = $db->prepare( $query );
		$param = array();
		$param[] = & $d;
		$param[] = & $sid;
		$param[] = & $tid;

		$n = count($valArray);
		for( $i=0; $i<$n; $i+=1 ) {
			$param[] = & $valArray[ $i ];
		}
		
		call_user_func_array(array($statement, 'bind_param'), $param);
		return $statement->execute();
	}
}

?>