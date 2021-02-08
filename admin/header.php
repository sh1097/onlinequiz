<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/TimeCircles.css" />
    <script src="style/TimeCircles.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ;" style="background:black;">
    <a class="navbar-brand" href="../index.php " style="color: #1b926c;font-size: 55px;">O<span style="color:white;">nline</span>Quiz</span>
        <i class="fa fa-question" style="font-size:50px;"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          
            <li class="nav-item active">
                <a class="nav-link" href="createcategory.php" style="color:#1b926c"><b>Create Category</b><span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link" href="Add question.php" style="color:white"><b>Add Question</b></a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php" style="color:white"><b>User Detail</b></a>
            </li>
            <li class="nav-item">
                <button class="btn btn-outline" style="background:#1b926c;" type="submit"><a href="../login.php" style='
    color: #0060B6;
    text-decoration: none;
    color:white;'>Logout</a></button> </li>
        </ul>
    </div>
</nav>
</div>