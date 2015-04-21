<?php

    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../includes/connection.php");
    
    $connections = 0;
    $postid = $_POST['postid'];
	$commentid = $_POST['commentid'];
	
	 if(isset($_POST['delete_post'])){
        if(!empty($postid)){
            $query = "DELETE FROM posts WHERE POST_ID = '$postid'";
                $connections = mysqli_query($connection,$query);
                $msg = "Post deleted successfully!";

        }
        else{
            $msg = "Please enter a valid post-id";
        }
    }
	
	 if(isset($_POST['delete_comment'])){
        if(!empty($commentid)){
            $query = "DELETE FROM comments WHERE COMMENT_ID = '$commentid'";
                $connections = mysqli_query($connection,$query);
                $msg = "Comment deleted successfully!";

        }
        else{
            $msg = "Please enter a valid comment-id";
        }
    }

    if(1){
        require 'admin_header.php';
        echo '<div class="container"><br /><br/><h1>'."$msg".'</h1></div>';
        require 'footer.php';

    }


    ?>