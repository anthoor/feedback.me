<?php

require_once 'config/dbconstants.php';

class Student {
	private $id;
	private $name;
	private $department;
	private $course;
	private $batch;
	
	public function __construct($student_id) {
		$this->id = $student_id;
		
		$db = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		
		$query = "SELECT student.student_name, batch.batch_name, course.course_name, department.dept_name FROM student, batch, course, department WHERE student.batch_id = batch.batch_id AND batch.course_id = course.course_id AND course.dept_id = department.dept_id AND student.student_id = ?";
		$statement = $db->prepare ( $query );
		$statement->bind_param ( "i", $student_id );
		$statement->bind_result ( $this->name, $this->batch, $this->course, $this->department );
		$statement->execute ();
		$statement->fetch ();
		$this->formatBatch();
	}

	private function formatBatch() {
		$batchArray = explode( " ", $this->batch );
		$this->batch = $batchArray[count($batchArray)-2]." ".$batchArray[count($batchArray)-1];
	}

	public function getName() {
		return $this->name;
	}

	public function getDepartment() {
		return $this->department;
	}

	public function getCourse() {
		return $this->course;
	}

	public function getBatch() {
		return $this->batch;
	}
	
	public function getID() {
		return $this->id;
	}
}

?>