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

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <small>Welcome <?php 
                        $id = $_SESSION['user_id'];
                        $query = "SELECT STUDENT_NAME FROM student WHERE STUDENT_ID='$id'";
                        $rs = mysqli_query($connection,$query);
                        $name=mysqli_fetch_row($rs);
                        echo $name[0];
                        
                    ?>  ! </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <span class="glyphicon glyphicon-list-alt"></span> Event Calendar
                            </li>
                        </ol>
                    </div>
                </div>

                <?php
                    $query = "SELECT EVENT,EVENT_DATE,EVENT_TIME ";
                    $query .= "FROM events ";
                    $query .= "ORDER BY EVENT_DATE DESC";
                    $result = mysqli_query($connection,$query) or die("Could not connect to the database<br />" . mysqli_error($connection));
                    $num_events = mysqli_num_rows($result);
                ?>

                <div class="row">
                    
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Recent Events</h3>
                            </div>
                            <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                              <th>#</th>  
                                              <th>Event</th>
                                              <th>Date</th>
                                              <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $i = 1;
                                                while($event = mysqli_fetch_array($result)) {
                                                    
                                                    echo "<tr>
                                                        <td>{$i}</td>
                                                        <td>{$event['EVENT']}</td>
                                                        <td>{$event['EVENT_DATE']}</td>
                                                        <td>{$event['EVENT_TIME']}</td>
                                                    </tr>";
                                                    $i++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                            </div> <!-- End: div class="table-responsive" -->
                            <!--
                            <div class="panel-body">
                                <div class="list-group">
                                    <a class="list-group-item">
                                        <span class="badge">timestamp</span>
                                        CSI Orientation (auditorium)
                                    </a>
                                    <a class="list-group-item">
                                        <span class="badge">timestamp</span>
                                        French Embassy - conference of higher Education
                                    </a>
                                    <a class="list-group-item">
                                        <span class="badge">timestamp</span>
                                        CSI Orientation (auditorium)
                                    </a>
                                    <a class="list-group-item">
                                        <span class="badge">timestamp</span>
                                        CSI Orientation (auditorium)
                                    </a>
                                    <a class="list-group-item">
                                        <span class="badge">timestamp</span>
                                        French Embassy - conference of higher Education
                                    </a>
                                    <a class="list-group-item">
                                        <span class="badge">timestamp</span>
                                        CSI Orientation (auditorium)
                                    </a>
                                </div>
                                
                            </div>-->
                        </div>
                    <hr>
                    <footer class="site-footer">
                        <p align="center">Project by <a href="">Sushmita-Sharan-Ashar</a></p>
                    </footer>
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
