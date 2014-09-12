<?php

session_start();

if( !isset( $_SESSION['auth'] ) || !$_SESSION['auth'] == "OK" || !isset( $_SESSION['admin'] ) ) {
	header( "Location:/admin/" );
}

require_once 'class/admin.php';

$admin = new Admin($_SESSION['admin']);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin : Consolidated Feedback</title>
		<link rel="stylesheet" href="/css/spacelab.min.css" type="text/css" />
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function loadCourses() {
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				} else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function() {
					if( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
						var response = xmlhttp.responseText;
						if( response != "NULL" ) {
							var rows = response.split(":::");
							var print = "<div class=\"form-group\">\n<label for=\"crs\">Course</label>\n<select name=\"crs\" id=\"crs\" class=\"form-control\" onChange=\"loadBatches();\">\n<option value=\"-1\">Select Course</option>\n";
							for( i in rows ) {
								var cols = rows[i].split("---");
								print += "<option value=\"" + cols[0] + "\">" + cols[1] + "</option>\n";
							}
							print += "</select>\n</div>";
							document.getElementById('course-div').innerHTML = print;
						} else {
							var print = "<div class=\"form-group\">\n<label for=\"crs\">Course</label>\n<select name=\"crs\" id=\"crs\" class=\"form-control\">\n<option value=\"-1\">No Courses in this Department</option>\n</select>\n</div>";
							document.getElementById('course-div').innerHTML = print;
						}
					}
				}
				var select = document.getElementById('dept');
				var URL = "ajax.php?op=GetCrs&val="+select.options[select.selectedIndex].value;
				xmlhttp.open( "GET", URL, true );
				xmlhttp.send();
			}

			function loadBatches() {
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				} else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange=function() {
					if( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
						var response = xmlhttp.responseText;
						if( response != "NULL" ) {
							var rows = response.split(":::");
							var print = "<div class=\"form-group\">\n<label for=\"batch\">Batch</label>\n<select name=\"batch\" id=\"batch\" class=\"form-control\" onChange=\"loadSemesters();\">\n<option value=\"-1\">Select Batch</option>\n";
							for( i in rows ) {
								var cols = rows[i].split("---");
								print += "<option value=\"" + cols[0] + "\">" + cols[1] + "</option>\n";
							}
							print += "</select>\n</div>";
							document.getElementById('batch-div').innerHTML = print;
						} else {
							var print = "<div class=\"form-group\">\n<label for=\"batch\">Batch</label>\n<select name=\"batch\" id=\"batch\" class=\"form-control\">\n<option value=\"-1\">No Batches in this Course</option>\n</select>\n</div>";
							document.getElementById('batch-div').innerHTML = print;
						}
					}
				}
				var select = document.getElementById('crs');
				var URL = "ajax.php?op=GetBch&val="+select.options[select.selectedIndex].value;
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
					<a class="navbar-brand" href="/admin/">Feedback</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="/admin/">
								<span class="glyphicon glyphicon-home"></span>
								Home
							</a>
						</li>
						<li class="dropdown active">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<span class="glyphicon glyphicon-edit"></span>
								Manage
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Create Batch</a></li>
								<li><a href="#">Assign Subjects</a></li>
								<li><a href="consolidated">Consolidated Feedback</a></li>
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
				<div class="form-group">
					<label for="dept">Department</label>
					<select name="dept" id="dept" class="form-control" onChange="loadCourses();">
						<option value="-1">Select Department</option>
						<?php
							$result = $admin->getDepartments();
							foreach ($result as $key => $value) {
								echo "<option value=\"$key\">$value</option>";
							}
						?>
					</select>
				</div>
				<div id="course-div">
				</div>
				<div id="batch-div">
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
