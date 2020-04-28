<?php
  $conn = new mysqli('localhost', 'root', '', 'payroll');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error());
  }

  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = mysqli_query($conn,"INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname', '$gender', '$type', '$division')");

    if ($conn->query($sql))
    {
        echo "<script>alert('New Record is submitted successfully')</script>";
      echo "<script>window.open('home_employee.php','_self')</script>";
    }
  }
?>