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

       
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="students_dashboard.php">MIT-Portal</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php 
                        $id = $_SESSION['user_id'];
                        $query = "SELECT first_name, last_name FROM student WHERE id='$id'";
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
                    <li>
                        <a href="students_dashboard.php"> Dashboard</a>
                    </li>
                    <li >
                        <a href="students_courses.php">Select course</a>
                    </li>
                    <li>
                        <a href="students_blog.php">Blog</a>
                    </li>
                    
                    <li class="active">
                        <a href="students_view.php"> Students/Teachers</a>
                    </li>
                    <li>
                        <a href="students_books.php"> Books/Reference</a>
                    </li>
                </ul>
            </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="page-header">
                        <h1 style="font-family:centaur; font-weight:bold">View Students/Teachers by course</h1> <!--make recent posts to active course-->
                    </div>
                    </div> 
                    
                      <form method="post" action="students_view.php">
                      <div class="col-sm-4">
                      <div class="input-group">
                      <!--<select id="e1" type="text" class="form-control" name="coursename">-->
                      <select id="e1" style="width:200px" name="coursename" type="text" class="form-control">
                          <?php

                            if(isset($_POST['coursename']))
                                $cname = $_POST['coursename'];
                            else
                                $cname = 0;

                            $id = $_SESSION['user_id']; 
                            $query = "SELECT `name` FROM `courses` WHERE `id` IN (select `COURSE_ID` from `enrolled_in` where `STUDENT_ID` = '$id' )";
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
                        <button class="btn btn-success" type="submit">Select Course</button>
                      </span>
                    </div>
                  </div>
                  </form>

                  <?php 
                  if(isset($_POST['coursename']))
                  {
                     $cname = $_POST['coursename'];
                     $qu = "SELECT first_name ,EMAIL from teacher where id in (select teacherid from courses where name='$cname')";
                     $run = mysqli_query($connection,$qu);
                     $tname = mysqli_fetch_row($run);

                     $q = "SELECT id from courses where name = '$cname'";
                     $rslt = mysqli_query($connection,$q);
                     $cinfo = mysqli_fetch_row($rslt);


                    echo' <div class="col-lg-8">';
                    echo' <div class="well" style=" font-family:DAVID font-size:20px">';
                    echo' <p>Course ID: '.$cinfo[0].'</p>';
                    echo' <p>Professor: '.$tname[0].'</p>';
                    echo' <p>Email: '.$tname[1].'</p>';
                    echo' </div>';


                    $qu = "SELECT STUDENT_ID from `enrolled_in` where COURSE_ID in (select id from courses where name='$cname')";
                     $run = mysqli_query($connection,$qu);
                     $num = mysqli_num_rows($run);

                     echo' <table class="table table-bordered">';
                      echo' <thead>';
                      echo' <tr class="success">';
                      echo' <th>#</th>';
                      echo' <th>ROLL NO.</th>';
                      echo' <th>NAME</th>';
                      echo' <th>CONTACT</th>';
                      echo' <th>EMAIL</th>';
                      echo' </tr>';
                      echo' </thead>';

                      echo' <tbody>';
                      $i = 1;
                      for ($j=0; $j<$num; $j++) 
                      { 

                        $sid = mysqli_fetch_row($run);
                        $query = "SELECT id, first_name, last_name, contact, email from student where id = '$sid[0]'";
                        $result = mysqli_query($connection,$query);
                        while($sdetail = mysqli_fetch_array($result))
                        {
                                                      
                          echo "<tr>
                              <td>{$i}</td>
                              <td>{$sdetail['id']}</td>
                              <td>{$sdetail['first_name']} {$sdetail['last_name']}</td>
                              <td>{$sdetail['contact']}</td>
                              <td>{$sdetail['email']}</td>
                          </tr>";
                          $i++;
                        }
                       
                         
                      }

                                           
                      echo' </tbody>';
                      echo' </table>';
                      echo' </div>';
                     }

                     else
                     {

                         $id = $_SESSION['user_id']; 
                         $qu = "SELECT name, id from courses where id in (select COURSE_ID from `enrolled_in` where STUDENT_ID = '$id') limit 1";
                         $run = mysqli_query($connection,$qu);
                         $cinfo = mysqli_fetch_row($run);

                         $query = "SELECT first_name, last_name, email from teacher where id in (select teacherid from courses where id = '$cinfo[1]')";
                         $rslt = mysqli_query($connection,$query);
                         $tname = mysqli_fetch_row($rslt);

                        echo' <div class="col-lg-8">';
                        echo' <div class="well" style=" font-family:DAVID font-size:20px">';
                        echo '<p>Course ID: '.$cinfo[1].'</p>';
                        echo' <p>Professor: '.$tname[0].'</p>';
                        echo' <p>Email: '.$tname[1].'</p>';
                        echo' </div>';


                         $q= "SELECT STUDENT_ID from `enrolled_in` where COURSE_ID ='$cinfo[1]'";
                         
                         $result = mysqli_query($connection,$q);
                         $num = mysqli_num_rows($result);

                         echo' <table class="table table-bordered">';
                          echo' <thead>';
                          echo' <tr class="success">';
                          echo' <th>#</th>';
                          echo' <th>ROLL NO.</th>';
                          echo' <th>NAME</th>';
                          echo' <th>CONTACT</th>';
                            echo' <th>EMAIL</th>';
                          echo' </tr>';
                          echo' </thead>';

                          echo' <tbody>';

                          $i = 1;
                          for ($j=0; $j<$num; $j++) 
                          { 

                            $sid = mysqli_fetch_row($result);
                            $query = "SELECT id, first_name, last_name , contact, email from student where id = '$sid[0]'";
                            $run = mysqli_query($connection,$query);
                            
                            while($sdetail =  mysqli_fetch_array($run))
                            {
                                                         
                              echo"<tr>
                                  <td>{$i}</td>
                                  <td>{$sdetail['id']}</td>
                                  <td>{$sdetail['first_name']}{$sdetail['last_name']}</td>
                                  <td>{$sdetail['contact']}</td>
                                  <td>{$sdetail['email']}</td>
                              </tr>";
                              $i++;
                            }
                           
                             
                          }

                                               
                          echo' </tbody>';
                          echo' </table>';
                          echo' </div>';


                     }
                             
                    
                    

                  ?>


                    <div class="col-lg-12">
                    <!--footer-->
                    <div class="push"></div>
                    <div class="blog-footer">
                        <?php include("footer_projectby.php"); ?>
                    </div>
                    <!--footer-->
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
