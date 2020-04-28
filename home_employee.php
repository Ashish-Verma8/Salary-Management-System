<?php
  include("auth.php");
  include("add_employee.php");

  $sql = mysqli_query($conn,"SELECT * from dedemp WHERE id='1'");
  while($row = mysqli_fetch_array($sql))
  {
    $ppf = $row['ppf'];
    $med = $row['med'];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/search.css" rel="stylesheet">
    <link href="img/tech.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
    <style type="text/css">
      body{
        background: url('img/phone.jpg');
        background-size: cover;
        height: 100vh;
        background-repeat: no-repeat;
        font-size: 20px;
        font-family: serif;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <div class="row">
        <div class="col-md-1"><b><a href="index.php"><h1>Home</h1></a></b>
        </div>
        <div class="col-md-7"></div>
            <div class="col-md-4">
              <a data-toggle="modal" href="#colins" class="pull-right"><b><h1>Admin</h1></b></a></div>
            </div>
            <hr>
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
      </div>
        <br>
          <div class="well bs-component" style="background-color: #71BFFF;">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-warning">Add New</button>
                <p align="center"><big><b>List of Employees</b></big></p><hr>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <thead>
                        <tr class="info">
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Employee Type</p></th>
                          <th><p align="center">Department</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $conn = new mysqli('localhost', 'root', '', 'payroll');
                          if (!$conn)
                          {
                            die("Database Connection Failed" . mysqli_error());
                          }
                          
                          $query=mysqli_query($conn,"select * from employee ORDER BY emp_id asc")or die(mysqli_error($conn));
                          while($row=mysqli_fetch_array($query))
                          {
                            $id     =$row['emp_id'];
                            $lname  =$row['lname'];
                            $fname  =$row['fname'];
                            $type   =$row['emp_type'];
                            $deduction   =$row['deduction'];
                            $bonus   =$row['bonus'];
                        ?>

                        <tr>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['lname'] ?>,  <?php echo $row['fname'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['gender'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['emp_type'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['division'] ?></a></td>
                          <td align="center">
                            <a class="btn btn-success" href="view_account.php?emp_id=<?php echo $row["emp_id"]; ?>">Account</a>
                            <a class="btn btn-danger" href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>">Delete</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Employee</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Lastname</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control" placeholder="Lastname" autocomplete="off" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Firstname</label>
                  <div class="col-sm-8">
                    <input type="text" name="fname" class="form-control" placeholder="Firstname" autocomplete="off" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group"> 
                  <label class="col-sm-4 control-label">Employee Type</label>
                  <div class="col-sm-8">
                    <select name="emp_type" class="form-control" placeholder="Employee Type" required>
                      <option value="">Employee Type</option>
                      <option value="Staff">Staff</option>
                      <option value="Doctor">Doctor</option>
                      <option value="Manager">Manager</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Division</label>
                  <div class="col-sm-8">
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
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
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