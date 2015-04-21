<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/logged_in.php"); ?>

<?php 

    if(isset($_POST['go'])){
      
         $comment = $_POST['comment'];
         $user_id = $_SESSION['user_id'];
         $post_id = $_POST['postid'];
         $query = "SELECT STUDENT_NAME FROM student where STUDENT_ID='$user_id'";
         $r = mysqli_query($connection,$query);
         $row = mysqli_fetch_row($r);
         $user = $row[0];
         if($_POST['reload']!="0")
          $_POST['coursename']= $_POST['reload'] ;
         //get back here after posts are handled.
         $qry = "INSERT into comments (CONTENT, USER, USER_ID, POST_ID) VALUES ('$comment','$user','$user_id','$post_id')";
         $rs = mysqli_query($connection,$qry);
         if(!$rs){
          echo "error"; 

         }

      }

  ?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JMI-Moodle</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
</head>

<body>

    <div id="wrapper">

       
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="students_dashboard.php">JMI-Moodle</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
                        $id = $_SESSION['user_id'];
                        $query = "SELECT STUDENT_NAME FROM student WHERE STUDENT_ID='$id'";
                        $rs = mysqli_query($connection,$query);
                        $name=mysqli_fetch_row($rs);
                        echo $name[0];
                        
                    ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="students_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="students_account.php"><i class="fa fa-fw fa-gear"></i>Account</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../public/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="students_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li >
                        <a href="students_courses.php"><span class="glyphicon glyphicon-chevron-right"></span> Select course</a>
                    </li>
                    <li class="active">
                        <a href="students_blog.php"><span class="glyphicon glyphicon-comment"></span> Blog</a>
                    </li>
                    
                    <li>
                        <a href="students_view.php"><span class="glyphicon glyphicon-user"></span> Students/Teachers</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-chevron-down"></span> Resources <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="students_syllabus.php">Syllabus</a>
                            </li>
                            <li>
                                <a href="students_attendance.php">Attendance</a>
                            </li>                                                   
                            <li>
                                <a href="students_result.php">Results</a>
                            </li>
                            <li>
                                <a href="students_holiday.php">Holiday Calendar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="students_books.php"><span class="glyphicon glyphicon-book"></span> Books/Reference</a>
                    </li>
                </ul>
            </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="page-header">
                            <h1 style="font-family:centaur; font-weight:bold">BLOG <small>recent posts</small></h1> <!--make recent posts to active course-->
                        </div> 
                        <!--single blog style-->
                        <?php 
                            if(isset($_POST['coursename']))
                            {
                              $cname = $_POST['coursename'];
                              $qu = "SELECT COURSE_ID from courses WHERE COURSE_NAME='$cname'";
                              $run = mysqli_query($connection,$qu);
                              $cid = mysqli_fetch_row($run);
                              
                              $query = "SELECT POST_ID,CONTENT,TIME_STAMP FROM posts WHERE COURSE_ID='$cid[0]' ORDER BY TIME_STAMP DESC";
                              $rs = mysqli_query($connection,$query);
                              
                              $n = mysqli_num_rows($rs);
                              for($i=0; $i<$n; $i++)
                              {
                                
                                $row = mysqli_fetch_row($rs);
                                echo '<div class="well" style="margin-top:20px; background-color:#E5F1C8">';
                                echo '<div class="blog-post">';
                                echo '<p style="font-family:Eras Medium ITC; font-weight:550; font-size:20px">'.$row[1].'</p>';
                                echo '<p class="blog-post-meta" style="font-size:10px"><span class="glyphicon glyphicon-time"></span> Posted on '.$row[2].'</p>';
                                

                                $qry = "SELECT CONTENT,USER,TIME_STAMP FROM `comments` WHERE POST_ID=$row[0] ORDER BY TIME_STAMP DESC";
                                $p = mysqli_query($connection,$qry);
                                    
                                $count = mysqli_num_rows($p);
                                    
                                    if($count <> 0)
                                    {
                                        echo '<hr style="border-color:#000000">';
                                        echo '<h5>Comments:</h5>';
                                    }
                                    
                                    for($j=0; $j<$count; $j++)
                                    {
                                        $all = mysqli_fetch_row($p);  
                                        echo '<ul>';
                                        echo '<li>';
                                        echo '<p class="blog-post-meta">'.$all[1].' on '.$all[2].'</p>';
                                        echo '<p style="font-weight:bold">'.$all[0]. '</p>';
                                        echo  '</li>';
                                        echo '</ul>';
                                    }
                                     
                                     echo '
                                          <form action="students_blog.php" method="post" role="form">
                                            <div  class="input-group ">
                                              <input type="hidden" name="reload" value="'.$cname.'">
                                              <input type="hidden" name="postid" value="'.$row[0].'">
                                              <input type="text" name="comment" class="form-control">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" name="go" type="submit">comment</button>
                                              </span>
                                              </form>
                                            </div><!-- /input-group -->';
                                     echo '</div>';
                                     echo '</div>';
                                }
                                
                                
                            } 
                            else
                            {
                              $rslt = 0;
                              //$cname = $_POST['coursename'];
                              $id = $_SESSION['user_id'];
                              $query = "SELECT POST_ID,CONTENT,TIME_STAMP from `posts` where COURSE_ID IN ( select COURSE_ID from `enrolled in` where STUDENT_ID = '$id' ) order  by TIME_STAMP DESC LIMIT 10";
                              $rslt = mysqli_query($connection,$query);
                              $n = mysqli_num_rows($rslt);
                              for($i=0; $i<$n; $i++)
                              {

                                
                                $row = mysqli_fetch_row($rslt);
                                echo '<div class="well" style="margin-top:20px; background-color:#E5F1C8">';
                                echo '<div class="blog-post">';
                                echo '<p style="font-family:Eras Medium ITC; font-weight:550; font-size:20px">'.$row[1].'</p>';
                                echo '<p class="blog-post-meta" style="font-size:10px"><span class="glyphicon glyphicon-time"></span> Posted on '.$row[2].'</p>';
                                

                                $qry = "SELECT CONTENT,USER,TIME_STAMP FROM `comments` WHERE POST_ID=$row[0] ORDER BY TIME_STAMP DESC";
                                $p = mysqli_query($connection,$qry);
                                    
                                $count = mysqli_num_rows($p);
                                    
                                    if($count <> 0)
                                    {
                                        echo '<hr style="border-color:#000000">';
                                        echo '<h5>Comments:</h5>';
                                    }
                                    
                                    for($j=0; $j<$count; $j++)
                                    {
                                        $all = mysqli_fetch_row($p);  
                                        echo '<ul>';
                                        echo '<li>';
                                        echo '<p class="blog-post-meta">'.$all[1].' on '.$all[2].'</p>';
                                        echo '<p style="font-weight:bold">'.$all[0]. '</p>';
                                        echo  '</li>';
                                        echo '</ul>';
                                    }
                                     
                                     echo '<form action="students_blog.php" method="post" role="form">
                                            
                                            <div class="input-group">
                                              <input type="hidden" name="reload" value="0">
                                              <input type="hidden" name="postid" value="'.$row[0].'">
                                              <input type="text" name="comment" class="form-control">
                                              <span class="input-group-btn">
                                                <button class="btn btn-primary" name="go" type="submit">comment</button>
                                              </span>
                                            </div><!-- /input-group -->
                                          
                                        </form>';
                                      
                                     echo '</div>';
                                     echo '</div>';
                                }
                                
                            }  
                            echo '</div>';
                          ?>
         
        
                         
                    <div class="col-lg-4 ">
                    <br /><br /><br /><br /><br /><br />  
                    <div class="well" style="background-color:#c0d6e4">
                    <h4>Blog Search</h4>
                    <form method="post" action="students_blog.php">
                    <div class="input-group">
                    <?php
                    /*if(isset($_POST['coursename']))
                      {
                            $cname = $_POST['coursename'];
                            echo' <select type="text" class="form-control" placeholder="Username" name="coursename" value="'.$cname.'">';
                      }
                      else*/
                          echo' <select type="text" class="form-control" placeholder="Username" name="coursename">';

                            if(isset($_POST['coursename']))
                                $cname = $_POST['coursename'];
                            else
                                $cname = 0;

                            $id = $_SESSION['user_id']; 
                            $query = "SELECT `COURSE_NAME` FROM `courses` WHERE `COURSE_ID` IN (select `COURSE_ID` from `enrolled in` where `STUDENT_ID` = '$id' )";
                            $rs = mysqli_query($connection,$query);
                            $nm = mysqli_num_rows($rs);
                            
                            for( $i=0; $i<$nm; $i++)
                            {
                              $row = mysqli_fetch_row($rs);
                              if($row[0] === $cname)
                                echo' <option selected>'.$row[0].'</option>';
                              else
                                echo' <option>'.$row[0].'</option>';
                            }
                      ?>
                      </select>
                      <span class="input-group-btn">
                        <button class="btn btn-success" type="submit">Filter</button>
                      </span>
                      </div>
                    </div>
                    </form>
                    <!-- /.input-group -->
                    </div>
                    </div>  
                    
                    
                    
                      <div class="col-lg-12">   
                               
                        <hr>
                        <p align="center">Project by <a href="">Sushmita-Sharan-Ashar</a></p>
    
                    </div> 

                </div>       
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
