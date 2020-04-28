<?php
  include("auth.php");
  include("db.php")
?>

<?php
  $query  = mysqli_query($connection,"SELECT * from salary");
  while($row=mysqli_fetch_array($query))
  {
    @$salary = $row['salary_rate'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Salary</title>
    <link href="img/tech.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
    <style type="text/css">
      body{
        background:url('img/bar.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        font-family: serif;
        font-size: 20px;
      }
    </style>

</head>
<body>
    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Salary Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3><hr>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_employee.php">Employee</a>
            </li>
            <li>
              <a href="home_deductions.php">Deduction/s</a>
            </li>
            <li class="active">
              <a href="">Income</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component" style="background-color:#71BFFF">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#salary" class="btn btn-danger">Modify Salary Rate</button>
                <p class="pull-right"><span><b>Salary rate:&nbsp</b></span><?php echo $salary; ?>.00</p>
                <p align="center"><big><b>Account</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <thead>
                        <tr class="info">
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Deduction</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php                          
                          $query  = mysqli_query($connection,"SELECT * from salary");
                          while($row=mysqli_fetch_array($query))
                          {
                            $salary_rate   = $row['salary_rate'];
                          }

                          $query  = mysqli_query($connection,"SELECT * from employee");
                          while($row=mysqli_fetch_array($query))
                          {
                            $lname           = $row['lname'];
                            $fname           = $row['fname'];
                            $deduction       = $row['deduction'];                            
                            $bonus           = $row['bonus'];

                            $income   = $bonus + $salary_rate;
                            $netpay   = $income - $deduction;
                        ?>
                        <tr>
                          <td align="center"><?php echo $lname?>, <?php echo $fname?></td>
                          <td align="center"><big><b><?php echo $deduction?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $bonus?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $netpay?></b></big>.00</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>
      <div class="modal fade" id="salary" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_salary.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
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