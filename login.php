<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>login Page</title>
    <link href="img/tech.png" rel="shortcut icon">
    <style type="text/css">
body:before{
  content:'';
  position: fixed;
  width: 100vw;
  height: 100vh;
  background-image: url('img/bit.jpg');
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  --webkit-filter: blur(10px);
  -moz-filter:blur(10px);
}

form{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: 'Livvic', sans-serif;
  color: #92FF91 ;
  padding: 70px 40px;
  background: rgba(0,0,0,0.6);
}
h1{
  font-family: serif;
  text-align: center;
}
input[type]{
  background: transparent;
  color: white;
}
</style>
</head>
<body>
<?php
  require('db.php');
  session_start();
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $username = addcslashes($username,"%_");

        $password = stripslashes($password);
        $password = addcslashes($password,"%_");

        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysqli_query($connection,$query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: index.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='login.php';
          </script>
          <?php
        }
    }
    else
    {
?>

<br><br><br><br><br><br><br><br>
<div class="container">
    <form action="" method="post" class="form-group">
      <h1>SMS Login</h1><hr>
      <div>
        <input name=username type="text" placeholder="Enter Username" required class="form-control" autocomplete="off"><br>
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required class="form-control" autocomplete="off"><br>
      </div>
      <div>
    <button type="submit" class="btn btn-primary" name="adm_login" style="font-family: serif; width: 100%;">Log In</button>
  </div>
    </form>
</div>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>