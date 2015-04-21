<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php");?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/logged_in.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JMI-Moodle</title>

    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!--select2.js-->
    <link href="js/select2/select2.css" rel="stylesheet"/>
    <script src="js/select2/select2.js"></script>
    <script>
        $(document).ready(function() {
        $("#e1").select2({width:'resolve'});
        $("#e2").select2({width:'resolve'});
        $("#e3").select2({width:'resolve'});
        });
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
</head>

<body>

    <div id="wrapper">

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="students_dashboard.php">JMI-Moodle</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li class="dropdown">
                    <a  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
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
                    <li >
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
                            <li class="active">
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
                    <div class="col-lg-12">
                    <div class="page-header">
                        <h1 style="font-family:centaur; font-weight:bold">View Syllabus by Course</h1> <!--make recent posts to active course-->
                    </div>

                    <form method="post" action="students_syllabus.php"> 
                    <div class="col-lg-4">
                    <div class="input-group">
                      <select type="text" class="form-control" placeholder="Username" name="courseid">
                          <?php 

                          $tr = $_SESSION['user_id'];
                          $query = "SELECT COURSE_ID FROM `enrolled in` WHERE STUDENT_ID='$tr'";
                          $rs = mysqli_query($connection,$query);
                          $nm = mysqli_num_rows($rs);

                          if(isset($_POST['courseid']))
                            $cid = $_POST['courseid'];
                          else
                            $cid = 0;

                          for( $i=0; $i<$nm; $i++)
                          {

                              $row = mysqli_fetch_row($rs);
                              /*$que = "SELECT COURSE_NAME FROM `courses` WHERE COURSE_ID='$row[0]'";
                              $rslt = mysqli_query($connection,$que);
                              $row2 = mysqli_fetch_row($rslt);*/
                              if($row[0] === $cid)
                                echo' <option selected>'.$row[0].'</option>';
                              else
                                echo' <option>'.$row[0].'</option>';
                              
                          }

                          ?>
                      </select>
                      <span class="input-group-btn">
                        <button class="btn btn-success" type="submit">Select Course</button>
                      </span>
                    </div>
                    </div>
                    </form>
                    <?php


                          if(isset($_POST['courseid']))
                          {
                             $cid = $_POST['courseid'];
                             $qu = "SELECT SYLLABUS from courses where COURSE_ID ='$cid'";
                             $run = mysqli_query($connection,$qu);
                             $path = mysqli_fetch_row($run);

                             if($path[0] === "")
                             {
                                //echo' <br><br>';
                                //echo' <h3>image not available</h3>';
                                echo '<img src="../uploads/contentUnavailable.png" style="margin-top:50px; margin-left:20px">';
                             }
                             else
                             {
                                $path[0] = "../uploads/".$path[0];
                                echo '<img src="'.$path[0].'" style="margin-top:50px; margin-left:20px">'; 
                             }
                          }

                          else
                            {

                                 $id = $_SESSION['user_id'];
                                 $query = "SELECT SYLLABUS from courses where COURSE_ID in (select COURSE_ID from `enrolled in` where STUDENT_ID = '$id') limit 1";
                                 $rslt = mysqli_query($connection,$query);
                                 $path = mysqli_fetch_row($rslt);

                                 if($path[0] === "")
                                 {
                                    //echo' <br><br>';
                                    echo '<img src="../uploads/contentUnavailable.png" style="margin-top:50px; margin-left:20px">';
                                    //echo' <h3>image not available</h3>';
                                 }
                                 else
                                 {
                                    $path[0] = "../uploads/".$path[0];
                                    echo '<img src="'.$path[0].'" style="margin-top:50px; margin-left:20px">'; 
                                 }
                                 
                            }

                    ?>

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
