<?php
    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    
    $studentid = $_POST['studentid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $classid = $_POST['classid'];
    $password = $_POST['password'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	
	
    if (isset($_POST['submit'])){
        if(!empty($studentid)){
            if($lastname === "")
                $firstname=$firstname." ";
            $query = "UPDATE student SET student_id='$studentid', student_name='$firstname $lastname', password='$password', class_id='$classid', contact='$contact', email='$email' ";
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
    }
	
    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>
