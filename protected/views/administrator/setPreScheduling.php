﻿<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {
	
	} else if($_SESSION['user']==0) {
		header("Location: index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=administrator/");
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
<title>Schedule Management | Set</title>
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

<h2 class=underlined-header>Set Schedule <?php echo $_GET['scode'];?></h2>

<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if($_GET['msgType']=="succ") {
			echo '
			<div class="box-info">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		} else {
			echo '
			<div class="box-error">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		}
	} 
?>
<?php
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
	
?>
<button onclick="history.go(-1);">Back </button>
<p>* Required fields.</p>
<hr style="margin-top: -10px;" />
<form id="annc" name="annc" action="index.php?r=administrator/processSetPreScheduling&currID=<?php echo $_GET['currID'];?>&cID=<?php echo $_GET['cID'];?>&yrlvl=<?php echo $_GET['yrlvl'];?>&scode=<?php echo $_GET['scode'];?>&sem=<?php echo $_GET['sem'];?>&sy=<?php echo $_GET['sy'];?>&sec=<?php echo $_GET['sec'];?>&cat=<?php echo $_GET['category'];?>" method="post">
<p style="margin-bottom: 9px;">*Prof. Name:
<select name="profName" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$currID = $_GET['currID'];
		$cID = $_GET['cID'];
		$yrlvl = $_GET['yrlvl'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$prof = "";
		$blank = "";
		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$prof = $row2['sprof'];
		}
		
		if($prof <> "")
		{
			echo'
				<option value="'. $prof .'"> '. getName($prof)  .'</option>
			';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		
		$sql="SELECT * FROM tbl_evaluationfaculty order by LName ASC";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)) 
		{
			echo '
				<option value="'. $row['FCode'] .'"> '. $row['LName'] .', '. $row['FName'] .'</option>
			';
		}
		
	?>
</select>
</p>

<p style="margin-bottom: 9px;">*Day:
<select name="sday" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$blank = "";
		$d1 = "M";
		$d2 = "T";
		$d3 = "W";
		$d4 = "TH";
		$d5 = "F";
		$d6 = "S";
		$d = "";
		$currID = $_GET['currID'];
		$cID = $_GET['cID'];
		$yrlvl = $_GET['yrlvl'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$araw = "";
		
		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$araw = $row2['sday'];
		}
		
		if($araw <> "")
		{
			echo '<option value = "'.$araw.'">'. $araw .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		
		for($day=1;$day<=6;$day++) 
		{
			if($day==1)
			{
				$d = $d1;
			}
			elseif($day==2)
			{
				$d = $d2;
			}
			elseif($day==3)
			{
				$d = $d3;
			}
			elseif($day==4)
			{
				$d = $d4;
			}
			elseif($day==5)
			{
				$d = $d5;
			}
			elseif($day==6)
			{
				$d = $d6;
			}
			echo '<option value = "'.$d.'">'. $d .'</option>';
		}
	?>
</select>
</p>
<p style="margin-bottom: 9px;">*Time Start:
<select name="timeS" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$currID = $_GET['currID'];
		$cID = $_GET['cID'];
		$yrlvl = $_GET['yrlvl'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$start = "";
		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$start = $row2['stimeS'];
		}
		
		if($start <> "")
		{
			echo '<option value="'. $start .'">'. to12Hr($start) .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}

		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p>
<p style="margin-bottom: 9px;">*Time End:
<select name="timeE" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$currID = $_GET['currID'];
		$cID = $_GET['cID'];
		$yrlvl = $_GET['yrlvl'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$end = "";
		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$end = $row2['stimeE'];
		}
		
		if($end <> "")
		{
			echo '<option value="'. $end .'">'. to12Hr($end) .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p>
<!--<p style="margin-bottom: 9px;">*Room:<input name="roomName" type=text style="width: 470px; margin-top: -28px; margin-left: 15%;"  placeholder='Room Name'/></p>-->
<p style="margin-bottom: 9px;">*Room:
<select name="roomName" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$currID = $_GET['currID'];
		$cID = $_GET['cID'];
		$yrlvl = $_GET['yrlvl'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$rm = "";
		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn,$sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$rm = $row2['sroom'];
		}
		
		if($rm <> "")
		{
			echo '<option value="'. $rm .'">'. $rm .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		$sql="SELECT * FROM tbl_room";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)) 
		{
			echo '
				<option value="'. $row['roomName'] .'"> '. $row['roomName'] .'</option>
			';
		}
	?>
</select>
</p>

<?php
	$day2 = "";
	$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
	$result2 = mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_array($result2))
	{
		$day2 = $row2['sday2'];
	}
		if($day2<>"")
		{
		/////////////////////////////////////////// DAY //////////////////////////////////////////////
		echo'
			<br />
			<br />
			<p style="margin-bottom: 9px;">*Day:
			<select name="sday2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			
			$blank = "";
			$d1 = "M";
			$d2 = "T";
			$d3 = "W";
			$d4 = "TH";
			$d5 = "F";
			$d6 = "S";
			$d = "";
			$currID = $_GET['currID'];
			$cID = $_GET['cID'];
			$yrlvl = $_GET['yrlvl'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$araw = "";
			
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$araw = $row2['sday2'];
			}
			
			if($araw <> "")
			{
				echo '<option value = "'.$araw.'">'. $araw .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}
			
			for($day=1;$day<=6;$day++) 
			{
				if($day==1)
				{
					$d = $d1;
				}
				elseif($day==2)
				{
					$d = $d2;
				}
				elseif($day==3)
				{
					$d = $d3;
				}
				elseif($day==4)
				{
					$d = $d4;
				}
				elseif($day==5)
				{
					$d = $d5;
				}
				elseif($day==6)
				{
					$d = $d6;
				}
				echo '<option value = "'.$d.'">'. $d .'</option>';
			}
		echo'
			</select>
			</p>
		';
		////////////////////////////////////////////// START TIME /////////////////////////////////////
		echo'
			<p style="margin-bottom: 9px;">*Time Start:
			<select name="timeS2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			$currID = $_GET['currID'];
			$cID = $_GET['cID'];
			$yrlvl = $_GET['yrlvl'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$start = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$start = $row2['stimeS2'];
			}
			
			if($start <> "")
			{
				echo '<option value="'. $start .'">'. to12Hr($start) .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}

			for($ctime=700;$ctime<=2200;) {
				echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
				if($ctime%100==0) {
					$ctime = $ctime + 30;
				} else {
					$ctime = $ctime + 70;
				}
			}
		echo'
			</select>
			</p>
		';
		////////////////////////////////////////////// END TIME /////////////////////////////////////
		echo'
			<p style="margin-bottom: 9px;">*Time End:
			<select name="timeE2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			$currID = $_GET['currID'];
			$cID = $_GET['cID'];
			$yrlvl = $_GET['yrlvl'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$end = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$end = $row2['stimeE2'];
			}
			
			if($end <> "")
			{
				echo '<option value="'. $end .'">'. to12Hr($end) .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}

			for($ctime=700;$ctime<=2200;) {
				echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
				if($ctime%100==0) {
					$ctime = $ctime + 30;
				} else {
					$ctime = $ctime + 70;
				}
			}
		echo'
			</select>
			</p>
		';
		////////////////////////////////////////////// ROOM /////////////////////////////////////
		echo'
			<p style="margin-bottom: 9px;">*Room:
			<select name="roomName2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			$currID = $_GET['currID'];
			$cID = $_GET['cID'];
			$yrlvl = $_GET['yrlvl'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$rm = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$rm = $row2['sroom2'];
			}
			
			if($rm <> "")
			{
				echo '<option value="'. $rm .'">'. $rm .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}
			$sql="SELECT * FROM tbl_room";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result)) 
			{
				echo '
					<option value="'. $row['roomName'] .'"> '. $row['roomName'] .'</option>
				';
			}
			
			echo'
				</select>
				</p>
			';
		}

?>

<center><p><input type="submit" value="Save" /></p> </center>
</form>

</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>

