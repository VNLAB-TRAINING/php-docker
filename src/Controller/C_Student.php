<?php

include_once("../Model/M_Student.php");

//1. Declaration

class  Ctrl_Student
{
	public function invoke(){
		if(isset($_GET['stid']))
		{
			$modelStudent =  new Model_Student();
			$student = $modelStudent->getStudentDetail($_GET['stid']);
			
			include_once("../View/StudentDetail.html");
		}
		elseif(isset($_REQUEST['xoa'])){
			$modelStudent =  new Model_Student();
			$studentList = $modelStudent->getAllStudent();
			include_once("../View/xoa.html");
		}
		elseif(isset($_REQUEST['xoastid'])){
			$modelStudent =  new Model_Student();
			$modelStudent->xoa($_REQUEST['xoastid']);
			$studentList = $modelStudent->getAllStudent();			
			include_once("../View/xoa.html");
		}
		elseif(isset($_REQUEST['them'])){
			include_once("../View/them.html");				
		}
		elseif(isset($_REQUEST['submit5'])){
			$modelStudent =  new Model_Student();
			$modelStudent->them($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['age'], $_REQUEST['university']);
			$studentList = $modelStudent->getAllStudent();
			include_once("../View/StudentList.html");	
		}
		elseif(isset($_REQUEST['sua'])){
			$modelStudent =  new Model_Student();
			$studentList = $modelStudent->getAllStudent();
			include_once("../View/sua.html");
		}
		elseif(isset($_REQUEST['suastid'])){
			$modelStudent =  new Model_Student();
			$student = $modelStudent->getStudentDetail($_REQUEST['suastid']);
			// $studentList = $modelStudent->getAllStudent();			
			include_once("../View/form_sua.html");
		}
		elseif(isset($_REQUEST['submit3'])){
			$modelStudent =  new Model_Student();
			$modelStudent->sua($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['age'], $_REQUEST['university']);
			$studentList = $modelStudent->getAllStudent();
			include_once("../View/sua.html");
		}
		elseif(isset($_REQUEST['timkiem'])){
			include_once("../View/timkiem.html");
		}
		elseif(isset($_REQUEST['submit'])){
			$modelStudent =  new Model_Student();
			$studentList = $modelStudent->timkiem($_REQUEST['search'], $_REQUEST['select']);
			include_once("../View/StudentList.html");
		}
		else
		{
			$modelStudent =  new Model_Student();
			$studentList = $modelStudent->getAllStudent();
			
			include_once("../View/StudentList.html");
		}
	}
};


//////////////////////////////////////
//2. Process

$C_Student = new Ctrl_Student();
$C_Student->invoke();