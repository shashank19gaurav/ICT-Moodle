<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php


        
        $course_id = $_POST['courseid'];
        $book_name = $_POST['bookname'];
        $auth_name = $_POST['authname'];
        
        
    if(isset($_POST['add']))
    {
        //insert query
        if(!empty($course_id))
        {
            $query = "INSERT INTO `books`(`COURSE_ID`, `BOOK_NAME`, `AUTHOR`) VALUES('$course_id','$book_name','$auth_name')";
            $rs = mysqli_query($connection,$query);
            if($rs)
            {
                $msg = "New book added!";
            }  
            else
            {
                $msg = "Please enter a valid class-id.";
            }
        }  
        else
        {
            redirect_to("../template/teacher_books.php");
        } 
        
    }


    require 'teacher_header.php';
    echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
    require 'footer.php';

?>