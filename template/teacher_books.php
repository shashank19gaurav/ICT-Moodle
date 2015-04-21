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
    
    <title>Teacher: Books</title>

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
          <a class="blog-nav-item active" href="teacher_books.php">Books</a>
          <a class="blog-nav-item" href="teacher_events.php">Events</a>
          <a class="blog-nav-item" href="teacher_account.php">MyAccount</a>
          <a class="blog-nav-item" href="../public/logout.php">Logout</a>
          </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        
        <p class="blog-post-title">Add books </p>
        <hr>
        <form class="form-horizontal" role="form" method="post" action="../public/teacher_books.php">
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Course ID</label>
            <div class="col-sm-10" >
             <div class="input-group">
                      <select type="text" class="form-control" name="courseid" style="width:375px">
                          <?php

                            if(isset($_POST['courseid']))
                                $cname = $_POST['courseid'];
                            else
                                $cname = 0;

                            $tr = $_SESSION['user_id'];
                            $query = "SELECT COURSE_ID FROM courses WHERE TR_ID='$tr'";
                            $rs = mysqli_query($connection,$query);
                            $nm = mysqli_num_rows($rs);

                            for($i=0; $i<$nm; $i++)
                            {
                              $row = mysqli_fetch_row($rs);
                              
                              if($row[0] === $cname)
                                echo' <option selected>'.$row[0].'</option>';
                              else
                                echo' <option>'.$row[0].'</option>';
                              
                            } 
                      ?>
                      </select>
                      </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Book Name</label>
            <div class="col-sm-5">
              <input type="text" name="bookname" placeholder="enter book title" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Author Name</label>
            <div class="col-sm-5">
              <input type="text" name="authname" placeholder="enter author name" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <div class="pull-right">
                <button type="submit" name="add" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
      </form>
      </div>
      <hr>
      <div class="row">

       <div class="col-lg-6">
        <h4 >Books/Reference</h4> <!--make recent posts to active course-->
        </div>
        <div class="col-md-4">
            
            <!--search input -->
            <div class="well">

              <form method="post" action="teacher_books.php">
              
              <div class="input-group">
              <select type="text" class="form-control" placeholder="Username" name="coursename">
                         
              <?php 

               if(isset($_POST['coursename']))
                  $cname = $_POST['coursename'];
               else
                  $cname = 0;

              $tr = $_SESSION['user_id'];
              $query = "SELECT COURSE_NAME FROM courses WHERE TR_ID='$tr'";
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
          
          </form>
          </div>
             
          </div>
          </div>
         
    <div class="col-md-12 col-lg-offset-0">
      <?php 
      
        if(isset($_POST['coursename']))
        {
          $cname = $_POST['coursename'];
          $fetch_id = "SELECT COURSE_ID from courses WHERE COURSE_NAME = '$cname'";
          $rslt = mysqli_query($connection,$fetch_id);
          $cid = mysqli_fetch_row($rslt);
    
          $qu = "SELECT BOOK_NAME, AUTHOR from books WHERE COURSE_ID= '$cid[0]'";
          $run = mysqli_query($connection,$qu);
          
          $n = mysqli_num_rows($run);
           echo' <div class="col-lg-8">';
            echo' <table class="table table-bordered">';
            echo' <thead>';
            echo' <tr class="success">';
            echo' <th>#</th>';
            echo' <th>BOOK NAME</th>';
            echo' <th>AUTHOR</th>';
            echo' </tr>';
            echo' </thead>';
            echo' <tbody>';
            $i=1;
            while($row=mysqli_fetch_row($run))
            {
              echo "<tr>
                      <td>{$i}</td>
                      <td>{$row[0]}</td>
                      <td>{$row[1]}</td>
                      </tr>";
                  $i++;                     
            }
            echo' </tbody>';
            echo' </table>';
            echo' </div>';
        }
            
       ?>
  
      </div>
        
      </div><!-- /.row -->

    <!--footer-->
    <div class="push"></div>
    <div class="blog-footer">
      <p>project by <a href="#">Sushmita-Sharan-Ashar</a></p>
    </div>
    <!--footer-->

    </div><!-- /.container -->



    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
