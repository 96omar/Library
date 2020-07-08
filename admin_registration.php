<?php include'db.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            section{
                margin-top: -20px;

            }

            html, body{
                margin: 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">

                <ul class="nav navbar-nav">


                    <div class="navbar-header" style="padding-right: 20px;font-size: 50px;font-family: 'Comic Sans MS', cursive, sans-serif;">
                        <a href="index.php" ><img alt="book_logo" src="image/book.png" class="imlogo"></a>

                        <a class="navbar-brand" href="index.php">Maktabtk</a>
                    </div>

                    <li ><a style="text-decoration: none; font-size: 20px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <!--<li><a style="text-decoration: none;font-size: 20px;" href="books.php">Books</a></li>

                    <li><a style="text-decoration: none;font-size: 20px;" href="feedback.php">Feedback</a></li>-->
                </ul>
                <!--<ul class="nav navbar-nav navbar-right">
                    <li><a style="text-decoration: none;font-size: 20px;" href="student_signin.php"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="student_signin.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="admin_signin.php"><span class="glyphicon glyphicon-user"> SignUp</span></a></li>
                </ul>-->

            </div>
        </nav>
        <section class="body" style="height: auto;">
            <div class="container2" style="margin-left: -15px;">
                <img alt="lib_background" src="image/lib8.jpg" class="image2" style="width: 1535px;">
                <div class="middle3">
                    <div class="text3">Admin Registration</div>
                    <form name="registration" action="" method="post">
                        <div class="imgcontainer2">
                            <img src="image/sign-up.png" alt="signup_logo" class="avatar2">
                        </div>
                        <div class="reg">
                            <input class="input" type="text" name="first_name" placeholder ="Enter your First Name" required=""><br><br>
                            <input class="input" type="text" name="last_name" placeholder ="Enter your Last Name" required=""><br><br>
                            <input class="input" type="text" name="user_name" placeholder ="Enter your User Name" required=""><br><br>
                            <input class="input" type="password" name="password" placeholder ="Enter your Password" required=""><br><br>
                            <input class="input" type="email" name="email" placeholder ="Enter your Email" required=""><br><br>
                            <input class="input" type="tel" name="ph" placeholder ="Enter your Phone No" required=""><br><br>
                            <div>
                                <div class="btn_reg">
                                    <button name="adminSubmit" type="submit">Sign UP</button>
                                </div>
                            </div>
                        </div>
                        <div class="have_account">
                            <span class="psw" style="font-size: 16px;margin-top: 15px;">Already Have <a style="text-decoration: none; font-size: 14px; color: whitesmoke;" href="admin_signin.php">Account</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </section>
        <footer style="height: 120px;">

            <?php
            include "./footer.php";
            ?>
        </footer>
        <?php
        if (isset($_POST['adminSubmit'])) {
            $firName = $_POST['first_name'];
            $lasName = $_POST['last_name'];
            $usName = $_POST['user_name'];
            $aEmail = $_POST['email'];
            $passw = $_POST['password'];
            $ph = $_POST['ph'];

            $count = 0;
            $sql = "SELECT username FROM `admin`";
            $run_sql = mysqli_query($conn, $sql);
            while ($raws = mysqli_fetch_assoc($run_sql)) {
                if ($raws['username'] == $usName) {
                    $count = $count + 1;
                }
            }
            if ($count == 0) {
                $retval = mysqli_query($conn, "INSERT INTO admin VALUES ('','$firName', '$lasName', '$usName', '$aEmail', '$ph', '$passw')");
                if (!$retval) {
                    die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
                } else {
                    /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
                    
                    ?>

                    <script type="text/javascript">
                        alert("Registration Successful");
                        window.location = "admin_signin.php"
                    </script>
                    <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("The User Name Already Exist");
                </script>
                <?php
            }
        }
        ?>

    </body>
</html>
