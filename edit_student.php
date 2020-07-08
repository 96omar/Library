<?php
include 'db.php';

session_start();

if (!$_SESSION['user_name3']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $edit_sql = "select * FROM student WHERE id='" . $_GET['edit_id'] . "'";
    $run_sql = mysqli_query($conn, $edit_sql);
    while ($raws = mysqli_fetch_array($run_sql)) {
        $edFirstName = $raws['first name'];
        $edLastName = $raws['last name'];
        //$edUserName = $raws['username'];
        $edEmail = $raws['email'];
        $edRoll = $raws['roll'];
    }
} else {
    $edFirstName = '';
    $edLastName = '';
    //$edUserName = '';
    $edEmail = '';
    $edRoll = '';
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

        <title>Edit Books</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <style>
        section{
            margin-top: -20px;
            margin-right: -20px;
        }
        .bg {
            /* The image used */
            background-image: url("image/cover.jpg");

            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <body>

         <?php include './nav.php';
        ?>

        <section style = "width: 1520px">
            <div class="bg">
                <div class="container" style="float: right;padding-left: 400px">
                    <h1 class="text3" style="margin-right: 0px;font-size: 50px">Student Raw</h1>
                    <form class="form-horizontal" action="" method="post" role="form" style="font-size: 20px">
                        <div class="form-group">
                            <label for="name" class="control-label col-sm-3">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="frname" class="form-control" value="<?php echo $edFirstName; ?>" placeholder="Enter Fist Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-3">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="laname" class="form-control" value="<?php echo $edLastName; ?>" placeholder="Enter last Name" required>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" value="<?php echo $edEmail; ?>" placeholder="Enter Email adress">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Roll</label>
                            <div class="col-sm-6">
                                <input type="text" name="roll" class="form-control" value="<?php echo $edRoll; ?>" placeholder="Enter Roll">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary mb-2" name="btn"><span class="glyphicon glyphicon-floppy-disk"></span> Update Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        if (isset($_POST['btn'])) {
            $edFirstName = $_POST['first name'];
            $edLastName = $_POST['last name'];
            //$edUserName = $raws['username'];
            $edEmail = $_POST['email'];
            $edRoll = $_POST['roll'];

            $ins_sql = "UPDATE `student` SET `first name`='$edFirstName',`last name`='$edLastName',`email`='$edEmail',`roll`='$edRoll' WHERE id = '$id'";
            $run_sql = mysqli_query($conn, $ins_sql);

            if (!$run_sql) {
                die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
                ?>
                <script type="text/javascript">
                    alert("Please Try Update student Again");
                    window.location = "student_details.php"
                </script>
                <?php
            } else {
                /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
                ?>
                <script type="text/javascript">
                    alert("Student Update Successfully");
                    window.location = "admin_index.php"
                </script>
                <?php
            }
        }
        ?>

        <footer style="width: 1520px; height: 130px">

            <?php
            include "./footer.php";
            ?>
        </footer>
    </body>
</html>
