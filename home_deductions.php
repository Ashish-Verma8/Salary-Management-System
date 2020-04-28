<?php
  include("auth.php");
  include("add_employee.php");
?>
<?php
  global $ppf;
  global $med;
  global $total;

  $conn = new mysqli('localhost', 'root', '', 'payroll');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error());
  }

  $query  = mysqli_query($conn,"SELECT * from dedemp");
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['id'];
    $ppf          = $row['ppf'];
    $med          = $row['med'];

    $total        = $ppf + $med;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Deductions</title>
    <link href="img/tech.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
    <style type="text/css">
      body{
        background: url('img/gold.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        font-family: serif;
         font-size: 20px;
      }
  form{
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: 'Livvic', sans-serif;
  color: white ;
  width: 700px;
  padding: 80px 40px;
  background: rgba(0,0,0,0.5);
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
            <li class="active">
              <a data-toggle="modal" href="#deductions">Deduction/s</a>
            </li>
            <li>
              <a href="home_salary.php">Income</a>
            </li>
          </ul>
        </nav>
      </div><br><br>
              <form class="form-horizontal" action="#" name="form">
                <div class="form-group">
                  <label class="col-sm-5 control-label">PPF :</label>
                  <div class="col-sm-4">
                    <?php echo ($ppf) ; ?>.00
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">Medical Allowance :</label>
                  <div class="col-sm-4">
                    <?php echo ($med) ; ?>.00
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">Total Deductions :</label>
                  <div class="col-sm-4">
                    <?php echo ($total) ; ?>.00
                  </div>
                </div><br><br><br>

                <div class="form-group" align="center">
                  <label class="control-label"><button type="button" data-toggle="modal" data-target="#deductions" class="btn btn-danger btn-lg">Update</button></label>
                </div>
              </form>
      <div class="modal fade" id="deductions" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Deduction</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="add_deductions.php" name="ded" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">PPF</label>
                  <div class="col-sm-8">
                    <input type="text" name="ppf" class="form-control" required="required" value="<?php echo $ppf; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Medical Allowance</label>
                  <div class="col-sm-8">
                    <input type="text" name="med" class="form-control" value="<?php echo $med; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  </div>
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