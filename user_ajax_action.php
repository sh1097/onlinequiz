<?php include("dbcon.php"); ?>
 
<?php

session_start();

$obj = new Dbconn();
$data = $obj->createConnection();
echo  $mob = $_POST['mobile1'];
echo  $add = $_POST['address'];
echo $email_id = $_POST['email'];
echo $name = $_POST['name'];
echo $password = $_POST['password'];

$sql1 = ("select *from admin where emailid='$email_id'or mobile='$mob'");
$result = mysqli_query($data, $sql1);

if (mysqli_num_rows($result) > 0) {
  echo "record already exists";
} else {
  $sql1 = "INSERT INTO `admin` ( `emailid`, `password`, `name`, `Address`, `mobile`,`is_admin',`active') VALUES ('$email_id', '$password', '$name', '$add', '$mob','0','1')";

  $result = $data->query($sql1);
  echo "registration success";
  return $sql;
}
