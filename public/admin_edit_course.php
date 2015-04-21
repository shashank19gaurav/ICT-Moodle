<?php
    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    
  	$file_name = $_FILES['syllabus']['name'];
	$file_type = $_FILES['syllabus']['type'];
	$file_tmp_name = $_FILES['syllabus']['tmp_name'];
	$location = '../uploads/';


    $courseid = $_POST['courseid'];
    $coursename = $_POST['coursename'];
    $teacherid = $_POST['trid'];
    $syllabus = $file_name;
	
    if (isset($_POST['submit'])){
        if(!empty($courseid)){
            $query = "UPDATE courses SET id='$courseid', name='$coursename', syllabus='$syllabus', teacherid='$teacherid'";
			$query .= "WHERE id ='{$courseid}'";
            mysqli_query($connection,$query);
			
			//$connections=1;
            if(mysqli_affected_rows($connection)){
                $msg = "Course record edited!"; 	  
			
				if(isset($file_name)){
					if(!empty($file_name)){
						move_uploaded_file($file_tmp_name,$location.$file_name);
						$msg = "Course record edited!";
					}	
					else{
						$msg = "Error! File not uploaded. But the new course has been edited.";
					}
				}
			}
            else{
                $msg = "Please enter a valid course-id.";
            }           
		}
		else{
            redirect_to("../template/admin_course.php");
        } 
    }
	
	if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>