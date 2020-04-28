<?php
  include("db.php"); //include auth.php file on all secure pages
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account</title>

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
        $result = mysqli_query($connection,$query) or die ( mysqli_error());

        $query  = mysqli_query($connection,"SELECT * from salary");
        while($row=mysqli_fetch_array($query))
        {
          $salary   = $row['salary_rate'];
        }

        while ($row = mysqli_fetch_assoc($result))
        {
            $bonus     = $row['bonus'];
            $deduction = $row['deduction'];
            $income   = $bonus + $salary;
            $netpay   = $income - $deduction;
          ?>

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h2>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Deduction/s  :</label>
                    <div class="col-sm-4">
                    <select name="deduction" class="form-control" required>
                      <option value="NULL">--Select--</option>
                      <option value="<?php echo $ppf; ?>">PPF</option>
                      <option value="<?php echo $med; ?>">Medical Allowances</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Bonus  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="bonus" class="form-control" value="<?php echo $row['bonus'];?>" required="required">
                    </div>
                  </div><br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Netpay  :</label>
                    <div class="col-sm-4">
                      <?php echo $netpay;?>.00
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

      <div class="modal fade" id="c
      olins" role="dialog">
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>