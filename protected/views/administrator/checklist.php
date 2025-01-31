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
<title>Reports | Checklist</title>
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
<section id="page-body-content">
<div id="page-body-content-inner">
<!-- Page content -->
<div id="page-content">
<!-- Video - HTML5 -->
<section>

<?php
	$sqlCoverage = "SELECT * FROM tbl_reportcoverage WHERE report = 'FAS'";
	$resultCoverage=mysqli_query($conn, $sqlCoverage);
	$rowCoverage = mysqli_fetch_array($resultCoverage);
	$yfrom = $rowCoverage['yfrom'];
	$fromMonth = date('F', mktime(0, 0, 0, $rowCoverage['fromMonth'], 10));
	$schoolYear = $yfrom . '-' . ($yfrom+1);
?>

<h2 class="underlined-header">Faculty Checklist (as of <?php echo $fromMonth . ' ' . $yfrom; ?>)</h2>
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
<a href="index.php?r=administrator/printChecklist" class="btn btn-mini"><button>Print</button></a>
<section>
<br />

<table class=round-2 style="width:100%; ">
<thead>
<tr>
<th><h5>Campus Officials</h5></th>
<th><h5>Action</h5></th>
</tr>
</thead>

<tfoot>
<tr>
<td colspan=2></td>
</tr>
</tfoot>
<tbody>
<?php
	$sql = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' AND schoolYear = '$schoolYear' order by FName ASC";
	$query = mysqli_query($conn, $sql);
	$i = 1;
	while($row = mysqli_fetch_array($query)) 
	{
		$ID = $row['ID'];
		$Name = $row['FName'];
		$Number = $row['Contact'];
		$Bday = $row['BMonth'] .'/' . $row['Bday'] . '/' . $row['BYear'];
		echo '
			<tr>
			<td style="text-align: left;">'.$i .'.'. $Name .'</td>
			<td style="text-align: left;"><a href="index.php?r=administrator/crcl&ID='.$ID.'&roomName='.$Name.'&status=Branch Officials" class="btn btn-mini"><button style="width:55px;">Delete</button></a></td>
			</tr>
		';
		$i++;
	}

	echo'
	<tr>
	<th><h5>Full Time Faculty</h5></th>
	<th><h5></h5></th>
	</tr>
	</thead>

	<tfoot>
	<tr>
	</tfoot>';
		
	$sql = "SELECT * FROM tbl_masterlist WHERE Status = 'FT' AND schoolYear = '$schoolYear' order by FName ASC";
	$query = mysqli_query($conn,$sql);
	$i = 1;
	while($row = mysqli_fetch_array($query)) 
	{
		$ID = $row['ID'];
		$Name = $row['FName'];
		$Number = $row['Contact'];
		$Bday = $row['BMonth'] . '/' . $row['Bday'] . '/' . $row['BYear'];
		echo '
			<tr>
			<td style="text-align: left;">'.$i .'.'. $Name .'</td>
			<td style="text-align: left;"><a href="index.php?r=administrator/crcl&ID='.$ID.'&roomName='.$Name.'&status=Full Time Faculty" class="btn btn-mini"><button style="width:55px;">Delete</button></a></td>
			</tr>
		';
		$i++;
	}
	
	echo'
	<tr>
	<th><h5>Part Time Faculty</h5></th>
	<th><h5></h5></th>
	</tr>
	</thead>

	<tfoot>
	<tr>
	</tfoot>';
	
	$sql = "SELECT * FROM tbl_masterlist WHERE Status = 'PT' AND schoolYear = '$schoolYear' order by FName ASC";
	$query = mysqli_query($conn,$sql);
	$i = 1;
	while($row = mysqli_fetch_array($query)) 
	{
		$ID = $row['ID'];
		$Name = $row['FName'];
		$Number = $row['Contact'];
		$Bday = $row['BMonth'] . '/' . $row['Bday'] . '/' . $row['BYear'];
		echo '
			<tr>
			<td style="text-align: left;">'.$i .'.'. $Name .'</td>
			<td style="text-align: left;"><a href="index.php?r=administrator/crcl&ID='.$ID.'&roomName='.$Name.'&status=Part Time Faculty" class="btn btn-mini"><button style="width:55px;">Delete</button></a></td>
			</tr>
		';
		$i++;
	}
	
	echo'
	<tr>
	<th><h5>New Faculty</h5></th>
	<th><h5></h5></th>
	</tr>
	</thead>

	<tfoot>
	<tr>
	</tfoot>';
	$sql = "SELECT * FROM tbl_masterlist WHERE Status = 'NF' AND schoolYear = '$schoolYear' order by FName ASC";
	$query = mysqli_query($conn,$sql);
	$i = 1;
	while($row = mysqli_fetch_array($query)) 
	{
		$ID = $row['ID'];
		$Name = $row['FName'];
		$Number = $row['Contact'];
		$Bday = $row['BMonth'] . '/' . $row['Bday'] . '/' . $row['BYear'];
		echo '
			<tr>
			<td style="text-align: left;">'.$i .'.'. $Name .'</td>
			<td style="text-align: left;"><a href="index.php?r=administrator/crcl&ID='.$ID.'&roomName='.$Name.'&status=New Faculty" class="btn btn-mini"><button style="width:55px;">Delete</button></a></td>
			</tr>
		';
		$i++;
	}
	
?>
	
</tbody>
</table>

</section>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>

<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("reportsMenu.php");?>
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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
