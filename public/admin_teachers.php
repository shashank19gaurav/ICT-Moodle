<?php

    include_once("../includes/functions.php");
    include_once("../includes/connection.php");
    include_once("../includes/constants.php");

    $teacherid = $_POST['teacherid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $teacherid2 = $_POST['trid'];
	$email = $_POST['email'];


    if(isset($_POST['add'])){
            //insert query
        if(!empty($teacherid)){
            $query = "INSERT INTO teacher VALUES('$teacherid','$firstname $lastname','$password','$email')";
            $connections = mysqli_query($connection,$query);
            if($connections){
                $msg = "New teacher record added!";
            }  
            else{
                $msg = "Please enter a valid teacher-id.";
            }
        }  
        else{
            redirect_to("../template/admin_teacher.php");
        } 
    }

    else if (isset($_POST['edit'])){
        if(!empty($teacherid)){
            $query = "UPDATE teacher SET tr_id='$teacherid', tr_name='$firstname $lastname', password='$password'  ";
			$query .= "WHERE tr_id='{$teacherid}'";
            mysqli_query($connection,$query);
			$connections=1;
            if(mysqli_affected_rows($connection)){
                $msg = "Teacher record edited!";
            }  
            else{
                $msg = "Please enter a valid teacher-id.";
            }           
		}
		else{
            redirect_to("../template/admin_teacher.php");
        } 
    }

    else if(isset($_POST['delete'])){
        if(!empty($teacherid2)){
            $query = "DELETE FROM teacher WHERE TR_ID = '$teacherid2'";
                $connections = mysqli_query($connection,$query);
                $msg = "Teacher record deleted successfully!";

        }
        else{
            $msg = "Please enter a valid teacher-id";
        }
    }

    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>
