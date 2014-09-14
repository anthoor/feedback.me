<!DOCTYPE html>
<?php
	$d = $_GET['data'];
	$data = explode( ":::", $d );
	for ($i=1; $i < count($data); $i++) { 
		$data[$i] /= $data[0];
	}
?>
<html>
	<head>
		<link rel="stylesheet" href="/css/spacelab.min.css" type="text/css" />
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<style>
			td {
				vertical-align: middle !important;
			}
		</style>
	</head>
	<body>
			<table align="center" class="table table-bordered">
				<tr>
					<td rowspan="6"><label>Time Sense</label></td>
					<td width="300">
						<label>Punctuality in the Class</label>
					</td>
					<td>
						<?php
							echo $data[1];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Regularity in Taking Classes</label>
					</td>
					<td>
						<?php
							echo $data[2];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Students&apos; Attendance</label>
					</td>
					<td>
						<?php
							echo $data[3];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Course Completion in Time</label>
					</td>
					<td>
						<?php
							echo $data[4];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Organization of Activities (class, tests, assignments, ...)</label>
					</td>
					<td>
						<?php
							echo $data[5];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Arrangements Made in Case of Absence</label>
					</td>
					<td>
						<?php
							echo $data[6];
						?>
					</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td rowspan="8"><label>Subject Command<label></td>
					<td>
						<label>Focus on Syllabi</label>
					</td>
					<td>
						<?php
							echo $data[7];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Self Confidence</label>
					</td>
					<td>
						<?php
							echo $data[8];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Communication Skills</label>
					</td>
					<td>
						<?php
							echo $data[9];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Conducting Discussions</label>
					</td>
					<td>
						<?php
							echo $data[10];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Teaching the Subject Matter</label>
					</td>
					<td>
						<?php
							echo $data[11];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Delivery of Structured Lectures</label>
					</td>
					<td>
						<?php
							echo $data[12];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Linking Studies to Real Life</label>
					</td>
					<td>
						<?php
							echo $data[13];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Refers to Latest Developments</label>
					</td>
					<td>
						<?php
							echo $data[14];
						?>
					</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td rowspan="6"><label>Teaching Methods/Aids</label></td>
					<td width="250">
						<label>Use of Aids(PPT/OHP/Blackboard)</label>
					</td>
					<td>
						<?php
							echo $data[15];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Handling of Board</label>
					</td>
					<td>
						<?php
							echo $data[16];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Use of Innovative Methods</label>
					</td>
					<td>
						<?php
							echo $data[17];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Explaination of Answers for Tests</label>
					</td>
					<td>
						<?php
							echo $data[18];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Shows Evaluated Answer Books to Students</label>
					</td>
					<td>
						<?php
							echo $data[19];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Makes Sure He/She is Being Understood</label>
					</td>
					<td>
						<?php
							echo $data[20];
						?>
					</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td rowspan="8"><label>Helping Attitude<label></td>
					<td>
						<label>Helping Various Interests of Students</label>
					</td>
					<td>
						<?php
							echo $data[21];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Providing Additional Study Materials</label>
					</td>
					<td>
						<?php
							echo $data[22];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Help Students Irrespective of Ethnicity/Background</label>
					</td>
					<td>
						<?php
							echo $data[23];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Help Students Irrespective of Gender</label>
					</td>
					<td>
						<?php
							echo $data[24];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Help Students Facing Physical/Emotional/Learning Challenges</label>
					</td>
					<td>
						<?php
							echo $data[25];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Approach Towards Developing Professional Skills</label>
					</td>
					<td>
						<?php
							echo $data[26];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Help Students in Realizing Career Goals</label>
					</td>
					<td>
						<?php
							echo $data[27];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Help Students in Realizing Strengths and Weaknesses</label>
					</td>
					<td>
						<?php
							echo $data[28];
						?>
					</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td rowspan="6"><label>Lab Interaction</label></td>
					<td width="250">
						<label>Regular Checking of Records</label>
					</td>
					<td>
						<?php
							echo $data[29];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Availability for Whole Duration of Lab</label>
					</td>
					<td>
						<?php
							echo $data[30];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Helping Students in Conducting Experiments</label>
					</td>
					<td>
						<?php
							echo $data[31];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Helping Students Understand the Background of Experiments</label>
					</td>
					<td>
						<?php
							echo $data[32];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Follows Open Ended Approaches for Experiments</label>
					</td>
					<td>
						<?php
							echo $data[33];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Conducting Lab Seminars and GDs</label>
					</td>
					<td>
						<?php
							echo $data[34];
						?>
					</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td rowspan="7"><label>Class Control<label></td>
					<td>
						<label>Control Mechanism for Conducting Classes</label>
					</td>
					<td>
						<?php
							echo $data[35];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Students&apos; Participation in Class</label>
					</td>
					<td>
						<?php
							echo $data[36];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Skills of Addressing Inappropriate Behaviour of Students</label>
					</td>
					<td>
						<?php
							echo $data[37];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Tendency of Inviting Opinions/Questions from Students</label>
					</td>
					<td>
						<?php
							echo $data[38];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Enhances Learning by Judicious Reinforcement Mechanism</label>
					</td>
					<td>
						<?php
							echo $data[39];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Inspires Students for Ethical Conduct</label>
					</td>
					<td>
						<?php
							echo $data[40];
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Acts as a Role Model</label>
					</td>
					<td>
						<?php
							echo $data[41];
						?>
					</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td align="center"><label>Other Comments</label></td>
					<td colspan="2">
						<textarea name="comments" id="comments" class="form-control" style="height:150px;"></textarea>
					</td>
				</tr>
			</table>
	</body>
</html>