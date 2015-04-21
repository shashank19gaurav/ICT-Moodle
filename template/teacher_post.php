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

    <title>Teacher: Posts</title>

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
          <a class="blog-nav-item active" href="teacher_post.php">New Post</a>
          <a class="blog-nav-item" href="teacher_books.php">Books</a>
          <a class="blog-nav-item" href="teacher_events.php">Events</a>
          <a class="blog-nav-item" href="teacher_account.php">MyAccount</a>
          <a class="blog-nav-item" href="../public/logout.php">Logout</a>
         </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-title">
        <p class="text-center"><h3>Add new posts here.</h3></p>
      </div>
      <hr>
      <div class="row">
      <div class="col-md-10 col-md-offset-1">
      <form role="form" action="../public/teacher_post.php" method="post">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Select course</label>
            <div class="col-sm-10">
                 <select class="form-control" name="coursename" > 
                  
                 <?php 
                    $tr = $_SESSION['user_id'];
                    $query = "SELECT COURSE_NAME FROM courses WHERE TR_ID='$tr'";
                    $rs = mysqli_query($connection,$query);
                    $nm = mysqli_num_rows($rs);
                    for( $i=0; $i<$nm; $i++){
                      $row = mysqli_fetch_row($rs);
            echo '<option>'.$row[0].'</option>';
                      } ?>
                  </select>
               </div>
            </div>
          
          <br /><br /><br />
          <textarea class="form-control" name="content" rows="3" placeholder="Content here."></textarea>          
          <br />
          
      <button type="submit" name="post" class="btn btn-primary">Submit</button>
    </form>
      </div>
      </div>

    </div><!-- /.container -->

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
