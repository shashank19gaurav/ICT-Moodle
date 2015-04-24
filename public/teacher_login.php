<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php

    $user = $_POST['username'];
    $password = $_POST['password'];

    
    if(isset($_POST['submit']) && isset($user) && isset($password))
    {
        
        $password = sha1($password);
        $query = "SELECT id,password from teacher WHERE id = '$user' AND password = '$password'";
        $rs = mysqli_query($connection, $query);
        $num = mysqli_num_rows($rs);
        confirm_query($rs);
        if($num==1){
            $_SESSION['loggedin'] = 1;
            $_SESSION['user_id'] = $user;
            redirect_to("../template/teacher_home.php");
        }
    } 

    redirect_to("../template/homepage.php");
    
?>