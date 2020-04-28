<?php
  include("db.php");
  include("auth.php");

  $sql = mysqli_query($connection,"SELECT * from dedemp WHERE id='1'");
  while($row = mysqli_fetch_array($sql))
  {
    $ppf = $row['ppf'];
    $med = $row['med'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Details</title>
    <link href="img/tech.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Salary Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="">Employee</a>
            </li>
            <li>
              <a href="home_deductions.php">Deduction/s</a>
            </li>
            <li>
              <a href="home_salary.php">Income</a>
            </li>
          </ul>
        </nav>
      </div><br><br>

      <?php
        $id=$_REQUEST['emp_id'];
        $query = "SELECT * from employee where emp_id='".$id."'";
        $result = mysqli_query($connection,$query) or die ( mysql_error());

        while ($row = mysqli_fetch_assoc($result))
        {
          ?>
              <form class="form-horizontal" action="update_employee.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h2>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Lastname  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Firstname  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Gender  :</label>
                    <div class="col-sm-4">
                    <select name="gender" class="form-control" required>
                      <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Employee Type  :</label>
                    <div class="col-sm-4">
                      <select name="emp_type" class="form-control" placeholder="Employee Type" required>
                      <option value="">Employee Type</option>
                      <option value="Staff">Staff</option>
                      <option value="Doctor">Doctor</option>
                      <option value="Manager">Manager</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Department  :</label>
                    <div class="col-sm-4">
                     <select name="division" class="form-control" placeholder="Division" required>
                      <option value="">Division</option>
                      <option value="Receptionist">Receptionist</option>
                      <option value="Helper">Helper</option>
                      <option value="Cleaner">Cleaner</option>
                      <option value="Electrician">Electrician</option>
                      <option value="Ward Boy">Ward Boy</option>
                      <option value="Nurse">Nurse</option>
                      <option value="Security">Security</option>
                      <option value="Manager">Manager</option>
                      <option value="Ortho">Ortho</option>
                      <option value="Neurology">Neurology</option>
                      <option value="Opthamology">Opthamology</option>
                      <option value="Surgeon">Surgeon</option>
                      <option value="Cardiology">Cardiology</option>
                      <option value="TB Chest">TB Chest</option>
                    </select>
                    </div>
                  </div><br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_employee.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
        ?>
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>
  </body>
</html>