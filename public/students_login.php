<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php

    $user = $_POST['username'];
    $password = $_POST['password'];

    
    if(isset($_POST['submit']) && isset($user) && isset($password))
    {
        $hashed_password = sha1($password);
        $query = "SELECT id, password from student WHERE id='$user' AND password='$hashed_password';";
        echo $query;
        $rs = mysqli_query($connection, $query);
        $num = mysqli_num_rows($rs);
        confirm_query($rs);
        
        if($num==1){ 
            $row = mysqli_fetch_row($rs);
            $hashed_password = sha1($password);
            echo $password;
            if($user === $row[0] && $hashed_password === $row[1])
            {
                $_SESSION['loggedin'] = 1;
                $_SESSION['user_id'] = $user;
                redirect_to("../template/students_dashboard.php");

            }       
        }
    } 

   redirect_to("../template/homepage.php");
    
?>