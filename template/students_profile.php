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

    <title>MIT-Portal</title>

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
                
                <a class="navbar-brand" href="students_dashboard.php">MIT-Portal</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                   <?php 
                        $id = $_SESSION['user_id'];
                        $query = "SELECT first_name, last_name FROM student WHERE id ='$id'";
                        $query = "SELECT first_name, last_name FROM student WHERE id ='$id'";
                        $query = "SELECT first_name, last_name FROM student WHERE id ='$id'";
                        $rs = mysqli_query($connection,$query);
                        $name=mysqli_fetch_row($rs);
                        echo $name[0]." ".$name[1];
                        
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
                        <a href="students_dashboard.php"> Dashboard</a>
                    </li>
                    <li >
                        <a href="students_courses.php">Select course</a>
                    </li>
                    <li>
                        <a href="students_blog.php">Forum</a>
                    </li>
                    
                    <li>
                        <a href="students_view.php"> Students/Teachers</a>
                    </li>
                    <li>
                        <a href="students_books.php"> Books/Reference</a>
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
                        $qur = "SELECT * from student where id = '$id'";
                        $res= mysqli_query($connection,$qur);
                        $row = mysqli_fetch_row($res);
                        
                        echo' <h3 class="panel-title">'.$row[1]." ".$row[2].'</h3>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class=" col-md-12"> 
                              <table class="table table-user-information">
                                <tbody>
                                  <tr>
                                    <td>Department:</td>';
                                    
                                    $query = "SELECT DEPARTMENT from class where id in (SELECT CLASS_ID from student where id = '$id')";
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

                                        $query = "SELECT SEMESTER from class where id in (SELECT CLASS_ID from student where id = '$id')";
                                        $rslt= mysqli_query($connection,$query);
                                        $sem = mysqli_fetch_row($rslt);

                                    echo' <td>'.$sem[0].'</td>
                                  </tr>
                                    <tr>
                                    <td>Contact</td>
                                    <td>'.$row[5].'</td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>'.$row[4].'</td>
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
                  <?php include("footer_projectby.php"); ?>
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
