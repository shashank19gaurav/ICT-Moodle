<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>


<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['submit']) && isset($username) && isset($password)){
        $password = sha1($password);
        $query = "SELECT * from admin WHERE username = '$username' AND password = '$password';";
        $rs = mysqli_query($connection, $query);
        confirm_query($rs);
        $row = mysqli_fetch_assoc($rs);
        
        if(sizeof($row)==3){
            $_SESSION['loggedin'] = 1;
            $_SESSION['user_id'] = $username;
            redirect_to("../template/admin_home.php");
        }
    } 

        redirect_to("../index.php");
    
?>