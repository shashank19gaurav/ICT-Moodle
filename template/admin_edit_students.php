<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("admin_header.php"); ?>
<?php require_once("../includes/logged_in.php"); ?>

<div class="container">
  <div class="row">
        <?php
          
          echo '<div class="col-md-10 col-md-offset-1">';
          echo  '<form class="form-horizontal" role="form" method="post" action="../public/admin_edit_students.php">
                  <fieldset>
                    <legend>Edit Student</legend>';
                          
                       echo '<div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Student-ID</label>
                          <div class="col-sm-10">
                          <input type="text" name="studentid" id="studentid" value="'.$_POST['sid'].'" class="form-control" readonly >
                          </div>
                          </div>';
                          
                      $sid = $_POST['sid'];

                      $query = "SELECT first_name,last_name, password, class_id, contact, email FROM `student` WHERE id='$sid'";
                      $run = mysqli_query($connection,$query);
                      $row = mysqli_fetch_assoc($run);
                      $tname = $row['first_name']." ".$row['last_name'];
                      

              echo '<div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">first name</label>
            <div class="col-sm-4">
              <input type="text" name="firstname" id="firstname" value="'.$row['first_name'].'" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">last name</label>
            <div class="col-sm-4">
              <input type="text" name="lastname" id="lastname" value="'.$row['last_name'].'" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Password</label>
            <div class="col-sm-7">
              <input type="password" name="password" id="password" value="'.$row["password"].'" class="form-control">
            </div>
            <div class="checkbox col-sm-3" >
              <label>
                <input type="checkbox" onchange="document.getElementById(\'password\').type = this.checked ? \'text\' : \'password\'">
                show password
              </label>
            </div>
			</div>
			
			
			 <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Class ID</label>
            <div class="col-sm-10">
              <select id="e1" style="width:400px" name="classid">'; 
                    $query = "SELECT id FROM class;";
                    $rs = mysqli_query($connection,$query);
                    $nm = mysqli_num_rows($rs);
                    for( $i=0; $i<$nm; $i++){
                      $row1 = mysqli_fetch_row($rs);
                      echo '<option>'.$row1[0].'</option>';
                      } 
                 echo'  </select>
            </div>
          </div>
		  
             <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Contact</label>
            <div class="col-sm-4">
              <input type="text" name="contact" id="contact" value="'.$row['contact'].'" class="form-control">
            </div>
			
             <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">E-mail</label>
            <div class="col-sm-4">
              <input type="text" name="email" id="email" value="'.$row['email'].'" class="form-control">
            </div>';

          echo' <br><br><br> 
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
      <script>
        $("#e1").select2({width:'resolve'});
      </script>

<?php require_once("footer.php"); ?>