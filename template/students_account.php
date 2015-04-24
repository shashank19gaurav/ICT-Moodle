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

        <div id="page-wrapper">
        <div class="container-fluid">
        <div class="row">
            
                 
            <div class="col-md-10 col-md-offset-1">
              <form class="form-horizontal" role="form" method="post" action="students_account_public.php">
               <br /><br />
                <fieldset>
                    
                  <!-- Form Name -->
                  <legend>Change Password</legend>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Old Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="oldpass" id="oldpass" placeholder="Enter old password" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">New Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="newpass" id="newpass" placeholder="Enter new password" class="form-control">
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Confirm Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="conf_newpass" id="conf_newpass" placeholder="re-enter new password" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-7">
                      <div class="pull-right">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>

              
          </fieldset>
              </form>
    </div><!-- /.col-lg-12 -->';

    </div><!-- /.row -->
    </div>
    

<!--footer-->
    <div class="push"></div>
    <div class="blog-footer">
        <?php include("footer_projectby.php"); ?>
    </div>
    <!--footer-->

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
