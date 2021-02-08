<?php
session_start();
error_reporting(0);
include("header.php");
$user = $_SESSION['user'];

if (isset($_POST)) {
    $arr = ($_POST);
}
echo $id = $_SESSION['id'];
$user = $_SESSION['user'];



include_once("/opt/lampp/htdocs/onlinetestplatform/dbcon.php");
include("/opt/lampp/htdocs/onlinetestplatform/class.php");

$obj = new Dbconn;
$con = $obj->createConnection();
$show = new user1();
$raw = $show->showdata();
//print_r($raw);

?>
<h3 style='text-align:center;'>Your Result</h3>
<div style='padding:2%;'></div>
<?php
$score = 0;
$wrong = 0;
$correct = 0;
$sql = "SELECT * FROM question_table  ";
if ($result = $con->query($sql)) {

    while ($row = $result->fetch_assoc()) {

        $daata = ($_POST);

        foreach ($daata as $key => $val) {


            if ($val == $row['cranswer']) {
                $score = $score + 4;
                $correct = $correct + 1;

                $_SESSION['score'] = $score;
            } else {
                $wrong = $wrong + 1;
            }
        }
    }
    $i = 1;
    foreach ($daata as $key1 => $val1) {
        echo "<pre>";


        echo "</pre>";
    }
    if ($score < 20) {
        echo "<div class='show' style='text-align:center ; color:red ;margin-left:25%; baorder:1px;width:50%; height:50%;'>";
        echo "<h2>you are fail" . "</h2>";
        echo "<h1>your score is :$score</h2>";
        echo "  <button type='submit' class='btn btn-primary'><a href='index.php' style='
    color: #0060B6;
    text-decoration: none;
    color:white;'>Restart</a></button>";
        echo "</div>";
    } else {
        echo "<div class='show' style='text-align:center ; color:green;margin-left:25%; baorder:1px;width:50%; height:50%;'>";
        echo "<h2>you are passed" . "</h2>";
        echo "<h1>your score is :$score</h2>";

        echo "  <button type='submit' class='btn btn-primary col-5'><a href='index.php'style='
  color: #0060B6;
  text-decoration: none;
  color:white;'>Restart</a></button>";
        echo "</div>";
    }
}

?>

<?php
$sql = "SELECT `question_table`.*,`choosequiz`.* FROM question_table JOIN choosequiz ON `question_table`.`topic_id` = `choosequiz`.`id` where question_table.topic_id='$id' ";
$result = $con->query($sql);

$count = 0;
$count = mysqli_num_rows($result);
$correct;
$wrong = $count - $correct;
$score;
($email = $user['emailid']);

$sql1 = ("SELECT * FROM `results` WHERE  username='$email'");
$result = mysqli_query($con, $sql1);
if (mysqli_num_rows($result) > 0) {


    $sql1 = "UPDATE `results` SET `correctanswer` = '$correct', `wronganswer` = '$wrong', `Total_Score` = '$score' WHERE `results`.`username` = '$email'";
    if ($con->query($sql1) == TRUE) {
        echo "<script>alert('successfully updated')</script>";
    }
} else {

    $sql1 = "INSERT INTO `results` ( `username`, `correctanswer`, `wronganswer`, `Total_Score`) VALUES ( '$email', '$correct', '$wrong', '$score') ";
    $result = $con->query($sql1);


    echo "data entered successfully";
}
