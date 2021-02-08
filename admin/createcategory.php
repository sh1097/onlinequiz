<?php

//register.php

include('../dbcon.php');
include('../class.php');
session_start();
$show=new user1();
$show->createcategory($lang);

include('header.php');
if(isset($_GET['user_register'])){
 $lang=$_GET['language'];
echo $_SESSION['language']=$lang;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="containter-fluid">
  <div class=" justify-content-center" style="width:60%; margin-left:20%;">
    <br /><br />
    <div class="card" style="margin-top:50px;margin-bottom: 100px;">
      <div class="card-header">
        <h4>Add Category</h4>
      </div>
      <div class="card-body">
        <span id="message"></span>
        <form method="GET" id="user_register_form" action="">
          <div class="form-group">
            <label>Create Technology    </label>
            <input type="text" name="language" id="user_email_address" class="form-control" onchange="validateEmail(this); " />
          </div>
          
          <div class="form-group">
          </div>
          <br />
          <div class="form-group" align="center">
            <input type="hidden" name='page' value='register' />
            <input type="hidden" name="action" value="register" />
            <input type="submit" name="user_register" id="user_register" class="btn btn-info" value="Create" />
          </div>
        </form>
     
      </div>
    </div>
    <br /><br />
    <br /><br />
  </div>
</div>
<div style="padding-top:10%;">
  <?php include('footer.php');
  ?>
</div>

</body>

</html>
</body>
</html>