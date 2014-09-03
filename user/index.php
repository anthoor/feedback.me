<?php

session_start();

require_once 'class/student.php';

if( !isset( $_SESSION['auth']) || !$_SESSION['auth'] == "OK" ) {
	header( "Location:/" );
}

$student = new Student( $_SESSION['student'] );

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Feedback : Home</title>
		<link rel="stylesheet" href="/css/spacelab.min.css" type="text/css" />
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<style>
			body {
				padding-top:70px;
				padding-bottom:30px;
			}

			.error {
				color:#f00 !important;
			}
		</style>
	</head>
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/user">Feedback</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="/user">
								<span class="glyphicon glyphicon-home"></span>
								Home
							</a>
						</li>
						<li>
							<a href="feedback.php">
								<span class="glyphicon glyphicon-edit"></span>
								Feedback
							</a>
						</li>
						<li>
							<a href="logout.php">
								<span class="glyphicon glyphicon-log-out"></span>
								Logout
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="jumbotron">
				<h2><span class="glyphicon glyphicon-home"></span> Malabar Institute of Technology <small>Anjarakandy</small></h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="jumbotron">
						<table class="table table-striped">
							<tr>
								<td>Name</td>
								<td><?php echo $student->getName(); ?></td>
							</tr>
							<tr>
								<td>Course</td>
								<td><?php echo $student->getCourse(); ?></td>
							</tr>
							<tr>
								<td>Batch</td>
								<td><?php echo $student->getBatch(); ?></td>
							</tr>
							<tr>
								<td>Department</td>
								<td><?php echo $student->getDepartment(); ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="well">
						<div class="alert alert-info">
							Finish the feedbacks as soon as possible.
						</div>
						<div class="alert alert-warning">
							Do not submit multiple feedbacks for one subject.
						</div>
						<div class="alert alert-danger">
							Do not use bad language.
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/user">
						<span class="glyphicon glyphicon-copyright-mark"></span> Feedback.me
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="mailto:lalluanthoor@hotmail.com">
								<span class="glyphicon glyphicon-user"></span>
								Webmaster
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
