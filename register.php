<?php

//register.php

include('dbcon.php');


include('header.php');

?>

<div class="containter-fluid">
  <div class=" justify-content-center" style="width:60%; margin-left:20%;">
    <br /><br />
    <div class="card" style="margin-top:50px;margin-bottom: 100px;">
      <div class="card-header">
        <h4>User Registration</h4>
      </div>
      <div class="card-body">
        <span id="message"></span>
        <form method="post" id="user_register_form">
          <div class="form-group">
            <label>Enter Email Address</label>
            <input type="text" name="user_email_address" id="user_email_address" class="form-control" onchange="validateEmail(this); " />
          </div>
          <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" />
          </div>

          <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="user_name" id="user_name" class="form-control" />
          </div>

          <div class="form-group">
            <label>Enter Address</label>
            <textarea name="user_address" id="user_address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Enter Mobile Number</label>
            <input type="text" name="user_mobile_no" id="user_mobile_no" class="form-control" />
          </div>
          <div class="form-group">
          </div>
          <br />
          <div class="form-group" align="center">
            <input type="hidden" name='page' value='register' />
            <input type="hidden" name="action" value="register" />
            <input type="submit" name="user_register" id="user_register" class="btn btn-info" value="Register" />
          </div>
        </form>
        <div align="center">
          <a href="login.php">Login</a>
        </div>
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


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
  function validateEmail(emailField) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (reg.test(emailField.value) == false) {
      alert('Invalid Email Address');
      return false;
    }

    return true;

  }

  $(document).ready(function() {
    $("#user_register").click(function(e) {
      e.preventDefault();
      var mobile1 = $("#user_mobile_no").val();
      var email = $("#user_email_address").val();
      var name = $("#user_name").val();
      var address = $("#user_address").val()
      var password = $("#user_password").val();
      console.log(mobile1);
      if (email != null && name != null && password != null) {

        if (/^\d{10}$/.test(mobile1)) {
          if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
            $.ajax({
              url: 'user_ajax_action.php',
              type: 'POST',
              data: {
                mobile1: mobile1,
                email: email,
                address: address,
                password: password,
                name: name


              },
              success: function(result) {
                alert(result);
                window.location.href = 'login.php';

              }
            });

        } else {
          alert("Invalid number in  must be ten digits");

          return false;
        }
      } else {
        alert("firstly fill all fields correctly");
      }

    })
  });
</script>