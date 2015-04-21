<?php

    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");





    
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "12345");
  define("DB_NAME", "jmi_moodle");


      //$r = mysqli_connect($host, $user, $password,$db);

  $r = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die("Database connection failed: " . mysql_error());


    $i = 0;
    $n = $_POST['count'];
    $id= $_SESSION['user_id'];
                            

    while($i < $n)
    {
        if(isset($_POST['remove'.$i]))
        {
            $cid = $_POST['del'.$i];
            $qur = "DELETE from `enrolled in` where STUDENT_ID = '$id' and COURSE_ID = '$cid'";
            $res= mysqli_query($connection,$qur);
            //if($res)
              //  echo"QUERY!!";
        }
        else if(isset($_POST['select'.$i]))
        {
            $cid = $_POST['ins'.$i];
            $qur = "INSERT into `enrolled in` VALUES ('$id','$cid')";
            $res= mysqli_query($connection,$qur);
        }
        $i++;
    }

    redirect_to("../template/students_courses.php");


?>
