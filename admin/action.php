<?php include("/opt/lampp/htdocs/onlinetestplatform/dbcon.php");
$obj = new Dbconn();
$con = $obj->createConnection();
session_start();

if (isset($_GET['user_register'])) {
    print_r($_GET);
    $ques = $con->real_escape_string($_GET['user_ques']);
    $opt1 = $con->real_escape_string($_GET['opt1']);
    $opt2 = $con->real_escape_string($_GET['opt2']);
    $opt3 = $con->real_escape_string($_GET['opt3']);
    $opt4 = $con->real_escape_string($_GET['opt4']);
 echo $topic = ($_GET['topic']);
   $cranswer = $_GET['crans'];

    $sql1 = ("SELECT * FROM `question_table` WHERE  question='$ques'");
    $result = mysqli_query($con, $sql1);
if (mysqli_num_rows($result) > 0) {
        echo "record already exists";
    } else {
        $sql1 = "INSERT INTO `question_table` (`question`, `option1`, `option2`, `option3`, `option4`, `cranswer`, `topic_id`) VALUES ( '$ques', '$opt1', '$opt2', '$opt3', '$opt4', '$cranswer', '$topic')";

        $result = $con->query($sql1);
          $_SESSION['ques_id'] = $result['ques_id'];
          echo "<script> alert('data inserted successfully');</script>";

     
      
   
       header('location:index.php');

    }
}


$sl = "select ques_id from question_table ";
$result = mysqli_query($con, $sl);
while ($row = $result->fetch_assoc()) {

    $_SESSION['id'] = ($row);
}

