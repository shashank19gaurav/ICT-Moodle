<?php
    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    
 
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$conf_newpass = $_POST['conf_newpass'];
	$user = $_SESSION['user_id'];
  
    if(isset($_POST['submit']))
    {
            //insert query
        if(!empty($oldpass))
        {
            $hashed_oldpass=sha1($oldpass);
			$query = "SELECT * FROM admin WHERE username = '$user' and password = '$hashed_oldpass'";
			$connections = mysqli_query($connection,$query);
			$nm = mysqli_num_rows($connections);
            if($nm==1 and $newpass==$conf_newpass){
                $hashed_newpass = sha1($newpass);
				$query2 = "UPDATE admin SET password='$hashed_newpass' WHERE username='$user'";
				$connections2 = mysqli_query($connection,$query2);
                $msg = "Password changed successfully!";
            }  
            else{
                $msg = "Please enter the correct old password or re-check the new password";
            }			
        }  
        else{
            redirect_to("../template/admin_account.php");
        } 
		$connections=1;
    }
	
	    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>