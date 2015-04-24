<?php

    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");

    $i = 0;
    $n = $_POST['count'];
    $id= $_SESSION['user_id'];
                            

    while($i < $n)
    {
        if(isset($_POST['remove'.$i]))
        {
            $cid = $_POST['del'.$i];
            $qur = "DELETE from `enrolled_in` where student_id = '$id' and course_id = '$cid'";
            $res= mysqli_query($connection,$qur);
            //if($res)
              //  echo"QUERY!!";
        }
        else if(isset($_POST['select'.$i]))
        {
            $cid = $_POST['ins'.$i];
            $qur = "INSERT INTO `enrolled_in`(`course_id`, `student_id`) VALUES ('$cid', '$id')";
            $res= mysqli_query($connection,$qur);
        }
        $i++;
    }

    redirect_to("../template/students_courses.php");


?>
