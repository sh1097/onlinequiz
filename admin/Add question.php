<?php 

include('header.php');
include('../class.php');
$array=new user1();
$array2=$array->Addcategory();

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
        		<div class="card-header"><h4>Add Questions</h4></div>
        		<div class="card-body">
        			   <span id="message"></span>
                <form method="GET" id="user_register_form"  action="action.php">
                  <div class="form-group">
                    <label>Add question</label>
                    <input type="text" name="user_ques" id="user_email_address" class="form-control"   />
                  </div>
                  <div class="form-group">
                    <label>option 1</label>
                    <input type="text" name="opt1" id="user_password" class="form-control" />
                  </div>
                  
                  <div class="form-group">
                    <label>option2</label>
                    <input type="text" name="opt2" id="user_name" class="form-control" /> 
                  </div>
                  
                  <div class="form-group">
                    <label>option3</label>
                    <textarea name="opt3" id="user_address" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>option4</label>
                    <input type="text" name="opt4" id="user_mobile_no" class="form-control" /> 
                  </div>

                  <div class="form-group">
                    <label>select category</label>
                 <select type="text" name="topic" id="user_mobile_no" class="form-control" > 
                 <?php  foreach($array2 as $key3=>$val3){
 
 
?>
                   <option value="<?php echo $val3['id'];?>"><?php echo $val3['Language'];?></option>
                   <?}?>
                 </select>
             
                  </div>
                  <div class="form-group">
                    <label>correct answer</label>
                 <input type="text" name="crans" id="user_mobile_no" class="form-control" /> 
                  </div>
                  <br />
                  <div class="form-group" align="center">
                    <input type="hidden" name='page' value='register' />
                    <input type="hidden" name="action" value="register" />
                    <input type="submit" name="user_register" id="user_register" class="btn btn-success col-12 " value="ADD " />
                  </div>
                </form>
 
      		</div>
      		<br /><br />
      		<br /><br />
		</div>
	</div>
  <div style="padding-top:10%;">
    <?php include('../footer.php');
    ?>
</div>
</body>
</html>
