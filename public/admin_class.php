<?php

    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    

    if(isset($_POST['add'])){
	    $file_name1 = $_FILES['attendance']['name'];
	$file_type1 = $_FILES['attendance']['type'];
	$file_tmp_name1 = $_FILES['attendance']['tmp_name'];
    $file_name2 = $_FILES['results']['name'];
	$file_type2 = $_FILES['results']['type'];
	$file_tmp_name2 = $_FILES['results']['tmp_name'];
	$location = '../uploads/';
	
	    $class_id = $_POST['classid'];
    $dept = $_POST['department'];
    $attend = $file_name1;
    $semester = $_POST['sem'];
    $connectiones = $file_name2;
            //insert query
        if(!empty($class_id)){
            $query = "INSERT INTO class VALUES('$class_id','$dept','$attend','$semester','$connectiones')";
            $connections = mysqli_query($connection,$query);
            if($connections){
                $msg = "New class record added!";
				if(isset($file_name1)){
					if(!empty($file_name1)){
						move_uploaded_file($file_tmp_name1,$location.$file_name1);
					}
				}	
				else{
					$msg = "Error! Attendance file not uploaded. But the new course has been added.";
				} 
				
				if(isset($file_name2)){
					if(!empty($file_name2)){
						move_uploaded_file($file_tmp_name2,$location.$file_name2);
					}
				}	
				else{
					$msg = "Error! Results file not uploaded. But the new course has been added.";
				} 				
            }  
            else{
                $msg = "Please enter a valid class-id.";
            }
        }  
        else{
            redirect_to("../template/admin_class.php");
        } 
    }


    else if(isset($_POST['delete'])){
	    $class_id_2 = $_POST['cid'];
        if(!empty($class_id_2)){
            $query = "DELETE FROM class WHERE CLASS_ID = '$class_id_2'";
                $connections = mysqli_query($connection,$query);
                $msg = "Class record deleted successfully!";

        }
        else{
            $msg = "Please enter a valid class-id";
        }
    }

    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>
