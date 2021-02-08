<!-- Navbar -->
<?php include("/opt/lampp/htdocs/onlinetestplatform/dbcon.php");
$obj = new Dbconn();
$con = $obj->createConnection();
session_start();

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style/style.css" />
<link rel="stylesheet" href="style/TimeCircles.css" />
<script src="style/TimeCircles.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ;" style="background:black;">
    <a class="navbar-brand" href="# " style="color: #1b926c;font-size: 55px;">O<span style="color:white;">nline</span>Quiz</span>
        <i class="fa fa-question" style="font-size:50px;"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../login.php" style="color:#1b926c"><b>Login</b><span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">

            </li>
            <li class="nav-item">
                <a class="nav-link" href="../register.php" style="color:white"><b>SignUp</b></a>
            </li>
            <li class="nav-item">
                <button class="btn btn-outline" style="background:	#1b926c;" type="submit"><a href="../login.php" style='
    color: #0060B6;
    text-decoration: none;
    color:white;'>Logout</a></button>
            </li>
        </ul>
    </div>
</nav>
</div>
<h2 style="text-align:center; padding:1%;">User Information </h2>
<div style="padding:2%;"></div>
<!-- Navbar -->

<div>

    <?php $results = mysqli_query($con, "SELECT * FROM `choosequiz` where TotalQuestions>=10"); ?>

    <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>language</th>
                 <th>Action</th>



            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Language']; ?></td>




                    <td>
                        <?php $_SESSION['id'] = $row['id']; ?>

                        <a style="margin-left:6%;" href="start quiz.php?str=<?php echo $row['id']; ?>" class="btn btn-outline-success Sdel_btn" >start</a>

                    </td>

                </tr>
            <?php } ?>
</div>
</table>

</tbody>

</table>
</div>