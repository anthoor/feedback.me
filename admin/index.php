<?php

session_start();

if( !isset( $_SESSION['auth'] ) || !$_SESSION['auth'] == "OK" || !isset( $_SESSION['admin'] ) ) {
	header( "Location:/" );
}

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
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<span class="glyphicon glyphicon-edit"></span>
								Manage
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Create Batch</a></li>
								<li><a href="#">Assign Subjects</a></li>
							</ul>
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
