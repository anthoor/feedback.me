<?php

session_start();

if( isset( $_SESSION['auth']) && $_SESSION['auth'] == "OK" ) {
	header( "Location:user/" );
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Feedback : Home</title>
		<link rel="stylesheet" href="css/spacelab.min.css" type="text/css" />
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
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
	<body onload="document.getElementById('user').focus();">
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">Feedback</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="/">
								<span class="glyphicon glyphicon-home"></span>
								Home
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
				<div class="col-md-4"> </div>
				<div class="col-md-4">
					<div class="jumbotron">
						<form role="form" action="login.php" method="POST" onSubmit="validate();">
							<div class="form-group">
								<label for="user">Username</label>
								<input type="text" name="user" id="user" placeholder="Username" class="form-control" />
							</div>
							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" name="pass" id="pass" placeholder="Password" class="form-control" />
							</div>
							<?php
								if( isset( $_SESSION['error'] ) ) {
							?>
								<div class="form-group">
									<label class="error">
										<?php
											echo $_SESSION['error'];
											unset( $_SESSION['error'] );
										?>
									</label>
								</div>
							<?php
								}
							?>
							<button class="btn btn-success" style="width:100%;">Login</button>
						</form>
					</div>
				</div>
				<div class="col-md-4"> </div>
			</div>
		</div>
		<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">
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
