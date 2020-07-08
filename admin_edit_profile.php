<?php
include './db.php';
session_start();

if (!$_SESSION['user_name3']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}
$user = $_SESSION['user_name3'];
$sql = "SELECT * FROM `admin` WHERE username = '$user';";
$run_sql = mysqli_query($conn, $sql);

while ($raws = mysqli_fetch_array($run_sql)) {
    $edtStudentFirstName = $raws['first'];
    $edtStudentLastName = $raws['last'];
    $edtStudentEmail = $raws['email'];
    $edtStudentUserName = $raws['username'];
    $edtStudentRoll = $raws['contact'];
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
        <title>Student Edit Profile</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <style type="text/css">

        section{
            margin-top: -20px;
            margin-right: -20px;
        }
        .card {
            background-color: silver;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 900px;
            height: auto;
            margin: auto;
            text-align: center;
            font-family: arial;
            padding-top: 30px;

        }

        .circle {
            margin: auto;
            text-align: center;
            height: 200px;
            width: 200px;
            background-color: whitesmoke;
            border-radius: 50%;
        }

        

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: teal;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            margin-top: 30px;
        }

        

        button:hover{
            opacity: 0.7;
        }
        .card:hover{
            opacity: 0.9;
        }
       
    </style>
    <body>
        <?php 
        include './nav.php';
        ?>
        <section style="height: auto;">

            <h3 class="text3" style="font-size: 30px">Edit Your Profile</h3>
            <div class="card">
                <div class="circle">
                    <img src="image/admin.png" alt="user" style="width:200px; height: 200px; padding: 20px;">
                </div>

                <form class="form-horizontal" action="admin_update_profile.php" method="post" role="form" style="max-width: 800px;text-align: center;margin-left: 300px;">

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label col-sm-3" style="text-align: center; width: 200px;margin-left: 50px"><b> User Name : </b><?php echo $edtStudentUserName; ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="f_name" class="form-control" value="<?php echo $edtStudentFirstName; ?>" placeholder="Enter " required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="l_name" class="form-control" value="<?php echo $edtStudentLastName; ?>" placeholder="Enter " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="email" name="e_mail" class="form-control" value="<?php echo $edtStudentEmail; ?>" placeholder="Enter " required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="r_oll" class="form-control" value="<?php echo $edtStudentRoll; ?>" placeholder="Enter " required>
                        </div>
                    </div>
                    <button type="submit" name="btn_Save" style="margin: auto;max-width: 100%;margin-left: -320px;"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>




            </div>
        </section>

        <footer style="height: 135px;">
            <?php
            include "./footer.php";
            ?></footer>
    </body>
</html>
