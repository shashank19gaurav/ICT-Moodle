<?php

    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    

    if(isset($_POST['add'])){
		$studentid = $_POST['studentid'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$classid = $_POST['classid'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
            //insert query
        if(!empty($studentid))
        {
            $hashed_password = sha1($password);
            if($lastname === "")
                $firstname=$firstname." ";
            $query = "INSERT INTO `student`( `id`,`first_name`, `last_name`, `password`, `email`, `contact`, `class_id`) VALUES('$studentid','$firstname', '$lastname','$hashed_password','$email', '$contact', '$classid');";
            //echo $query;
            $connections = mysqli_query($connection,$query);
            if($connections){
                $msg = "New student record added!";
            }  
            else{
                $msg = "Please enter a valid student-id.";
            }
        }  
        else{
            redirect_to("../template/admin_student.php");
        } 
    }

/*    else if (isset($_POST['edit'])){
        if(!empty($studentid)){
            $query = "UPDATE student SET student_id='$studentid', student_name='$firstname $lastname', password='$password', class_id='$classid' ";
			$query .= "WHERE student_id='{$studentid}'";
            mysqli_query($connection,$query);
			$connections=1;
            if(mysqli_affected_rows($connection)){
                $msg = "Student record edited!";
            }  
            else{
                $msg = "Please enter a valid student-id.";
            }           
		}
		else{
            redirect_to("../template/admin_student.php");
        } 
    } */

    else if(isset($_POST['delete'])){
        $studentid2 = $_POST['sid'];
        if(!empty($studentid2)){
            $query = "DELETE FROM student WHERE id = '$studentid2'";
                $connections = mysqli_query($connection,$query);
                $msg = "Student record deleted successfully!";

        }
        else{
            $msg = "Please enter a valid student-id";
        }
    }

    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>
