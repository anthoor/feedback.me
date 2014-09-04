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

		$query = "SELECT subject.subject_name, faculty.faculty_name, teaches.t_id FROM student, subject, faculty, semester, teaches WHERE semester.sem_id = ? AND student.student_id = ? AND subject.sem_id = semester.sem_id AND teaches.sub_id = subject.subject_id AND faculty.faculty_id = teaches.faculty_id";
		$statement = $db->prepare( $query );
		$sid = $this->student->getID();
		$statement->bind_param( "ii", $this->semester, $sid );
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