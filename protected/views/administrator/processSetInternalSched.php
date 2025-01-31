﻿<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>Internal Schedule Management | Set</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<section class=container-block id=page-body>
<div class=container-inner>
<!-- Page title -->
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class=underlined-header style="margin-left:-65px;">  <?php echo $_GET['scode'];?></h2>

<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	if(isset($_POST['sday2']))
	{
		$day2 = $_POST['sday2'];
	}else
	{
		$day2 = "";
	}
	if(isset($_POST['timeS2']))
	{
		$timeS2 = $_POST['timeS2'];
	}else
	{
		$timeS2 = "";
	}
	if(isset($_POST['timeE2']))
	{
		$timeE2 = $_POST['timeE2'];
	}else
	{
		$timeE2 = "";
	}
	if(isset($_POST['roomName2']))
	{
		$roomName2 = $_POST['roomName2'];
	}else
	{
		$roomName2 = "";
	}
	$schedID1 = $_GET['schedID1'];
	$schedID2 = $_GET['schedID2'];
	$profold = $_GET['prof'];
	$day = $_POST['sday'];
	$timeS = $_POST['timeS'];
	$timeE = $_POST['timeE'];
	$roomName = $_POST['roomName'];
	$profName = $_POST['profName'];
	$courseID = $_GET['courseID'];
	$currID = $_GET['currID'];
	$cyear = $_GET['cyear'];
	$scode = $_GET['scode'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sec = $_GET['sec'];
	$title = $_GET['title'];
	$units = $_GET['units'];
	$lec = $_GET['lec'];
	$lab = $_GET['lab'];

	$check = checkFirstParameters($day, $timeS, $timeE, $roomName, $profName);
	if($check == 'pass'){
		$valid1 = checkRoomSched($day, $timeS, $timeE, $sem, $sy, $roomName, $schedID1, $schedID2);
		if($valid1 <= 0)
		{

			$valid2 = checkProfSched($day, $timeS, $timeE, $sem, $sy, $profName, $schedID1, $schedID2);
			if($valid2 <= 0){

				$valid3 = checkCourseSched($day, $timeS, $timeE, $sem, $sy, $courseID, $schedID1, $schedID2);
				if($valid3 <= 0){
					$sql = "SELECT * FROM tbl_schedule WHERE schedID=".$schedID2."";
					$result = mysqli_query($conn,$sql);	
					if($result)
					{
						$count=mysqli_num_rows($result);

						if($count>0){
							if ($profold == $profName) {
								// echo $days2;
								if ($day2 == "" and $timeS2 == "" and $timeE2 == "" and $room2 == "") {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName' where schedID=".$schedID2."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/InternalSchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								} else {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', sday2 = '".$day2."', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$room2' WHERE schedID=".$schedID2."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/InternalSchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								}
								
							} else {

								// DiminishFacultyLoadUnit($profold, $profName, $sy, $units, $sem, $day, $timeS, $timeE, $courseID, $currID, $scode);
								
								$load_type = FacultyLoad($profName, $sy, $units, $sem);

								if ($day2 == "" and $timeS2 == "" and $timeE2 == "" and $room2 == "") {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', load_type = ".$load_type." where schedID=".$schedID2."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/InternalSchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								} else {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', sday2 = '".$day2."', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$room2', load_type = ".$load_type." where schedID=".$schedID2."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/InternalSchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								}
							}
							
							
						}
						else
						{
							$sql = "INSERT INTO tbl_schedule VALUES ('','$currID','$courseID','$sec','$cyear','$scode','$title','$units','$lec','$lab','$day','$timeS','$timeE','$roomName','$profName','$sem','$sy','','','','','0')";
							$result = mysqli_query($conn,$sql);	
							echo $sql;
							if($result)
							{
								header("Location: index.php?r=administrator/InternalSchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=1");
							mysqli_close($conn);
							}
						}
					}
				} else {
					echo"
					<script src='http://localhost/FSIS/assets/jquery-3.6.0.min.js'></script>
					<script src='http://localhost/FSIS/assets/sweetalert2.all.min.js'></script>
					<script>

						Swal.fire({
							icon:'error',
							title:'Ooops!',
							text:'Conflict with the Student Course Schedule!'
							
						})
					</script>";
			
					echo'
											
								<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
								  <tbody>
								  <tr>
									<td class="table-narrow" colspan = "4">
									<h4><strong>Conflict:</strong></h4> 
									</td>
								</tr>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">Course:</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Year&Section</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Subject</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Room</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Day</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Start</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">End</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Sem</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Professor</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Schedule Type</td>
									</tr>
								';
				$sql = "SELECT * FROM tbl_schedule WHERE sday = '$day' && (stimeS BETWEEN ".$timeS." and ".$timeE." or stimeE BETWEEN ".$timeS." and ".$timeE.") AND schedID != ".$schedID2." && courseID = '$courseID' && schoolYear = '$sy' && sem = '$sem' && (Sched_type = 'INTERNAL' OR Sched_type = 'OFFICIAL')";
				
				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_array($result)) {
						echo'
												<tr>	
													<td style="text-align: left;">'. getCourse($row['courseID']) .'</td>
													<td style="text-align: left;">'. $row['cyear']. '-'.$row['csection'].'</td>			
													<td style="text-align: left;">'. getSubj($row['scode']) .'</td>
													<td style="text-align: left;">'. $row['sroom'].'</td>
													<td style="text-align: left;">'. $row['sday'].'</td>
													<td style="text-align: center;">'. to12Hr($row['stimeS']) .' </td>
													<td style="text-align: center;">'. to12Hr($row['stimeE']) .' </td>
													<td style="text-align: center;">'.$row['sem'] .' </td>											
													<td style="text-align: left;">'. getName($row['sprof']) .'</td>
													<td style="text-align: left;">'. $row['Sched_type'].'</td>
												</tr>';	

					}
										echo'
										
										</tbody>
										</table>
										<a href="index.php?r=administrator/SetInternalSchedule&schedID1='.$schedID1.'&schedID2='.$schedID2.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
				}
			} else {
				echo"
				<script src='http://localhost/FSIS/assets/jquery-3.6.0.min.js'></script>
				<script src='http://localhost/FSIS/assets/sweetalert2.all.min.js'></script>
				<script>

				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict with the Faculty Schedule!'
					
				})
				</script>";
		
				echo'
										
							<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
							  <tbody>
							  <tr>
								<td class="table-narrow" colspan = "4">
								<h4><strong>Conflict:</strong></h4> 
								</td>
							</tr>
								<tr>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">Course:</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Year&Section</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Subject</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Room</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Day</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Start</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">End</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Sem</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Professor</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Schedule Type</td>
								</tr>
							';
			$sql = "SELECT * FROM tbl_schedule WHERE sday = '$day' && (stimeS BETWEEN ".$timeS." and ".$timeE." or stimeE BETWEEN ".$timeS." and ".$timeE.") AND schedID != ".$schedID2." && sprof = '$profName' && schoolYear = '$sy' && sem = '$sem' && (Sched_type = 'INTERNAL' OR Sched_type = 'OFFICIAL')";
			
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result)) {
					echo'
											<tr>	
												<td style="text-align: left;">'. getCourse($row['courseID']) .'</td>
												<td style="text-align: left;">'. $row['cyear']. '-'.$row['csection'].'</td>			
												<td style="text-align: left;">'. getSubj($row['scode']) .'</td>
												<td style="text-align: left;">'. $row['sroom'].'</td>
												<td style="text-align: left;">'. $row['sday'].'</td>
												<td style="text-align: center;">'. to12Hr($row['stimeS']) .' </td>
												<td style="text-align: center;">'. to12Hr($row['stimeE']) .' </td>
												<td style="text-align: center;">'.$row['sem'] .' </td>											
												<td style="text-align: left;">'. getName($row['sprof']) .'</td>
												<td style="text-align: left;">'. $row['Sched_type'].'</td>
											</tr>';	

				}
									echo'
									
									</tbody>
									</table>
									<a href="index.php?r=administrator/SetInternalSchedule&schedID1='.$schedID1.'&schedID2='.$schedID2.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
			}
		}
	else
		{
				echo"
				<script src='http://localhost/FSIS/assets/jquery-3.6.0.min.js'></script>
				<script src='http://localhost/FSIS/assets/sweetalert2.all.min.js'></script>
				<script>

				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict with the Room Schedule!'
					
				})
				</script>";
		
				echo'
										
							<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
							  <tbody>
							  <tr>
								<td class="table-narrow" colspan = "4">
								<h4><strong>Conflict:</strong></h4> 
								</td>
							</tr>
								<tr>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">Course:</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Year&Section</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Subject</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Room</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Day</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Start</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">End</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Sem</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Professor</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Schedule Type</td>
								</tr>
							';
			$sql = "SELECT * FROM tbl_schedule WHERE sday = '$day' && (stimeS BETWEEN ".$timeS." and ".$timeE." or stimeE BETWEEN ".$timeS." and ".$timeE.") AND schedID != ".$schedID2." && sroom = '$roomName' && schoolYear = '$sy' && sem = '$sem' && (Sched_type = 'INTERNAL' OR Sched_type = 'OFFICIAL')";
			
			
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result)) {
					echo'
											<tr>	
												<td style="text-align: left;">'. getCourse($row['courseID']) .'</td>
												<td style="text-align: left;">'. $row['cyear']. '-'.$row['csection'].'</td>			
												<td style="text-align: left;">'. getSubj($row['scode']) .'</td>
												<td style="text-align: left;">'. $row['sroom'].'</td>
												<td style="text-align: left;">'. $row['sday'].'</td>
												<td style="text-align: center;">'. to12Hr($row['stimeS']) .' </td>
												<td style="text-align: center;">'. to12Hr($row['stimeE']) .' </td>
												<td style="text-align: center;">'.$row['sem'] .' </td>											
												<td style="text-align: left;">'. getName($row['sprof']) .'</td>
												<td style="text-align: left;">'. $row['Sched_type'].'</td>
											</tr>';	

				}
									echo'
									
									</tbody>
									</table>
									<a href="index.php?r=administrator/SetInternalSchedule&schedID1='.$schedID1.'&schedID2='.$schedID2.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';				

		}
	} else {
		header("location:index.php?r=administrator/SetInternalSchedule&schedID1=$schedID1&schedID2=$schedID2&prof=$profold&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=1");
	}
	
	function getName($fcode)
	{
		include("config.php");
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}
	function getCourse($courseID)
	{
		include("config.php");
		$course_code = "";
		$sql = "SELECT * FROM tbl_course WHERE course = '$courseID'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$course_code = $row['course_code'];
		}
		return $course_code;
	}
	function getSubj($scode)
	{
		include("config.php");
		$Subject = "";
		$sql = "SELECT * FROM tbl_subjects WHERE SubjCode = '$scode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$Subject = $row['SubjDescription'];
		}
		return $Subject;
	}
	
	function to12Hr($ctime)
	{
		$strTime = "";
		if($ctime==700) {
			$strTime = "07:00 AM";
		} else if($ctime==730) {
			$strTime = "07:30 AM";
		} else if($ctime==800) {
			$strTime = "08:00 AM";
		} else if($ctime==830) {
			$strTime = "08:30 AM";
		} else if($ctime==900) {
			$strTime = "09:00 AM";
		} else if($ctime==930) {
			$strTime = "09:30 AM";
		} else if($ctime==1000) {
			$strTime = "10:00 AM";
		} else if($ctime==1030) {
			$strTime = "10:30 AM";
		} else if($ctime==1100) {
			$strTime = "11:00 AM";
		} else if($ctime==1130) {
			$strTime = "11:30 AM";
		} else if($ctime==1200) {
			$strTime = "12:00 NN";
		} else if($ctime==1230) {
			$strTime = "12:30 NN";
		} else if($ctime==1300) {
			$strTime = "01:00 PM";
		} else if($ctime==1330) {
			$strTime = "01:30 PM";
		} else if($ctime==1400) {
			$strTime = "02:00 PM";
		} else if($ctime==1430) {
			$strTime = "02:30 PM";
		} else if($ctime==1500) {
			$strTime = "03:00 PM";
		} else if($ctime==1530) {
			$strTime = "03:30 PM";
		} else if($ctime==1600) {
			$strTime = "04:00 PM";
		} else if($ctime==1630) {
			$strTime = "04:30 PM";
		} else if($ctime==1700) {
			$strTime = "05:00 PM";
		} else if($ctime==1730) {
			$strTime = "05:30 PM";
		} else if($ctime==1800) {
			$strTime = "06:00 PM";
		} else if($ctime==1830) {
			$strTime = "06:30 PM";
		} else if($ctime==1900) {
			$strTime = "07:00 PM";
		} else if($ctime==1930) {
			$strTime = "07:30 PM";
		} else if($ctime==2000) {
			$strTime = "08:00 PM";
		} else if($ctime==2030) {
			$strTime = "08:30 PM";
		} else if($ctime==2100) {
			$strTime = "09:00 PM";
		} else if($ctime==2130) {
			$strTime = "09:30 PM";
		} else if($ctime==2200) {
			$strTime = "10:00 PM";
		} else if($ctime==2230) {
			$strTime = "10:30 PM";
		}
		return $strTime;
	}

	function checkFirstParameters($day, $timein, $timeout, $roomName, $profName){
		$valid = "";
		if($day == "" and $timein == "" and $timeout == "" and $roomName == "" and $profName == ""){
			$valid = "fail";
		} else if($timein > $timeout){
			$valid = "fail";
		} else if($timein == $timeout){
			$valid = "fail";
		} else {
			$valid = "pass";
		}
		return $valid;
	}

	function checkRoomSched($day, $timein, $timeout, $sem, $sy, $roomName, $schedID1, $schedID2)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and (schedID != ".$schedID1." AND schedID != ".$schedID2.") and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and sroom = '".$roomName."' and (Sched_type = 'OFFICIAL' OR Sched_type = 'INTERNAL')";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		
		

		return $count;
	}

	function checkProfSched($day, $timein, $timeout, $sem, $sy, $profName, $schedID1, $schedID2)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and (schedID != ".$schedID1." AND schedID != ".$schedID2.") and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and sprof = '".$profName."'and (Sched_type = 'OFFICIAL' OR Sched_type = 'INTERNAL')";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		
		

		
		return $count;
	}

	function checkCourseSched($day, $timein, $timeout, $sem, $sy, $courseID, $schedID1, $schedID2){
		include("config.php");
		
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and (schedID != ".$schedID1." AND schedID != ".$schedID2.") and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and courseID = '".$courseID."'and (Sched_type = 'OFFICIAL' OR Sched_type = 'INTERNAL')";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		
		

		
		return $count;
	}

	function FacultyLoad($fcode, $sy, $units, $sem){
		include("config.php");
		$load_type=0; 

		$sqleval = "SELECT Regular_Load FROM tbl_evaluationfaculty WHERE FCode = '".$fcode."'";
		$result = mysqli_query($conn, $sqleval);
		$row = mysqli_fetch_array($result);
		$reg = $row['Regular_Load'];

		
		if($reg == 0){
			$load_type = 0;
		} else if($reg == 9){
			$load_type = 1;
		} else {
			$load_type = 1;	
		}
		return $load_type;
	}

	
?>
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container2 widget-categories'>
<h2 class=widget-heading>Profile</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SchedulingMenu.php");?>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
</div>
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.puptaguig.net' title=Home>Home</a>
</li>
<li>
<a href='index.php?r=site/about' title=About>About</a>
</li>
<li>
<a href='index.php?r=site/contact' title=Contacts>Contacts</a>
</li>
</ul>
</section>
<!-- End - Footer right -->
</div>
</footer>
<!-- End - Page footer -->
<!-- Theme backgrounds -->
<div id=theme-backgrounds>

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>

