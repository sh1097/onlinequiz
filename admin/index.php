<!-- Navbar -->
<?php include("/opt/lampp/htdocs/onlinetestplatform/dbcon.php");
session_start();
include('header.php');
$obj = new Dbconn();
$con = $obj->createConnection();

?>

<h2 style="text-align:center; padding:1%;">User Information </h2>
<div style="padding:2%;"></div>

<?php $results = mysqli_query($con, "SELECT * FROM  results  ");
$cont = 0; ?>
<table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Username</th>
            <th>Correct Answer</th>
            <th>Wrong Answer</th>
            <th>Total Score</th>



        </tr>
    </thead>

    <tbody>
        <?php while ($row = mysqli_fetch_array($results)) {
            $cont++;
        ?>
            <tr>
                <td><?php echo $cont; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['correctanswer']; ?></td>
                <td><?php echo $row['wronganswer']; ?></td>
                <td><?php echo $row['Total_Score']; ?></td>



            </tr>
        <?php } ?>

        </div>
</table>

</tbody>

</table>
</div>
<div style="padding-top:10%;">
    <?php include('../footer.php');
    ?>
</div>