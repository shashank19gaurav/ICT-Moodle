<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("admin_header.php"); ?>
<?php require_once("../includes/logged_in.php"); ?>

<div class="container">
  <div class="row">
        
          
        <?php 
          echo '<div class="col-md-10 col-md-offset-1">';
          if(isset($_POST['edit'])){
             echo  '<form class="form-horizontal" role="form" method="post" action="../public/admin_edit_course.php" enctype="multipart/form-data">
                  <fieldset>
                    <legend>Edit Course</legend>';
                          
                       echo '<div class="form-group">
                          <label class="col-sm-2 control-label" for="textinput">Course-ID</label>
                          <div class="col-sm-10">
                          <input type="text" name="courseid" id="courseid" value="'.$_POST['cid'].'" class="form-control" readonly >
                          </div>
                          </div>';
                          
                      $cid = $_POST['cid'];

                      $query = "SELECT `name`, `syllabus`, `teacherid` FROM `courses` WHERE id ='$cid'";
                      $run = mysqli_query($connection,$query);
                      $row = mysqli_fetch_row($run);
              echo '<!-- Text input-->
              <div class="form-group">
                <label class="col-sm-2 control-label" for="textinput">Course Name</label>
                <div class="col-sm-10">
                  <input type="text" name="coursename" id="coursename" value="'.$row[0].'" class="form-control">
                </div>
              </div>';
			  
			  
           echo '<div class="form-group">
                <label class="col-sm-2 control-label" for="textinput">Teacher-ID</label>
                <div class="col-sm-10">
                   <select id="e1" style="width:500px" name="trid" >'; 
                   
                    $qry = "SELECT id FROM teacher ";
                    $rs = mysqli_query($connection,$qry);
                    $nm = mysqli_num_rows($rs);
                    for( $i=0; $i<$nm; $i++){
                      $r = mysqli_fetch_row($rs);
                      echo '<option>'.$r[0].'</option>';
                      } 
                  echo  '</select>
                </div>
            </div>';

 
             echo '<div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Syllabus</label>
            <div class="col-sm-10">
              <input type="file" name="syllabus" id="syllabus" value="'.$row[1].'">
            </div>
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
          }
        ?>
        
        </div>
      </div>
<?php require_once("footer.php"); ?>