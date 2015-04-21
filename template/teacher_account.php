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

    <title>Teacher: Account</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

   
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="teacher_home.php">Home</a>
          <a class="blog-nav-item" href="teacher_view.php">View post</a>
          <a class="blog-nav-item" href="teacher_post.php">New Post</a>
          <a class="blog-nav-item" href="teacher_books.php">Books</a>
          <a class="blog-nav-item" href="teacher_events.php">Events</a>
          <a class="blog-nav-item active" href="teacher_account.php">MyAccount</a>
          <a class="blog-nav-item" href="../public/logout.php">Logout</a>
         </nav>
      </div>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form class="form-horizontal" role="form" method="post" action="../public/teacher_account.php">
        <fieldset>

          <!-- Form Name -->
          <legend>Change Password</legend>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Old Password</label>
            <div class="col-sm-9">
              <input type="password" placeholder="Enter old password" name="oldpass" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">New Password</label>
            <div class="col-sm-9">
              <input type="password" placeholder="Enter new password" name="newpass" class="form-control">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Confirm Password</label>
            <div class="col-sm-9">
              <input type="password" placeholder="re-enter new password" name="confrmpass" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                  <button type="submit" name="change" class="btn btn-primary">Submit</button>
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
 </body>
</html>
