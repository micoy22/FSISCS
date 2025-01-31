<?php



class FacultyController extends Controller

{

	public function actionIndex()

	{

		$this->render('index');

	}

	public function actionEb()

	{

		$this->render('eb');

	}

	public function actionFb()

	{

		$this->render('fb');

	}

	public function actionLogout()

	{
		session_start();
		unset(Yii::app()->session['userid']);
		$this->render('logout');
		

	}

	public function actionPi()

	{

		$this->render('pi');

	}

	public function actionProcessUpdateEB()

	{

		$this->render('processUpdateEB');

	}

	public function actionProcessUpdateFB()

	{

		$this->render('processUpdateFB');

	}

	public function actionProcessUpdatePI()

	{

		$this->render('processUpdatePI');

	}

	public function actionProcessUpdateWE()

	{

		$this->render('processUpdateWE');

	}

	public function actionUeb()

	{

		$this->render('ueb');

	}

	public function actionUfa()

	{

		$this->render('ufa');

	}

	public function actionUfb()

	{

		$this->render('ufb');

	}

	public function actionWe()

	{

		$this->render('we');

	}

	public function actionWorks()

	{

		$this->render('works');

	}

	public function actionUpi()

	{

		$this->render('Upi');

	}

	public function actionUebl()

	{

		$this->render('uebl');

	}

	public function actionAebl()

	{

		$this->render('aebl');

	}

	public function actionProcessInsertEBL()

	{

		$this->render('processInsertEBL');

	}

	public function actionCreb()

	{

		$this->render('creb');

	}

	public function actionReb()

	{

		$this->render('reb');

	}

	public function actionPrintAllCertificates()
	{
		$this->render('PrintAllCertificates');
	}

	public function actionAc()

	{

		$this->render('ac');

	}

	public function actionCi()

	{

		$this->render('ci');

	}

	public function actionProcessInsertCI()

	{

		$this->render('processInsertCI');

	}

	public function actionAwe()

	{

		$this->render('awe');

	}

	public function actionAfb()

	{

		$this->render('afb');

	}

	public function actionAccSettings()

	{

		$this->render('AccSettings');

	}

	public function actionCas()

	{

		$this->render('cas');

	}

	public function actionProcessUpdateAccSettings()

	{

		$this->render('processUpdateAccSettings');

	}

	public function actionCommunitySE()

	{

		$this->render('communitySE');

	}

	public function actionNewCSE()

	{

		$this->render('NewCSE');

	}

	public function actionProcessInsertSA()

	{

		$this->render('ProcessInsertSA');

	}

	// public function actionProcessInsertPROpuptaguig.puptaguig.org()

    public function actionProcessInsertPROORG()
    {
		// $this->render('ProcessInsertPROpuptaguig.puptaguig.org');

		$this->render('ProcessInsertPROORG');
    }



	public function actionProcessInsertSCHO()

	{

		$this->render('ProcessInsertSCHO');

	}

	public function actionProcessInsertRP()

	{

		$this->render('ProcessInsertRP');

	}

	public function actionCrwe()

	{

		$this->render('crwe');

	}

	public function actionRwe()

	{

		$this->render('rwe');

	}

	public function actionAnnouncements()

	{

		$this->render('Announcements');

	}

	public function actionEvents()

	{

		$this->render('events');

	}

	public function actionMessages()

	{

		$this->render('messages');

	}

	public function actionGetAnnouncements()

	{

		$this->render('GetAnnouncements');

	}

	public function actionProcessInsertCSE()

	{

		$this->render('processInsertCSE');

	}

	public function actionUpdateCSE()

	{

		$this->render('updateCSE');

	}



	// VOLUNTARY WORK

	public function actionVoluntaryWork()

	{

		$this->render('VoluntaryWork');

	}

	public function actionRvw()

	{

		$this->render('rvw');

	}

	public function actionProcessInsertVWork()

	{

		$this->render('ProcessInsertVWork');

	}

	public function actionProcessUpdateVWork()

	{

		$this->render('ProcessUpdateVWork');

	}

	public function actionVworks()

	{

		$this->render('vworks');

	}

	public function actionCrvw()

	{

		$this->render('crvw');

	}

	public function actionVoluntaryWorkNew()

	{

		$this->render('VoluntaryWorkNew');

	}

	public function actionVwInfo()

	{

		$this->render('vwinfo');

	}

	public function actionRtp()

	{

		$this->render('rtp');

	}

	public function actionProcessUpdateTP()

	{

		$this->render('ProcessUpdateTP');

	}



	// TRAINING PROGRAMS

	public function actionTrainingPrograms()

	{

		$this->render('TrainingPrograms');

	}

	public function actionTrainingProgramNew()

	{

		$this->render('TrainingProgramNew');

	}

	public function actionProcessInsertTP()

	{

		$this->render('ProcessInsertTP');

	}

	public function actionTprograms()

	{

		$this->render('tprograms');

	}

	public function actionTpinfo()

	{

		$this->render('tpinfo');

	}

	public function actionCrtp()

	{

		$this->render('crtp');

	}



	// OTHER INFORMATION

	public function actionOtherInformation()

	{

		$this->render('OtherInformation');

	}

		// SPECIAL SKILLS AND HOBBIES

	public function actionGskh()

	{

		$this->render('Gskh');

	}

	public function actionProcessUpdateSKH()

	{

		$this->render('ProcessUpdateSKH');

	}

	public function actionCrskh()

	{

		$this->render('Crskh');

	}

	public function actionRskh()

	{

		$this->render('Rskh');

	}

	public function actionNewSKH()

	{

		$this->render('NewSKH');

	}

		// NON-ACADEMIC DISTINCTIONS OR RECOGNITION

	public function actionGnadr()

	{

		$this->render('Gnadr');

	}

	public function actionProcessUpdateNADR()

	{

		$this->render('ProcessUpdateNADR');

	}

	public function actionCrNADR()

	{

		$this->render('Crnadr');

	}

	public function actionRnadr()

	{

		$this->render('Rnadr');

	}

	public function actionNewNADR()

	{

		$this->render('NewNADR');

	}

		// MEMBERSHIP IN ASSOCIATION OR puptaguig.puptaguig.orgANIZATION

	public function actionGmiao()

	{

		$this->render('Gmiao');

	}

	public function actionProcessUpdateMIAO()

	{

		$this->render('ProcessUpdateMIAO');

	}

	public function actionCrMIAO()

	{

		$this->render('Crmiao');

	}

	public function actionRmiao()

	{

		$this->render('Rmiao');

	}

	public function actionNewMIAO()

	{

		$this->render('NewMIAO');

	}



	// REFERENCES

	public function actionReferences()

	{

		$this->render('References');

	}

	public function actionReferenceList()

	{

		$this->render('ReferenceList');

	}

	public function actionReferencesNew()

	{

		$this->render('ReferencesNew');

	}

	public function actionProcessInsertREF()

	{

		$this->render('ProcessInsertREF');

	}

	public function actionProcessUpdateREF()

	{

		$this->render('ProcessUpdateREF');

	}

	public function actionRefinfo()

	{

		$this->render('Refinfo');

	}

	public function actionCrref()

	{

		$this->render('crref');

	}

	public function actionRref()

	{

		$this->render('rref');

	}



	// TAX CERTIFICATE

	public function actionTaxCertificate()

	{

		$this->render('TaxCertificate');

	}

	public function actionTaxCertificateUpdate()

	{

		$this->render('TaxCertificateUpdate');

	}

	public function actionTaxinfo()

	{

		$this->render('taxinfo');

	}

	public function actionCrtc()

	{

		$this->render('crtc');

	}

	public function actionRtc()

	{

		$this->render('rtc');

	}

	public function actionProcessUpdateTC()

	{

		$this->render('ProcessUpdateTC');

	}



	// PERSONAL DATA SHEET

	public function actionPDS()

	{

		$this->render('PDS');

	}

	public function actionMyPDS()

	{

		$this->render('MyPDS');

	}

	public function actionMyPDS1()

	{

		$this->render('MyPDS1');

	}

	public function actionMyPDS2()

	{

		$this->render('MyPDS2');

	}

	public function actionMyPDS3()

	{

		$this->render('MyPDS3');

	}

	public function actionMyPDS4()

	{

		$this->render('MyPDS4');

	}

	public function actionChildInfo()

	{

		$this->render('childInfo');

	}

	public function actionCrch()

	{

		$this->render('crch');

	}

	public function actionProcessUpdateCI()

	{

		$this->render('processUpdateCI');

	}

	public function actionProcessUpdateCSE()

	{

		$this->render('processUpdateCSE');

	}

	public function actionCrcse()

	{

		$this->render('crcse');

	}

	public function actionRcse()

	{

		$this->render('rcse');

	}

	public function actionNewTC()

	{

		$this->render('newTC');

	}

	public function actionProcessInsertTC()

	{

		$this->render('processInsertTC');

	}

	public function actionQuestions()

	{

		$this->render('Questions');

	}

	public function actionProcessSaveAnswers()

	{

		$this->render('processSaveAnswers');

	}

	public function actionFAQs()

	{

		$this->render('FAQs');

	}

	public function actionQuickGuide()

	{

		$this->render('QuickGuide');

	}

	public function actionUwe()

	{

		$this->render('uwe');

	}

	public function actionUpdateWE()

	{

		$this->render('UpdateWE');

	}

	public function actionProcessSaveSchedPref()

	{

		$this->render('processSaveSchedPref');

	}

	public function actionSchedulePreference()

	{

		$this->render('SchedulePreference');

	}

	public function actionSchedPrefList()

	{

		$this->render('SchedPrefList');

	}

	public function actionPrintSchedPref()

	{

		$this->render('PrintSchedPref');

	}

	public function actionEditSchedPref()

	{

		$this->render('EditSchedPref');

	}

	public function actionProcessEditSchedPref()

	{

		$this->render('processEditSchedPref');

	}

	public function actionDeleteSchedPref()

	{

		$this->render('DeleteSchedPref');

	}

	public function actionProcessDeleteSchedPref()

	{

		$this->render('processDeleteSchedPref');

	}

	public function actionServiceCredit()

	{

		$this->render('ServiceCredit');

	}

	public function actionPrintServiceCredit()

	{

		$this->render('PrintServiceCredit');

	}

	public function actionTeachingLoad()

	{
		$sySem = TblCurrentsyandsem::model()->AllData();
		$year = $sySem[0]['schoolYear'];
		$sem = $sySem[0]['sem'];

		$requests = TblRequestschedule::model()->countRequests($sem, $year);
		$FRequests = count($requests);


		$this->render('TeachingLoad',array('sy' => $year, 'sem' => $sem, 'requests' => $FRequests));

	}

	public function actionSubjectLoad()

	{
		$fcode = Yii::app()->session['fcode'];
		if (isset($_POST['sem'])) {
			$sem = $_POST['sem'];
		}
		if (isset($_POST['sy'])) {
			$sy = $_POST['sy'];
		}
		if (isset($_GET['sem'])) {
			$sem = $_GET['sem'];
		}
		if (isset($_GET['sy'])) {
			$sy = $_GET['sy'];
		}
		
		if (isset($_POST['sem']) and isset($_POST['sy'])) {
			$result = TblSchedule::model()->FacultyLoad($sem, $sy, $fcode);
			// echo "<pre>";
			// print_r($result);
			// echo "</pre>";
			$this->render('SubjectLoad', array('load' => $result));
		} else if (isset($_GET['sem']) and isset($_GET['sy'])) {
			$result = TblSchedule::model()->FacultyLoad($sem, $sy, $fcode);
			$this->render('SubjectLoad', array('load' => $result));
		} else {
			$this->render('SubjectLoad');
		}
		
		
		// $this->render('SubjectLoad', array('load' => $result));

	}

	public function actionSubjectPreference()

	{

		$this->render('SubjectPreference');

	}



	public function actionSubjPrefer()

	{

		$this->render('SubjPrefer');

	}



	public function actionSubjectMenu()

	{

		$this->render('SubjectMenu');

	}



	public function actionSubjPreferALL()

	{

		$this->render('SubjPreferALL');

	}



	public function actiontagSubjects()

	{
		$sySem = TblCurrentsyandsem::model()->AllData();
		$year = $sySem[0]['schoolYear'];
		$sem = $sySem[0]['sem'];

		// $this->render('tagSubjects');
		header("location: index.php?r=faculty/tagSubjectspage&sem=".$sem."&sy=".$year."");

	}



	public function actionTagSchedules()

	{

		$this->render('TagSchedules');

	}



	public function actionAddTimePrefer()

	{
		$this->render('AddTimePrefer');

	}



	public function actionTimePrefer()

	{

		$this->render('TimePrefer');

	}



	public function actiontagSubjectspage()
	{
		if(isset($_POST['sem'])){
			$sem = $_POST['sem'];
		}
		if(isset($_POST['sy'])){
			$sy = $_POST['sy'];
		}
		if(isset($_GET['sem'])){
			$sem = $_GET['sem'];
		}
		if(isset($_GET['sy'])){
			$sy = $_GET['sy'];
		}
		$fcode = Yii::app()->session['fcode'];
		$rows = TblSubjectload::model()->SubjCurriculum($sem, $sy);

		$subPref = TblSubjpreferences::model()->CheckProfSubPref($sem, $sy, $fcode);
		// $course = TblCourse::model()->GetCourse();
		$profMaxUnit = TblEvaluationfaculty::model()->CheckSpecProf($fcode);

		$v1 = count($rows);
		$v2 = count($subPref);
		// $temp serves as the temporary placement for the subjects that have not been chosen by the faculty
		$temp = array();

		//removing subjects that are chosen by the faculty
		for ($x = 0; $x < $v1; $x++){
			$i = 0;
			for ($y = 0; $y < $v2; $y++){
				if($rows[$x]['scode'] == $subPref[$y]['scode']){
					$i = 1;
					continue;
				}
			}

			if ($i == 1) {
				unset($rows[$x]);
			} else {
				$temp[$x] = $rows[$x];
			}
		}
		//rearranging the element values of the array
		$subject = array_values($rows);

		$subjects = array_values($subject);
		$reg = $profMaxUnit['Regular_Load'];
		$part = $profMaxUnit['PartTime_Load'];
		$ts = $profMaxUnit['TeachingSub_Load'];

		$tots = $reg + $part + $ts;

		$currentTotalUnits = 0;

		foreach ($subPref as $row) {
			$currentTotalUnits += $row['units'];
		}


		$this->render('tagSubjectspage', array('subjects' => $subject, /*'courses' => $course,*/'currentTotalUnits' => $currentTotalUnits, 'totUnits' => $tots));

	}



	public function actionTagSubjectADD()

	{
		$fcode = Yii::app()->session['fcode'];
		$sem = $_POST['sem'];
		$sy = $_POST['sy'];
		

		

		if (!(isset($_POST['subjID1']))) {
			header("Location: index.php?r=faculty/tagSubjectspage&sy=".$sy."&sem=".$sem."&mes=2");
		} else {
			$checked = $_POST['subjID1'];
			foreach($_POST['subjID2'] as $key => $value){
			if(in_array($_POST['subjID2'][$key], $checked)){
				$subjcode = $_POST['subjID2'][$key];
				$subjtitle = $_POST['subjTitle'][$key];
				$lec = $_POST['subjLec'][$key];
				$lab = $_POST['subjLab'][$key];
				$units = $_POST['subjUnit'][$key];
				$SubjPreferences = new TblSubjpreferences();
				
				$SubjPreferences->attributes = [
				  'schedID' => '',
				  'scode' => $subjcode,
				  'stitle' => $subjtitle,
				  'units' => $units,
				  'lec' => $lec,
				  'lab' => $lab,
				  'sprof' => $fcode,
				  'sem' => $sem,
				  'schoolYear' => $sy
				];
				$SubjPreferences->save();
				header("Location: index.php?r=faculty/tagSubjectspage&sy=".$sy."&sem=".$sem."&mes=1");
				
			}
			
			}
		}

		// $this->render('TagSubjectADD');

	}



	public function actionDeleteTagged()

	{

		$this->render('DeleteTagged');

	}



	public function actionTimePreferProcessADD()

	{

		$this->render('TimePreferProcessADD');

	}



	public function actionDeletetimePrefer()

	{
		$timeID = $_GET['timeID'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];

		// Delete Active Query in Yii 1.1
		$deleteTimePrefer = TblTimepreferences::model()->findByPk($timeID);
		$deleteTimePrefer->delete();
		header("Location: index.php?r=faculty/TimePrefer&sem=".$sem."&sy=".$sy."&mes=1");

		// $this->render('DeletetimePrefer');

	}



	public function actionUpdateTimePrefer()

	{

		$this->render('UpdateTimePrefer');

	}



	public function actionTimePreferProcessUPDATE()

	{
		$this->render('TimePreferProcessUPDATE');

	}


	public function actionfacultyrequest()
	{
		$this->render('facultyrequest');
	}
		public function actionviewfacultyrequest()
	{
		$this->render('viewfacultyrequest');
	}
	public function actionprocessrequestsched()
	{
		// echo "<pre>";
		// print_r($_GET);
		// echo "</pre>";
		$this->render('processrequestsched');
	}

	public function actionprocessrequestscheddelete()
	{
		$this->render('processrequestscheddelete');
	}

	public function actionfacultyview()
	{
		$this->render('facultyview');
	}

    public function actionviewfacultyrequestedit()
    {
        $this->render('viewfacultyrequestedit');
    }


    public function actionprocessrequestschededit()
    {
        $this->render('processrequestschededit');
    }

    public function actionMakeupClassRequest()
    {
        $this->render('MakeupClassRequest');
    }

    public function actionAddMakeupClass()
    {
        $this->render('AddMakeupClass');
    }

    public function actionProcessAddMakeupClass()
    {
        $this->render('ProcessAddMakeupClass');
    }


    public function actionUpdateMakeupClass()
    {
        $this->render('UpdateMakeupClass');
    }

    public function actionProcessUpdateMakeupClass()
    {
        $this->render('ProcessUpdateMakeupClass');
    }

    public function actionProcessDeleteMakeupClass()
    {
        $this->render('ProcessDeleteMakeupClass');
    }


    public function actionPrintFacultyAssign(){
    	$fcode = Yii::app()->session['fcode'];
    	$sem = $_GET['sem'];
    	$sy = $_GET['sy'];
    	$TeachingLoad = TblSchedule::model()->TakeSubjectLoad($fcode, $sem, $sy);
    	$courses = TblCourse::model()->GetCourse();
    	$profInfo = TblEvaluationfaculty::model()->CheckSpecProf($fcode);

    	// echo "<pre>";
    	// print_r($profInfo);
    	// echo "</pre>";
    	$this->render('PrintFacultyAssign',array('TeachingLoad'=>$TeachingLoad, 'profInfo'=>$profInfo, 'courses'=>$courses, 'sem' => $sem, 'sy' => $sy));
    }

///////////////////////////////////////////////

public function actionmodal()
	{
		$this->render('modal');
	}
	public function actionIPCRtagcomplete()
	{
		$this->render('IPCRtagcomplete');
	}
	public function actionprocessDeleteproof()
	{
		$this->render('processDeleteproof');
	}
	public function actionprocessProofupload()
	{
		$this->render('processProofupload');
	}
	public function actionIPCRaddproof()
	{
		$this->render('IPCRaddproof');
	}
	public function actionIPCRgenerate()
	{
		$this->render('IPCRgenerate');
	}
	public function actionprocessIPCRaddaccomp()
	{
		$this->render('processIPCRaddaccomp');
	}
	public function actionIPCRaddaccomp()
	{
		$this->render('IPCRaddaccomp');
	}
	public function actionprocessEditIPCRfaculty()
	{
		$this->render('processEditIPCRfaculty');
	}
	public function actionIPCRform1faculty()
	{
		$this->render('IPCRform1faculty');
	}
	public function actionEditIPCRrowfaculty()
	{
		$this->render('EditIPCRrowfaculty');
	}
	public function actionIPCRcreatejantojunefaculty()
	{
		$this->render('IPCRcreatejantojunefaculty');
	}
	public function actionIPCRcreatejultodecfaculty()
	{
		$this->render('IPCRcreatejultodecfaculty');
	}
	public function actionIPCRcreatefaculty()
	{
		$this->render('IPCRcreatefaculty');
	}
	public function actionIPCRmenufaculty()
	{
		$this->render('IPCRmenufaculty');
	}
	public function actionIPCRfaculty()
	{
		$this->render('IPCRfaculty');
	}

    
	public function action()

	{

		$this->render('');

	}

	// Uncomment the following methods and override them if needed

	/*

	public function filters()

	{

		// return the filter configuration for this controller, e.g.:

		return array(

			'inlineFilterName',

			array(

				'class'=>'path.to.FilterClass',

				'propertyName'=>'propertyValue',

			),

		);

	}



	public function actions()

	{

		// return external action classes, e.g.:

		return array(

			'action1'=>'path.to.ActionClass',

			'action2'=>array(

				'class'=>'path.to.AnotherActionClass',

				'propertyName'=>'propertyValue',

			),

		);

	}

	*/

}
