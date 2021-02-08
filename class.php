<?include_once("/opt/lampp/htdocs/onlinetestplatform/dbcon.php");?>
<?php

session_start();
error_reporting(0);

$lang = $_SESSION['language'];
class user1 extends   Dbconn
{
  public $conn;
  public $arr;
  public function __construct()
  {
    $dbcon = new Dbconn();
    $this->conn = $dbcon->createConnection();
  }

  public function datainsert($id)
  {
    $sql = "SELECT `question_table`.*,`choosequiz`.* FROM question_table JOIN choosequiz ON `question_table`.`topic_id` = `choosequiz`.`id` where question_table.topic_id='$id'";
    if ($result = $this->conn->query($sql)) {


      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
      return $rows;
    }
  }

  function login($email_id, $password)
  {
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    } else {
      $sql1 = ("select * from admin where emailid='$email_id' AND password='$password'");
      $result = mysqli_query($this->conn, $sql1);
      if (mysqli_num_rows($result) > 0) {
        echo  $row = mysqli_fetch_array($result);
        if ($row['is_admin'] == 1) {
          $_SESSION['admin'] = $row;
          return 2;
        } else {
          if ($row['is_admin'] == 0) {

            if ($row['active'] == 1) {

              return 1;
            } else {
              return 0;
            }
          }
        }
      }
    }
  }
  public function showdata()
  {
    $sql1 = ("select * from admin ");
    $result = mysqli_query($this->conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
      return $rows;
    }
  }
  function createcategory($lang)
  {
    
    $sql1 = ("SELECT * FROM `choosequiz` WHERE language='$lang' ");
    $result = mysqli_query($this->conn, $sql1);
  
    if (mysqli_num_rows($result) > 0) {
      echo "<script> alert('data alrady exits');</script>";
    }
  
    
 else {
   
      $sql1 = "INSERT INTO `choosequiz` ( `Language`, `Total Questions`) VALUES ( '$lang', '1');";

      $result = $this->conn->query($sql1);

      echo "<script> window.href.location='Add question.php';</script>";
    }
  }
  function Addcategory()
  {

    $sql1 = ("select * from choosequiz ");
    $result = mysqli_query($this->conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
      return $rows;
    }
  }
}
