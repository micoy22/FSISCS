<?php 
include('getPersonalInformation.php');
include('config.php');

$sql = "SELECT * FROM tbl_requestschedule WHERE status = 'Pending'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>
<!-- Management -->
<ul class='widget-list categories-list' style = "margin-bottom: 10px; margin-right: 10px;">
     <span style="font-weight:bold">Management</span>
     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/categorizeSubjects' title="Assigns categories for course subjects">Categorize Subjects</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/InternalSchedulingPage' title="Updates internal changes from the professors" >Internal Schedule Management</a>
     </li>

     <li style = "padding-left: 40px;">
          <a href='index.php?r=administrator/MakeupClassRequest'>Make Up Classes</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/BridgeSchedulingPage'>Manage Bridge Subjects</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/SchedulingPage' title="Manages the schedules of professors and classes" >Official Schedule Management</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/PreScheduling' title="Manages schedules prior to the final schedules">Pre-Scheduling</a>
     </li>

     <li style = "padding-left: 40px;">
     <!-- <span class="need-confirm-number" style="position:absolute; top: -5px; left: 148px; height: 15px;padding: 2px;display: inline-block; background:#ff0000; color:#fff; border-radius: 5px;"><b><?= $count?></b></span> -->
     <a href='index.php?r=administrator/RequestsManagement' title="Manages requested changes in schedules">Requested Changes</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/CurriculumList' title="Manages the Subject Load of a Specific School Year">Subject Load Management</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/TeachingLoad' title="Handles the teaching load of the professors">Teaching Load Management</a>
     </li>

</ul>

<!-- FLS Maintenance -->
<ul class='widget-list categories-list' style = "margin-bottom: 10px; margin-right: 10px;">
    <span style="font-weight:bold">Maintenance</span>
     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/Categories' title="Manages the category of course subjects">Category Management</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/CourseManagement' title="Manages courses in the PUPT System">Course Management</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/RealCurriculumManagement' title="Manages curriculums for a particular school year">Curriculum Management</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/RoomManagement' title="Manages the rooms for studying in PUP Taguig">Room Management</a>
     </li>
     
     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/SetSYandSem' title="Manages the rooms for studying in PUP Taguig">Set Current School Year and Semester</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/SubjectManagement' title="Manages the subjects taken by students">Subject Management</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/SetFacultyUnits' >Teaching Assignment Units</a>
     </li>

     <!-- <li style = "padding-left: 40px;">
     <a href="index.php?r=administrator/" title="Generates Report For Semestral Subject Offerings">Subject Offerings</a>
     </li> -->

</ul>

<!-- Daily Schedules -->
<ul class='widget-list categories-list' style = "left: 1500px;top: 80px;margin-bottom: 10px; margin-right: 10px;  position: absolute;">
      <span style="font-weight:bold">Daily Schedules</span>
     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/profSched' title="Manages the schedules of the professors">Faculty Daily Schedule</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/RoomControl' title="Manages the room's availability">Room Control</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/RoomDailySched' title="Checks the schedule of a room">Room Daily Schedule</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/studSched' title="Checks the schedules of a course" >Student Daily Schedule</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/DailySched' title="Checks the schedules of a subject">Subjects Daily Schedule</a>
     </li>    
</ul>

<!-- Personal -->
<ul class='widget-list categories-list' style = "left: 1500px;top: 270px;margin-bottom: 10px; margin-right: 10px;  position: absolute;">

     <span style="font-weight:bold">Personal</span>
     <li style = "padding-left: 40px;">
          <a href='index.php?r=administrator/MakeupClassRequestPersonal'>Make Up Classes (Personal)</a>
     </li>

     <li style = "padding-left: 40px;">
          <a href='index.php?r=administrator/SubjPrefer'>Subject Preference (Personal)</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href="index.php?r=administrator/SubjectLoad">Teaching Load (Personal)</a>
     </li>

</ul>

<!-- Reports -->
<ul class='widget-list categories-list' style = "left: 1500px;top: 400px;margin-bottom: 10px; margin-right: 10px;  position: absolute;">
    <span style="font-weight:bold">Reports</span>
     <li style = "padding-left: 40px;">
     <a href='index.php?r=administrator/OfficialSchedule' >Official and Internal Schedule Report</a>
     </li>

     <li style = "padding-left: 40px;">
     <a href="index.php?r=administrator/SubjectOfferings" title="Generates Report For Semestral Subject Offerings">Subject Offerings</a>
     </li>

</ul>






























<!-- <li>
<a>Faculty Assignment</a>
<span class=widget-hint><a href='index.php?r=administrator/FacultyAssignment' target="_blank">Print</a></span>
</li> -->








