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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php 
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
                    <li >
                        <a href="students_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="students_courses.php"><span class="glyphicon glyphicon-comment"></span> Select course</a>
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

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="page-header">
                        <h1 style="font-family:centaur; font-weight:bold">Select Courses</h1> <!--make recent posts to active course-->
                    </div>
                    </div> 
                    <div class="col-lg-6 col-lg-offset-2">
                        <table class="table table-bordered">
                          <thead>
                            <tr class="success">
                              <th>Course ID</th>
                              <th>Course Name</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <!--yaha ayega code-->
                          
                          <form action="../public/students_courses.php" method="post" role="form">
                          <?php
                            $student= $_SESSION['user_id'];
                            
                            $query="SELECT `COURSE_ID`,`COURSE_NAME` FROM `courses` ";
                            $rs = mysqli_query($connection,$query);
                            $n = mysqli_num_rows($rs); 

                            for($i=0; $i<$n; $i++)
                            {
                              $flag=0;  
                              $row = mysqli_fetch_row($rs);
                              $qur = "SELECT `COURSE_ID` from `enrolled in` WHERE STUDENT_ID='$student'";
                              $res= mysqli_query($connection,$qur);
                              $count = mysqli_num_rows($res);

                              //echo '@'.$row[0];
                                

                              for($y=0; $y<$count; $y++)
                              {

                                 $rara = mysqli_fetch_row($res);
                                 //echo $rara[0];
                                if($rara[0]==$row[0])
                                  $flag=1;
                              }
                                $cid[$i] = $row[0];
                              if($flag==1)
                              {
                                  echo 
                                  '<tr>
                                    <td>'.$row[0].'</td>
                                    <td>'.$row[1].'</td>
                                  <input type="hidden" name="count" value="'.$n.'">  
                                  <input type="hidden" name="del'.$i.'" value="'.$cid[$i].'">
                                  <td><button class="btn btn-sm btn-success " style="align: center; " type="submit" name="remove'.$i.'">enrolled</button></td>
                                  </tr>';
                              }
                              else
                              {
                                  echo 
                                   '<tr>
                                    <td>'.$row[0].'</td>
                                    <td>'.$row[1].'</td>
                                  <input type="hidden" name="count" value="'.$n.'">  
                                  <input type="hidden" name="ins'.$i.'" value="'.$cid[$i].'">
                                  <td><button class="btn btn-sm btn-warning " style="align: center; " type="submit" name="select'.$i.'">not enrolled</button></td>
                                  </tr>';
                              }
                          }
                            ?>
                          </form>
                          </tbody>
                        </table>

                    
                    </div>
                    <div class="col-lg-12">
                    <div class="push"></div>
                    <div class="blog-footer">
                      <p>project by <a href="#">Sushmita-Sharan-Ashar</a></p>
                    </div>
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
