<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php


        
        $event_date = $_POST['eventdate'];
        $event_time = $_POST['eventtime'];
        $details = $_POST['details'];
        $id = $_SESSION['user_id'];
        
            
    if(isset($_POST['event']) && isset($event_date) && isset($event_time) && isset($details))
    {

        $query = "INSERT INTO `events`(`EVENT_DATE`, `EVENT_TIME`,`EVENT`) VALUES ('$event_date','$event_time','$details')";
        $rs = mysqli_query($connection,$query);
        
         $msg = "New event added successfully";
        require 'teacher_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';
      
    }
    else
    {
        $msg = "Please fill all the fields";
        require 'teacher_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';
    }

    
?>