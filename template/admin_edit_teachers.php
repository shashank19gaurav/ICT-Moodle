<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("admin_header.php"); ?>
<?php require_once("../includes/logged_in.php"); ?>

<div class="container">
  <div class="row">
        <?php
          
          echo '<div class="col-md-10 col-md-offset-1">';
          echo  '<form class="form-horizontal" role="form" method="post" action="../public/admin_edit_teachers.php">
                  <fieldset>
                    <legend>Edit Teacher</legend>';
                          
                       echo '<div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Teacher-ID</label>
                          <div class="col-sm-10">
                          <input type="text" name="teacherid" id="teacherid" value="'.$_POST['trid'].'" class="form-control" readonly >
                          </div>
                          </div>';
                          
                      $tid = $_POST['trid'];

                      $query = "SELECT `TR_NAME`, `PASSWORD`, `EMAIL` FROM `teacher` WHERE TR_ID='$tid'";
                      $run = mysqli_query($connection,$query);
                      $row = mysqli_fetch_row($run);
                      $tname = explode(' ', $row[0]);
                      $first = $tname[0];
                      $second = $tname[1];
                      

              echo '<div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">first name</label>
            <div class="col-sm-4">
              <input type="text" name="firstname" id="firstname" value="'.$first.'" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">last name</label>
            <div class="col-sm-4">
              <input type="text" name="lastname" id="lastname" value="'.$second.'" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Password</label>
            <div class="col-sm-7">
              <input type="password" name="password" id="password" value="'.$row[1].'" class="form-control">
            </div>
            <div class="checkbox col-sm-3" >
              <label>
                <input type="checkbox" onchange="document.getElementById(\'password\').type = this.checked ? \'text\' : \'password\'">
                show password
              </label>
            </div>
          </div>
		  
		   <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">E-mail</label>
            <div class="col-sm-4">
              <input type="text" name="email" id="email" value="'.$row[2].'" class="form-control">
            </div>
			
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" name="submit" class="btn btn-warning">Submit</button>
              </div>
            </div>
          </div>

              </fieldset>
              </form>
              </div>';
        
        ?>
        </div>
      </div>
<?php require_once("footer.php"); ?>