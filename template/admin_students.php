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
    <link rel="icon" href="../../favicon.ico">

    <title>Admin: Students</title>
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
   

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
   
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="admin_home.php">Home</a>
          <a class="blog-nav-item" href="admin_course.php">Courses</a>
          <a class="blog-nav-item active" href="admin_students.php">Students</a>
          <a class="blog-nav-item" href="admin_teachers.php">Teachers</a>
          <a class="blog-nav-item" href="admin_class.php">Classes</a>
          <a class="blog-nav-item" href="admin_post.php">Posts & Comments</a>
          <a class="blog-nav-item" href="admin_account.php">MyAccount</a>
          <a class="blog-nav-item" href="../public/logout.php">Logout</a>
       </nav>
      </div>
    </div>

    <div class="container">
        <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form class="form-horizontal" role="form" method="post" action="../public/admin_students.php">
        <fieldset>

          <!-- Form Name -->
          <legend>Add Student record | <a href="admin_view_students.php">view</a></legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Student-ID</label>
            <div class="col-sm-10">
              <input type="text" name="studentid" id="studentid" placeholder="Enter Student-id without spaces" class="form-control" required="required">
            </div>
          </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">First Name: </label>
            <div class="col-sm-4">
              <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Last Name</label>
            <div class="col-sm-4">
              <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Class ID</label>
            <div class="col-sm-10">
              <select id="e1" style="width:400px" name="classid" > 
                   <?php 
                    $query = "SELECT id FROM class ";
                    $rs = mysqli_query($connection,$query);
                    $nm = mysqli_num_rows($rs);
                    for( $i=0; $i<$nm; $i++){
                      $row = mysqli_fetch_row($rs);
                      echo '<option>'.$row[0].'</option>';
                      } 
                    ?>
                  </select>
            </div>
          </div>

			<div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Contact</label>
            <div class="col-sm-10">
              <input type="text" name="contact" id="contact" placeholder="Enter contact number" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Email-ID</label>
            <div class="col-sm-10">
              <input type="text" name="email" id="email" placeholder="Enter email-ID " class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" id="password" placeholder="Enter default password" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" name="add" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
          <hr>
        </fieldset>
        </form>


        <form class="form-horizontal" role="form" method="post" action="../public/admin_students.php">
        <fieldset>

          <!-- Form Name -->
          <legend>Delete student record | <a href="admin_view_students.php">view</a></legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Student-ID</label>
            <div class="col-sm-10">
              <?php
              echo '<select id="e2" style="width:500px" name="sid" >'; 
                     
                    $query = "SELECT STUDENT_ID FROM student ";
                    $rs = mysqli_query($connection,$query);
                    $nm = mysqli_num_rows($rs);
                    for( $i=0; $i<$nm; $i++){
                      $row = mysqli_fetch_row($rs);
                      echo '<option>'.$row[0].'</option>';
                      } 
                  echo  '</select>';
                  ?>
              </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
          <hr>
        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->

    
         <!--edit-->
         <?php
         echo '<div class="col-md-10 col-md-offset-1">';
      
      
      if(!isset($_POST['add']))
            {
      echo 
      '<form class="form-horizontal" role="form" method="post" action="admin_edit_students.php">
        <fieldset>
          <legend>Edit Student Record | <a href="admin_view_students.php">view</a></legend>';
            
                
             echo '<div class="form-group">
                <label class="col-sm-2 control-label" for="textinput">Student-ID</label>
                <div class="col-sm-10">
                   <select id="e3" style="width:500px" name="sid" >'; 
                      
                 
                    
                    $query = "SELECT STUDENT_ID FROM student ";
                    $rs = mysqli_query($connection,$query);
                    $nm = mysqli_num_rows($rs);
                    for( $i=0; $i<$nm; $i++){
                      $row = mysqli_fetch_row($rs);
                      echo '<option>'.$row[0].'</option>';
                      } 
                  echo  '</select>
                </div>
            </div>';
            
             echo '<div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="pull-right">
                    <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                  </div>
                </div>
              </div>
              </fieldset>
              </form>
              </div>';
             }
             else{
              redirect_to("admin_edit_students.php");
             }
          ?>
        
      

</div><!-- /.row -->
    </div>
<!--footer-->
    <div class="push"></div>
    <div class="blog-footer">
      <p>project by <a href="#">Sushmita-Sharan-Ashar</a></p>
    </div>
    <!--footer-->

   <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
