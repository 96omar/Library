<?php
include'db.php';
session_start(); //session starts here  
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
        <title>Login</title>
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
                margin-bottom: -25px;
            }


        </style>
    </head>
    <body >
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
        <section style="height: auto;">
            <div class="container2" style="margin-left: -15px;">
                <img alt="lib_background" src="image/lib2.jpg" class="image3" style="width: 1535px">
                <div class="middle2">
                    <div class="text">Student Login</div>
                    <form name="login" action="" method="post">
                        <div class="imgcontainer">
                            <img src="image/b1.png" alt="login_logo" class="avatar">
                        </div>
                        <div class="login">
                            <input type="text" name="user_name2" placeholder ="Enter your Name" required=""><br><br>
                            <input type="password" name="password2" placeholder ="Enter your Password" required=""><br><br>
                            <div>
                                <div class="btn_login">
                                    <button name="login" value="login" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                        <div class="contbtn">
                            <span class="registrtionbtn" > <a style="color: white; text-decoration: none;" href="student_registration.php">New Account</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="psw">Forgot <a style="text-decoration: none;color: white;" href="student_forget_pass.php">password?</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </section>
        <footer style="height: 110px;">

            <?php
            include "./footer.php";
            ?>        </footer>
        <?php
        if (isset($_POST['login'])) {

            $count = 0;
            $userName = $_POST['user_name2'];
            $pass = $_POST['password2'];
            $res = mysqli_query($conn, "SELECT username , password FROM `student` WHERE username = '$userName' AND password = '" . sha1($pass) . "'");
            $count = mysqli_num_rows($res);
            if ($count == 0) {
                ?>
                <script type="text/javascript">
                    alert("The UserName And Password doesn't match");
                </script>
                <?php
            } else {
                $_SESSION['user_name2'] = $userName;
                ?>
                <script type="text/javascript">

                    window.location = "index.php"
                    alert("Login Success");

                </script>
                <?php
            }
        }
        ?>
    </body>
</html >
