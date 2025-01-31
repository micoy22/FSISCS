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
<title>Scheduling | Categorize Subjects</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
    
#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 41px;
}
    
#menu_strip
{
    margin-top: 10px;
}
    
#menu_strip a
{
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_strip a:hover
{
    background-color: lightgray;
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    font-size: 16px;
    width: 100%;
}
    
#options_menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    width: 100%;
}
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
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class="underlined-header">Categorize Subjects</h2>
<!--<a href="index.php?r=administrator/addCategories" class="btn btn-mini"><button>Add Category</button></a>-->

<?php
	$currYear=date("Y")+1;
	$prevYear=date("Y");
	$yearString = "".$prevYear."-".$currYear."";
?>
<form name="frmcurr" method = "post" action = "index.php?r=administrator/categorizeSubjects">
		<h4>Semester</h4>
		<select name = "sem" style="width: 30%;">
			<?php
				$row=1;
				$disp = 0;
				if(isset($_GET['sem']))
				{	
					echo'<option>'.$_GET['sem'].'</option>';
				}
				if(isset($_POST['sem']))
				{	
					echo'<option>'.$_POST['sem'].'</option>';
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
		<h4>School Year</h4>
		<select name = "sy" style="width: 100%;">
		<?php
			echo'<option>'.$yearString.'</option>';
			if(isset($_GET['sy']))
			{
				echo'<option>'.$_GET['sy'].'</option>';
			}
			if(isset($_POST['sy']))
			{	
				echo'<option>'.$_POST['sy'].'</option>';
			}
			$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result)) {
				if($yearString!=$row['schoolYear'])
				{
				echo'
					<option value="'. $row['schoolYear'] .'"> '. $row['schoolYear'] .'</option>
					';
				}
			}
		?>
		</select>
        <br/>
        <br/>
		<input type="submit" name="btnSubmit" value="Generate" />
</form>

<section>

<?php
	$sem = "";
	$sy = "";
	
	if(isset($_POST['sem']) and isset($_POST['sy'])){
		$sy = $_POST['sy'];
		$sem = $_POST['sem'];
		echo'
		<table class=round-5 style="width:100%; ">
		<thead>
		<tr>
		<th><h5>Subject Code</h5></th>
		<th><h5>Subject Description</h5></th>
		<th><h5>Category</h5></th>
		<th><h5>Action</h5></th>
		</tr>
		</thead>

		<tfoot>
		<tr>
		<td colspan=5></td>
		</tr>
		</tfoot>
		<tbody>';

			$sqlCurr = "select SubjCode, SubjDescription, Category from tbl_subjects";
			$queryCurr = mysqli_query($conn, $sqlCurr);
			while($rowCurr = mysqli_fetch_array($queryCurr)) {
				$scode = $rowCurr['SubjCode'];
				$title = $rowCurr['SubjDescription'];
				$category = $rowCurr['Category'];
				echo '
				<tr>
				<td style="text-align: left;">&nbsp&nbsp&nbsp'. $scode .'</td>
				<td style="text-align: left;">'. $title .'</td>
				<td style="text-align: center;">'. $category .'</td>
				<td style="text-align: left;"><a href="index.php?r=administrator/editCategory&ccode='.$scode.'&cdesc='.$title.'&sem='.$sem.'&sy='.$sy.'" class="btn btn-mini"><button style="width:55px">Edit</button></a> </td>
				</tr>
			';
			}
		
	}
	/*
	if(isset($_POST['sem']))
	{
		$sem = $_POST['sem'];
		echo'
		<table class=round-5 style="width:100%; ">
		<thead>
		<tr>
		<th><h5>Subject Code</h5></th>
		<th><h5>Subject Description</h5></th>
		<th><h5>Course</h5></th>
		<th><h5>Category</h5></th>
		<th><h5>Action</h5></th>
		</tr>
		</thead>

		<tfoot>
		<tr>
		<td colspan=5></td>
		</tr>
		</tfoot>
		<tbody>';
		
		$c = "";
		$cid = "";
		$sql = "SELECT DISTINCT scode,stitle,courseID,cyear,csection FROM tbl_curriculum where sem = '$sem' order by scode";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($query)) 
		{
			$ccode = $row['scode'];
			$cdesc = $row['stitle'];
			$courseid = $row['courseID'];
				$sql3 = "SELECT * FROM tbl_course where course = '$courseid'";
				$query3 = mysqli_query($conn, $sql3);
				while($row3 = mysqli_fetch_array($query3)) 
				{
					$c = $row3['course_code'];
				}
				$course = $c." ".$row['cyear']."-".$row['csection'];
				$sql2 = "SELECT * FROM tbl_subjects where SubjCode = '$ccode' and SubjDescription = '$cdesc'";
				$query2 = mysqli_query($sql2);
				while($row2 = mysqli_fetch_array($query2)) 
				{
				$cid = $row2['Category'];	
				}
			echo '
				<tr>
				<td style="text-align: center;">'. $ccode .'</td>
				<td style="text-align: left;">'. $cdesc .'</td>
				<td style="text-align: left;">'. $course .'</td>
				<td style="text-align: center;">'. $cid .'</td>
				<td style="text-align: left;"><a href="index.php?r=administrator/editCategory&ccode='.$ccode.'&cdesc='.$cdesc.'&sem='.$sem.'&sy='.$sy.'" class="btn btn-mini"><button style="width:55px">Edit</button></a> </td>
				</tr>
			';
		}	
	}
	
	if(isset($_GET['sy']))
	{
		$sy = $_GET['sy'];
	}
		
	if(isset($_GET['sem']))
	{
		$sem = $_GET['sem'];
		echo'
		<table class=round-5 style="width:100%; ">
		<thead>
		<tr>
		<th><h5>Subject Code</h5></th>
		<th><h5>Subject Description</h5></th>
		<th><h5>Course</h5></th>
		<th><h5>Category</h5></th>
		<th><h5>Action</h5></th>
		</tr>
		</thead>

		<tfoot>
		<tr>
		<td colspan=5></td>
		</tr>
		</tfoot>
		<tbody>';
	
		$c = "";
		$cid = "";
		$sql = "SELECT DISTINCT scode,stitle,courseID,cyear,csection FROM tbl_curriculum where sem = '$sem' order by scode";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($query)) 
		{
			$ccode = $row['scode'];
			$cdesc = $row['stitle'];
			$courseid = $row['courseID'];
				$sql3 = "SELECT * FROM tbl_course where course = '$courseid'";
				$query3 = mysqli_query($conn, $sql3);
				while($row3 = mysqli_fetch_array($query3)) 
				{
					$c = $row3['course_code'];
				}
				$course = $c." ".$row['cyear']."-".$row['csection'];
				$sql2 = "SELECT * FROM tbl_subjects where SubjCode = '$ccode' and SubjDescription = '$cdesc'";
				$query2 = mysqli_query($conn,$sql2);
				while($row2 = mysqli_fetch_array($query2)) 
				{
				$cid = $row2['Category'];	
				}
			echo '
				<tr>
				<td style="text-align: center;">'. $ccode .'</td>
				<td style="text-align: left;">'. $cdesc .'</td>
				<td style="text-align: left;">'. $course .'</td>
				<td style="text-align: center;">'. $cid .'</td>
				<td style="text-align: left;"><a href="index.php?r=administrator/editCategory&ccode='.$ccode.'&cdesc='.$cdesc.'&sem='.$sem.'&sy='.$sy.'" class="btn btn-mini"><button style="width:55px">Edit</button></a> </td>
				</tr>
			';
		}
	
	}*/
			
?>
				<!--<input type="hidden" name ="cid" value=<?php //echo $cid;?> />-->
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
<?php include("SchedulingMenu.php");?>
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
