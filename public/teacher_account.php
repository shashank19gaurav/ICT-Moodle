<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php


        
        $old_pass = $_POST['oldpass'];
        $new_pass = $_POST['newpass'];
        $cnfrm_pass = $_POST['confrmpass'];
        $tr = $_SESSION['user_id'];
        
            
    if(isset($_POST['change']) && isset($old_pass) && isset($new_pass) && isset($cnfrm_pass) && ($new_pass == $cnfrm_pass))
    {

        $query = "SELECT PASSWORD from `teacher` WHERE TR_ID = '$tr'";
        $rs = mysqli_query($connection,$query);
        $row = mysqli_fetch_row($rs);
        $hashed_old_pass = sha1($old_pass);

        if($hashed_old_pass == $row[0]) 
        {
            $hashed_new_pass = sha1($new_pass);
            $query = "UPDATE `teacher` SET PASSWORD = '$hashed_new_pass' WHERE TR_ID = '$tr'";
            $rs = mysqli_query($connection,$query);
            if($rs)
            {
                $msg = "Password Successfully changed!";
                require 'teacher_header.php';
                echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
                require 'footer.php';
            }  
           
        }  
        else
        {
            $msg = "Incorrect OLD PASSWORD!!";
            require 'teacher_header.php';
            echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
            require 'footer.php';

        } 
        
    }
    else
    {
        $msg = "New password and its conformation don't match";
        require 'teacher_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';
    }

    
?>