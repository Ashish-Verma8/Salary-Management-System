<?php
  include("auth.php");
  include("add_employee.php");
?>

<?php

  $conn = new mysqli('localhost', 'root', '', 'payroll');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

  $query  = mysqli_query($conn,"SELECT * from dedemp");
  while($row=mysqli_fetch_array($query))
  {
    $id = $row['id'];
    $ppf = $row['ppf'];
    $med = $row['med'];
    
    $total = $ppf + $med;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="img/tech.png" rel="shortcut icon">
    <link href="assets/css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
</head>
<body style="background: url('img/nice.png'); background-size: cover; font-family: serif;">
<div class="container">
      <div class="masthead">
        <h3 style="color: white;">
          <b>Salary Management System</b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b style="text-transform: capitalize;">In: <?php echo $_SESSION['username']; ?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="home_employee.php">Employee</a></li>
            <li><a href="home_deductions.php">Deduction/s</a></li>
            <li><a href="home_salary.php">Income</a></li>
          </ul>
        </nav>
      </div><br>
      <div class="jumbotron" style="background-color: #64ABFF; color: black;">
        <img src="img/tech.png" style="border-radius: 50%;">
        <h1>SALARY MANAGEMENT</h1>
        <p class="lead">This is Salary Management System which can calculate the monthly salary of employees.</p>
      </div>
      <footer class="footer" style="color: white;">
        <p align="center">&copy; 2020 SALARY MANAGEMENT SYSTEM</p>
        <p align="center">Brought To You By Techniqa Solution(Ashish Verma)</p>
      </footer>
    <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center" style="text-transform: capitalize;">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
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