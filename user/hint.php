
<?php
include("../header.php");
if(isset($_POST)){
    $arr=($_POST);
}

include_once("/opt/lampp/htdocs/online test platform/dbcon.php");
 include("/opt/lampp/htdocs/online test platform/class.php");
session_start();
 $obj=new Dbconn;
 $con=$obj->createConnection();
?>
<h3 style='text-align:center;'>Your Result</h3>
<div style='padding:2%;'></div>
<?php
$score=0;
$sql="SELECT * FROM question_table  ";  
if ($result = $con->query($sql)) {

while($row = $result->fetch_assoc())
{

$daata=($_POST);

 foreach ($daata as $key=>$val){
  
   
     if($val==$row['cranswer']){
         $score=$score+4;
     }
 }
}
$i=1;
foreach($daata as $key1=>$val1){
    echo "<pre>";

 
    echo "</pre>";
}if($score<10){
    echo"<div class='show' style='text-align:center ; color:red ;margin-left:25%; baorder:1px;width:50%; height:50%;'>";
    echo "<h2>you are fail"."</h2>";
    echo "<h1>your score is :$score</h2>";
    echo"  <button type='submit' class='btn btn-primary'><a href='index.php' style='
    color: #0060B6;
    text-decoration: none;
    color:white;'>Restart</a></button>";
  echo "</div>";
}
else{
    echo"<div class='show' style='text-align:center ; color:green;margin-left:25%; baorder:1px;width:50%; height:50%;'>";
    echo "<h2>you are passed"."</h2>";
    echo "<h1>your score is :$score</h2>";
  
  echo"  <button type='submit' class='btn btn-primary col-5'><a href='index.php'style='
  color: #0060B6;
  text-decoration: none;
  color:white;'>Restart</a></button>";
  echo "</div>";
}
 }
?>

<?php



