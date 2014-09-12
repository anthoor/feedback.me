<?php

session_start();

require_once 'class/student.php';
require_once 'class/feedback.php';

if( !isset( $_SESSION['auth']) || !$_SESSION['auth'] == "OK" || !isset($_SESSION['student']) ) {
	header( "Location:/" );
}

$student = new Student( $_SESSION['student'] );
$fb = new Feedback($_SESSION['student']);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Feedback : Home</title>
		<link rel="stylesheet" href="/css/spacelab.min.css" type="text/css" />
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script>
			function selectSemester() {
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				} else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function() {
					if( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
						var response = xmlhttp.responseText;
						var rows = response.split("<<<");
						var print = "<div class=\"form-group\">\n<label for=\"subj\">Subject</label>\n<select name=\"subj\" id=\"subj\" class=\"form-control\" onChange=\"loadForm();\">\n<option value=\"-1\">Select a Subject</option>\n";
						for( i in rows ) {
							var cols = rows[i].split(":::");
							var subs = cols[1].split(">>>");
							print += "<option value=\"" + subs[1] + "\">" + cols[0] + " (" + subs[0] + ")</option>\n";
						}
						print += "</select>\n</div>";
						document.getElementById('subject-group').innerHTML = print;
					}
				}
				var select = document.getElementById('sem');
				var URL = "ajax.php?op=SetSem&val="+select.options[select.selectedIndex].value;
				xmlhttp.open( "GET", URL, true );
				xmlhttp.send();
			}

			function loadForm() {
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				} else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function() {
					if( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
						var response = xmlhttp.responseText;
						document.getElementById('feedback-form').innerHTML = response;
					}
				}
				var URL = "form.html";
				xmlhttp.open( "GET", URL, true );
				xmlhttp.send();
			}
		</script>
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
						<li>
							<a href="/user">
								<span class="glyphicon glyphicon-home"></span>
								Home
							</a>
						</li>
						<li class="active">
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
<form action="feedback_record.php" method="POST" role="form">
			<div class="jumbotron">
				<div class="form-group">
					<label for="sem">Semester</label>
					<select name="sem" id="sem" class="form-control" onchange="selectSemester();">
						<option value="-1">Select Current Semester</option>
						<?php
							$semesters = $fb->getSemesters();
							foreach ($semesters as $id => $name) {
								echo "<option value=\"$id\">$name</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group" id="subject-group">

				</div>
				<div class="form-group" id="feedback-form">
				</div>
			</div>
</form>
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