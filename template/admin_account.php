<?php require_once("../includes/session.php"); ?>
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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
   
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="admin_home.php">Home</a>
          <a class="blog-nav-item" href="admin_course.php">Courses</a>
          <a class="blog-nav-item" href="admin_students.php">Students</a>
          <a class="blog-nav-item" href="admin_teachers.php">Teachers</a>
          <a class="blog-nav-item" href="admin_class.php">Classes</a>
          <a class="blog-nav-item" href="admin_post.php">Posts & Comments</a>
          <a class="blog-nav-item active" href="admin_account.php">MyAccount</a>
          <a class="blog-nav-item" href="../public/logout.php">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form class="form-horizontal" role="form" method="post" action="../public/admin_account.php"">
        <fieldset>

          <!-- Form Name -->
          <legend>Change Password</legend>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Old Password</label>
            <div class="col-sm-9">
              <input type="password" name="oldpass" id="oldpass" placeholder="Enter old password" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">New Password</label>
            <div class="col-sm-9">
              <input type="password" name="newpass" id="newpass" placeholder="Enter new password" class="form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Confirm Password</label>
            <div class="col-sm-9">
              <input type="password" name="conf_newpass" id="conf_newpass" placeholder="re-enter new password" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>

      
  </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
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
