<?php 

  include("db.php");
  include("auth.php");

  $id           = $_POST['id'];
  $deduction    = $_POST['deduction'];
  $bonus        = $_POST['bonus'];

  $sql = mysqli_query($connection,"UPDATE employee SET deduction='$deduction', bonus='$bonus' WHERE emp_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Invalid";
  }
?>