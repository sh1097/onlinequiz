<?php
include_once("/opt/lampp/htdocs/onlinetestplatform/dbcon.php");
include("/opt/lampp/htdocs/onlinetestplatform/class.php");
session_start();
$obj = new Dbconn;
$con = $obj->createConnection();
$id = $_GET['str'];
$_SESSION['id'] = $id;
?>
<style>
  body {
    background-image: url('login.jpg');
    background-repeat: no-repeat;
    width: 100%;
    background-size: cover;
  }
</style>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<head>
  <title>Online Test Platform in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/TimeCircles.css" />
  <script src="style/TimeCircles.js"></script>
</head>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f1f1f1;
  }

  #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
  }

  h1 {
    text-align: center;
  }

  .first {

    width: 100%;
    font-size: 22px;

    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  input.invalid {
    background-color: #ffdddd;
  }

  .tab {
    display: none;
  }

  button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }


  /* .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  } */

  .step.active {
    opacity: 1;
  }


  .step.finish {
    background-color: #4CAF50;
  }
</style>

<body>
  <div style="font-size:25px;text-align:center;margin-bottom:10%;">
    Time : <span id="timer"></span></div>
  <form id="regForm" method="POST" action="result.php">
    <h1> Onilne Quiz</h1>
    <?php
    $count = 1;
    $cont = 0;
    $sql = "SELECT `question_table`.*,`choosequiz`.* FROM question_table JOIN choosequiz ON `question_table`.`topic_id` = `choosequiz`.`id` where question_table.topic_id='$id'ORDER BY rand() limit 1,11";
    if ($result = $con->query($sql)) {


      while ($row = $result->fetch_assoc()) {
        $cont++;

    ?>



        <div class="tab" id="int">Question <?php echo $count++ ?>
          <p><input placeholder="First name..." class="first" value="<?php echo  $row['question']; ?>" style="border:none;" readonly></p>

          <p><input type="radio" class="two" value="<?php echo $row['option1']; ?>" ondrop="return false" onpaste="return false" name="option<?php echo $cont; ?>" readonly><?php echo $row['option1'];  ?></p>
          <p><input type="radio" value="<?php echo $row['option2']; ?>" name="option<?php echo $cont; ?>" readonly><?php echo $row['option2']; ?></p>
          <p><input type="radio" value="<?php echo $row['option3']; ?>" name="option<?php echo $cont; ?>" readonly><?php echo $row['option3']; ?></p>
          <p><input type="radio" value="<?php echo $row['option4']; ?>" name="option<?php echo $cont; ?>" readonly><?php echo $row['option4']; ?></p>
        </div>

    <?php
      }
    } ?>
    <div style="overflow:auto;">
      <div style="float:right;">
        <input type="submit" id="btn" hidden />
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" name="sub" onclick="nextPrev(1)">Next</button>
      </div>
    </div>

    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>


    </div>

  </form>


  <script>
    var currentTab = 0;
    showTab(currentTab);

    function showTab(n) {

      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";

      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";

      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }

      fixStepIndicator(n)
    }

    function nextPrev(n) {

      var x = document.getElementsByClassName("tab");

      if (n == 1 && !validateForm()) return false;

      x[currentTab].style.display = "none";

      currentTab = currentTab + n;

      if (currentTab >= x.length) {

        document.getElementById("regForm").submit();

        return false;
      }

      showTab(currentTab);
    }

    function validateForm() {

      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");

      for (i = 0; i < y.length; i++) {

        if (y[i].value == "") {

          y[i].className += " invalid";

          valid = false;
        }
      }

      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid;
    }

    function fixStepIndicator(n) {

      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }

      x[n].className += " active";
    }


    var sec = 100;
    var time = setInterval(myTimer, 500);

    function myTimer() {
      document.getElementById('timer').innerHTML = sec + "sec left";
      sec--;
      if (sec == -1) {
        clearInterval(time);
        alert("timeout");
        document.getElementById('btn').click();
      }
    }
    $(document).ready(function() {
      $('#int').on("cut copy paste", function(e) {
        e.preventDefault();
      });
    });
  </script>

</body>

</html>