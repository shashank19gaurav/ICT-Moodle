<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                   <?php 
                        $id = $_SESSION['user_id'];
                        $query = "SELECT STUDENT_NAME FROM student WHERE STUDENT_ID='$id'";
                        $rs = mysqli_query($connection,$query);
                        $name=mysqli_fetch_row($rs);
                        echo $name[0];
                        
                    ?> 
                    <b class="caret"></b></a>
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
                    <li class="active">
                        <a href="students_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li >
                        <a href="students_courses.php"><span class="glyphicon glyphicon-chevron-right"></span> Select course</a>
                    </li>
                    <li>
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
<?php
        echo' <div id="page-wrapper">

            <div class="container-fluid">
           
            <div class="container">
                  <div class="row">
                  <br /><br />
                  <div class="col-lg-8 col-lg-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">';
                        
                        $id= $_SESSION['user_id'];
                        $qur = "SELECT * from student where STUDENT_ID = '$id'";
                        $res= mysqli_query($connection,$qur);
                        $row = mysqli_fetch_row($res);
                        
                        echo' <h3 class="panel-title">'.$row[1].'</h3>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class=" col-md-12"> 
                              <table class="table table-user-information">
                                <tbody>
                                  <tr>
                                    <td>Department:</td>';
                                    
                                    $query = "SELECT DEPARTMENT from class where CLASS_ID in (SELECT CLASS_ID from student where STUDENT_ID = '$id')";
                                    $rslt= mysqli_query($connection,$query);
                                    $dept = mysqli_fetch_row($rslt);
                        
                                    echo' <td>'.$dept[0].'</td>
                                  </tr>
                                  <tr>
                                    <td>Roll no.</td>
                                    <td>'.$row[0].'</td>
                                  </tr>
                                  <tr>
                                    <td>Semester</td>';

                                        $query = "SELECT SEMESTER from class where CLASS_ID in (SELECT CLASS_ID from student where STUDENT_ID = '$id')";
                                        $rslt= mysqli_query($connection,$query);
                                        $sem = mysqli_fetch_row($rslt);

                                    echo' <td>'.$sem[0].'</td>
                                  </tr>
                                    <tr>
                                    <td>Contact</td>
                                    <td>'.$row[4].'</td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>'.$row[5].'</td>
                                  </tr>
                                    </td>
                                       
                                  </tr>
                                 
                                </tbody>
                              </table>';
                              ?>
                              
                              </div>
                          </div>
                        </div>
                             
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="push"></div>
                <div class="blog-footer">
                  <p>project by <a href="#">Sushmita-Sharan-Ashar</a></p>
                </div>

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
