<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php

    
    $content = $_POST['content'];
    $course_name = $_POST['coursename'];
    

    if(isset($content) && isset($course_name) )
    {
        $query = "SELECT COURSE_ID from courses where COURSE_NAME = '$course_name'";
        $cn = mysqli_query($connection,$query);
        $cid = mysqli_fetch_row($cn);

        $query = "INSERT INTO posts(CONTENT,COURSE_ID) VALUES ('$content','$cid[0]')";
        $rs = mysqli_query($connection,$query);

        if($rs)
        {
            redirect_to("../template/teacher_post.php");
        }
        else
        {
            $msg = "Query Failed";
        }
        
    }
    else
    {
            $msg = "Please fill all the fields";
    }

   //redirect_to("../template/teacher_post.php");

    require 'teacher_header.php';
    echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
    require 'footer.php';


    
    
?>