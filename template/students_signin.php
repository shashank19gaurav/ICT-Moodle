
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin_css.css" rel="stylesheet">
  </head>


  <body>

<!--sign in -->
    
    <div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="wrap">
                <p class="form-title" >
                    Sign In</p>
                <form class="login" method="POST" action="../public/students_login.php">
                <input type="text" name="username" placeholder="Enter student ID" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="submit" value="Sign In" class="btn btn-success btn-sm" />
                </form>
            </div>
        </div>
    </div>
   </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>