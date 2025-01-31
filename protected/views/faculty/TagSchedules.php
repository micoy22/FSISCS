﻿<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

	}
} else {
	header("location:index.php?r=site/");
}
?>
<!DOCTYPE html>
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
<title>Scheduling | Schedule Management </title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
aside.page-sidebar{
display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}
</style>

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
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->

<div id=page-content>
<!-- Video - HTML5 -->
<section>
<!--
<?php
	if(isset($_GET['mode'])) {
		if($_GET['mode']==1) {
			
		} else {
			include("Gwe.php");
		}
	} 
?>-->

<h2 class="underlined-header">Manage Tagged Subjects</h2>

<br />
<br />
	<?php
		$currYear=date("Y")+1;
		$prevYear=date("Y");
		$yearString = $prevYear."-".$currYear;
	?>
	<form name="frmSched" method = "post" action = "index.php?r=faculty/TagSchedules">
		<h4 class="underlined-header">Semester</h4>
		<select name = "sem" style="width: 30%;">
			<?php
				$row=1;
				$disp = 0;
				if(isset($_GET['sem']))
				{	
					echo'<option value="'.$_GET['sem'].'">'.$_GET['sem'].'</option>';
				}
				else if(isset($_POST['sem']))
				{	
					echo'<option value="'.$_POST['sem'].'">'.$_POST['sem'].'</option>';
				}
				while($row <= 3) {
					$disp = $row;
					if($row==3){
						$disp = "SUMMER";
					}
					echo '
						<option value = "'.$row.'"> '. $disp .'</option>
					';
					$row ++;
				}
			?>
		</select>
		<br />
		<h4 class="underlined-header">School Year</h4>
		<select name = "sy" style="width: 30%;">
			<?php
					
				if(isset($_GET['sy'])){
						$sh = $_GET['sy'];
						$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh' ORDER BY schoolYear DESC";
						$result1 = mysqli_query($conn, $sql1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
						}
				}
				else if(isset($_POST['sy']))
				{
					$sh = $_POST['sy'];
					$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh' ORDER BY schoolYear DESC";
					$result1 = mysqli_query($conn, $sql1);
					while($row1 = mysqli_fetch_array($result1)){
						echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
					}
				}
				$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result)) {
					echo '
						<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>
					';
				}
			?>
		</select>
		<input type="submit" name="btnSubmit" value="Go" />
		</form>

</section>
<section>
<table class=round-5 style="width:100%; ">
<tbody>
				
					<?php
						$EmpID = $_SESSION['FCode']; 
						$csem = 0;
						if(isset($_POST['sem'])) {
							$csem = $_POST['sem'];
						}
						if(isset($_GET['sem'])) {
							$csem = $_GET['sem'];
						}
						$strSem = "";
						$years = 4;
						$stime = "";
						$sday = "";
						$sprof = "";
						$sroom = "";
						$yr = ""; 
						$cors = "";
						$sy = "";
						$sec = "";
						if(isset($_POST['course'])){
							$cors = $_POST['course'];
						}
						if(isset($_GET['courseID'])){
							$cors = $_GET['courseID'];
						}
						if(isset($_POST['sy'])){
							$sy = $_POST['sy'];
						}
						if(isset($_GET['sy'])){
							$sy = $_GET['sy'];
						}
						if(isset($_POST['sec'])){
							$sec = $_POST['sec'];
						}
						if(isset($_GET['sec'])){
							$sec = $_GET['sec'];
						}
						if(isset($_POST['sem'])){
							$sem = $_POST['sem'];
						}
						if(isset($_GET['sem'])){
							$sem = $_GET['sem'];
						}
						$profnow = $_SESSION['FCode'];
						$sqlo = "SELECT * from tbl_evaluationfaculty where FCode = '$profnow' AND  status = 'Active' order by LName";
						$queryo = mysqli_query($conn,$sqlo);

						while($rowo = mysqli_fetch_array($queryo))
						{	
							$pr = $rowo['FCode'];
							$sql = "SELECT DISTINCT sprof,sem,schoolYear FROM  	tbl_subjpreferences WHERE sem = '$csem' and schoolYear = '$sy' and sprof = '$pr'";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{			
							$EmpID = $row['sprof'];
							if($csem==1) {
								$strSem = "FIRST SEMESTER";
							} else if($csem==2) {
								$strSem = "SECOND SEMESTER";
							}
							echo '
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td class="table-narrow" colspan="6" style="text-align: left"><a class="btn btn-mini">'. getName($EmpID) .'</a> <a class="btn btn-mini">'. $strSem .'</a> <a class="btn btn-mini pull-right">'. $sy .'</a></td>
									</tr>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">UNITS</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
									</tr>
								';
							$cID = 0;
							if(isset($_POST['course'])){
								$cID = $_POST['course'];
							}
							if(isset($_GET['courseID'])){
								$cID = $_GET['courseID'];
							}
							if(isset($_GET['currID'])){
								$currID = $_GET['currID'];
							}
							
							
							$sql = "SELECT * FROM tbl_subjpreferences WHERE sprof = '$EmpID' AND sem = '$csem' and schoolYear = '$sy'";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query)) {

								$scode = $row['scode'];
								$stitle = $row['stitle'];
								$lec = $row['lec'];
								$lab = $row['lab'];
								$sunit = $row['units'];
								$lec = $row['lec'];
								$lab = $row['lab'];
								$schedID = $row['schedID'];
								$prof = getProf($row['scode'],$sy,$csem,$schedID);
								
								echo '
									<tr>
										<td style="text-align: left;">'. $scode .'</td>
										<td style="text-align: left;">'. $stitle .'</td>
										<td style="text-align: left;">'. $lec .'</td>
										<td style="text-align: left;">'. $lab .'</td>
										<td style="text-align: center;">'. $sunit .'</td>
										';
								echo '
										
										<td style="text-align: center;">
										
										<a href="index.php?r=faculty/DeleteTagged&schedID='. $schedID .'&sem='. $sem .'&sy='. $sy .'" class="btn btn-primary" style="width:45px">DELETE</a>
										
										</td>
										
									</tr>
								';
							}
							echo '
									</tbody>
								</table>
								';
							}
						}
						function checkCurrRef($cID,$yr,$sy) 
						{
							include("config.php");
							$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr' AND schoolYear = '$sy'"; 
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$ID = $row['currID'];
							return $ID;
						}
												
						function getRoom($scode,$sy,$csem,$schedID)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_subjpreferences WHERE schedID = '$schedID' AND scode = '$scode' AND schoolYear = '$sy' AND sem = '$csem'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							if($row['sroom2']<>'')
							{
								$room = $row['sroom'] . '/' . $row['sroom2'];
							}
							else
							{
								$room = $row['sroom'];
							}
							return $room;
						}
						
						function getProf($scode,$sy,$csem,$schedID)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_subjpreferences WHERE schedID = '$schedID' AND scode = '$scode' AND schoolYear = '$sy' AND sem = '$csem'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$sy,$csem,$schedID)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_subjpreferences WHERE schedID = '$schedID' AND scode = '$scode' AND schoolYear = '$sy' AND sem = '$csem'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							if($row['stimeS2']<>"")
							{
								if($row['stimeS']<>0){
									$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']) . '/' . to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
								}else{
									$time = "";
								}
							}else
							{
								if($row['stimeS']<>'')
								{
									$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
								}
								else
								{
									$time = "";
								}
							}
							return $time;
						}
						
						/*
						function getSchedule($currID, $scode, $arg) 
						{
							$csem = 1;
							$stimeS = "";
							$stimeE = "";
							$sday = "";
							$sprof = "";
							$sroom = "";
							
							$sql = "SELECT * FROM tbl_schedule WHERE currID='$currID' AND scode='$scode'";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query)) {
								$stimeS = $row['stimeS'];
								$stimeE = $row['stimeE'];
								$sday = $row['sday'];
								$sprof = $row['sprof'];
								$sroom = $row['sroom'];
							}

							if($arg=="PROF") {
								$sprof = getName($sprof);
								return '<td>'. $sprof .'</td>';
							} else if($arg=="TIME") {
								if($stimeS!="") {
									return $sday . ' ' . to12Hr($stimeS) . '-' . to12Hr($stimeE) .' ' .$sroom;
								} else {
									return "";
								}
							}
						}*/
						
						function getName($fcode)
						{
							include("config.php");
							$Name = "";
							$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result)){
								$Name = $row['LName'] .', '. $row['FName'];
							}
							return $Name;
						}
						
						function to12Hr($ctime) {
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
						
						function to24Hr($ctime) {
							$strTime = "";
							if($ctime=="07:00 AM") {
								$strTime = 700;
							} else if($ctime=="07:30 AM") {
								$strTime = 730;
							} else if($ctime=="08:00 AM") {
								$strTime = 800;
							} else if($ctime=="08:30 AM") {
								$strTime = 830;
							} else if($ctime=="09:00 AM") {
								$strTime = 900;
							} else if($ctime=="09:30 AM") {
								$strTime = 930;
							} else if($ctime=="10:00 AM") {
								$strTime = 1000;
							} else if($ctime=="10:30 AM") {
								$strTime = 1030;
							} else if($ctime=="11:00 AM") {
								$strTime = 1100;
							} else if($ctime=="11:30 AM") {
								$strTime = 1130;
							} else if($ctime=="12:00 NN") {
								$strTime = 1200;
							} else if($ctime=="12:30 NN") {
								$strTime = 1230;
							} else if($ctime=="01:00 PM") {
								$strTime = 1300;
							} else if($ctime=="01:30 PM") {
								$strTime = 1330;
							} else if($ctime=="02:00 PM") {
								$strTime = 1400;
							} else if($ctime=="02:30 PM") {
								$strTime = 1430;
							} else if($ctime=="03:00 PM") {
								$strTime = 1500;
							} else if($ctime=="03:30 PM") {
								$strTime = 1530;
							} else if($ctime=="04:00 PM") {
								$strTime = 1600;
							} else if($ctime=="04:30 PM") {
								$strTime = 1630;
							} else if($ctime=="05:00 PM") {
								$strTime = 1700;
							} else if($ctime=="05:30 PM") {
								$strTime = 1730;
							} else if($ctime=="06:00 PM") {
								$strTime = 1800;
							} else if($ctime=="06:30 PM") {
								$strTime = 1830;
							} else if($ctime=="07:00 PM") {
								$strTime = 1900;
							} else if($ctime=="07:30 PM") {
								$strTime = 1930;
							} else if($ctime=="08:00 PM") {
								$strTime = 2000;
							} else if($ctime=="08:30 PM") {
								$strTime = 2030;
							} else if($ctime=="09:00 PM") {
								$strTime = 2100;
							} else if($ctime=="09:30 PM") {
								$strTime = 2130;
							} else if($ctime=="10:00 PM") {
								$strTime = 2200;
							} else if($ctime=="10:30 PM") {
								$strTime = 2230;
							}
							return $strTime;
						}
					?>
</tbody>
</table>
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>
</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SubjectMenu.php");?>
</ul>
</div>


</section>
</aside>
<!-- End - Page sidebar -->
</div>

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
<a href='http://www.puptaguig.org' title=Home>Home</a>
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
<script src='http://localhost/FSIS/assets/jquery-3.6.0.min.js'></script>
<script src='http://localhost/FSIS/assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
	$('.btn-primary').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: 'Confirm Untagging this Subject?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirm',

		}).then((result) => {
			if(result.value){
				document.location.href = href;
			}
		})
	})

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Untagged!',
			timer: '2000'
		})
	}
</script>
</body>
</html>

