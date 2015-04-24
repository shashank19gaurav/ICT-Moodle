<?php

    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    
 	// $file_name = $_FILES['syllabus']['name'];
	// $file_type = $_FILES['syllabus']['type'];
	// $file_tmp_name = $_FILES['syllabus']['tmp_name'];
	// $location = '../uploads/';
	

	
    $courseid = $_POST['courseid'];
    $coursename = $_POST['coursename'];
    $teacherid = $_POST['trid'];
   // $syllabus = $file_name;
    $courseid2 = $_POST['cid'];


    if(isset($_POST['add'])){
        
            //insert query
        if(!empty($courseid)){
            $query = "INSERT INTO courses VALUES('$courseid','$coursename','','$teacherid')";
            //echo $query;
			$connections = mysqli_query($connection,$query);
			if($connections){
				$msg = "New course record added!";
				if(isset($file_name)){
					if(!empty($file_name)){
						//move_uploaded_file($file_tmp_name,$location.$file_name);
					}
				}	
				else{
					$msg = "New course record added!";
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

 /*   else if (isset($_POST['edit'])){
        if(!empty($courseid)){
            $query = "UPDATE courses SET course_id='$courseid', course_name='$coursename', syllabus='$syllabus', tr_id='$teacherid'";
			$query .= "WHERE course_id='{$courseid}'";
            mysqli_query($connection,$query);
			
			$connections=1;
            if(mysqli_affected_rows($connection)){
                $msg = "Course record edited!";
            }  
            else{
                $msg = "Please enter a valid course-id.";
            }           
		}
		else{
            redirect_to("../template/admin_course.php");
        } 
    }	*/

    else if(isset($_POST['delete'])){
        if(!empty($courseid2)){
            $query = "DELETE FROM courses WHERE id = '$courseid2'";
                $connections = mysqli_query($connection,$query);
                $msg = "Course record deleted successfully!";

        }
        else{
            $msg = "Please enter a valid course-id";
        }
    }

    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>
