<?php
include 'db.php';

session_start();

if (!$_SESSION['user_name2']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}

if (isset($_GET['mylink'])) {
    $re = $_GET['mylink'];
    $sql1 = "SELECT * FROM `pdf` WHERE ref = '$re'";
    $run_sql1 = mysqli_query($conn, $sql1);

    while ($raws1 = mysqli_fetch_array($run_sql1)) {
        $bookName = $raws1['name'];
        $authorName = $raws1['authors'];
    }
    $user = $_SESSION['user_name2'];
    $sql2 = "SELECT * FROM `student` WHERE username = '$user'";
    $run_sql2 = mysqli_query($conn, $sql2);

    while ($raws2 = mysqli_fetch_array($run_sql2)) {
        $userFirstName = $raws2['first name'];
    }

    $ins_sql = "INSERT INTO select_pdf VALUES ('' ,'$user', '$userFirstName' ,'$bookName', '$authorName')";
    $run_sql3 = mysqli_query($conn, $ins_sql);

    if (!$run_sql3) {
        die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
        echo 'Error';
    } else {
        //echo json_encode(array('result' => true, 'message' => 'Entered data successfully'));
        ?>

        <iframe src="<?php echo $re; ?>" width="100%" height="500px">
        </iframe>
        <script type="text/javascript">

            window.location = "student_pdf_viewer.php"
           

        </script>
        <?php
    }
} else {
    echo '<h1 style = "color:red;">Error loading</h1>';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
