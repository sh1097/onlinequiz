<?php

//login.php
error_reporting(0);
session_start();
$user=$_SESSION['user'];
include('header.php');
include('dbcon.php');
 $email_id = $_POST['user_email_address'];
$password = $_POST['user_password'];

$obj = new Dbconn();
$con = $obj->createConnection();
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} else {
  $sql1 = ("select * from admin where emailid='$email_id' AND password='$password'");
  $result = mysqli_query($con, $sql1);
  if (mysqli_num_rows($result) > 0) {
    echo  $row = mysqli_fetch_array($result);
    if ($row['is_admin'] == 1) {
      $_SESSION['admin'] = $row;
     echo "<script> alert('welcome admin');</script>";
     echo "<script> window.location.href='admin/index.php';</script>";
      // header('location:admin/index.php');
    } else {
      if ($row['is_admin'] == 0) {
     
        if ($row['active'] == 1) {
          $_SESSION['user'] = $row;
        
          echo "<script> alert('welcome user');</script>";
          echo "<script> window.location.href='user/index.php';</script>";
        } else {
          
          header('location:login.php');
          
        }
      }
    }
  }
}



?>
<style>
  body {
    background-color: #f1f1f1;
  }
</style>
<body> 

<div class="container-fluid">

  <div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6" style="margin-top:100px;">
      <span id="message"></span>
      <div class="card">
        <div class="card-header">User Login</div>
        <div class="card-body">
          <form method="post" id="user_login_form" action="">
            <div class="form-group">
              <label>Enter Email Address</label>
              <input type="text" name="user_email_address" id="user_email_address" class="form-control" />
            </div>
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="user_password" id="user_password" class="form-control" />
            </div>
            <div class="form-group">
              <input type="hidden" name="page" value="login" />
              <input type="hidden" name="action" value="login" />
              <input type="submit" name="user_login" id="user_login" class="btn col-12"  style="background-color:#1b926c;color:white"value="Login" />
            </div>
          </form>
          <div align="center">
          <input type="submit" name="user_login" id="user_login" class="btn col-12"  style="background-color:black;color:white"value="Register" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">

    </div>
  </div>
</div>

</body>

</html>