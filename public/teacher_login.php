<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php

    $user = $_POST['username'];
    $password = $_POST['password'];

    
    if(isset($_POST['submit']) && isset($user) && isset($password))
    {
        $query = "SELECT TR_ID,PASSWORD from teacher";
        $rs = mysqli_query($connection, $query);
        $num = mysqli_num_rows($rs);
        confirm_query($rs);
        
        for ($i=0; $i<$num ; $i++)
        { 
            $row = mysqli_fetch_row($rs);
            $hashed_password = sha1($password);
            if($user == $row[0] && $hashed_password == $row[1])
            {
                $_SESSION['loggedin'] = 1;
                $_SESSION['user_id'] = $user;
                redirect_to("../template/teacher_home.php");

            }       
        }
    } 

    redirect_to("../template/homepage.php");
    
?>