<?php
include './db.php';
session_start();

if (!$_SESSION['user_name2']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
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
        <title>Student Profile</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
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
            max-width: 1100px;
            max-height: 1200px;
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

        .title {
            color: black;
            font-size: 18px;
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
        .contan{
            float: right;
        }

    </style>
    <body>
        <?php
        $user = $_SESSION['user_name2'];
        $sql = "SELECT COUNT(status) as total FROM `massage` WHERE status = 'no' and username = '$user' and sender = 'admin';";
        
        $run_sql = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($run_sql);

        ?>
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">

                <ul class="nav navbar-nav">

                    <a href="index.php" ><img alt="book_logo" src="image/book.png" class="imlogo"></a>

                    <li><a style="text-decoration: none; font-size: 20px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="books.php"><span class="glyphicon glyphicon-menu-hamburger"></span> Books</a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="student_pdf_viewer.php"><span class="glyphicon glyphicon-file"></span> PDF Books</a></li>
                    <li ><a style="text-decoration: none;font-size: 20px;" href="student_clicked_pdf.php"><span class="glyphicon glyphicon-download-alt"></span> My Downloaded PDF Books</a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="feedback.php"><span class="glyphicon glyphicon-pencil"></span> Feedback</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                     <li><a href="student_massage.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp; <span class="badge bg-green"><?php echo $data['total']; ?></span></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle"  data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-user" style="font-size: 25px"></span>    &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['user_name2']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="student_profile.php"><span class="glyphicon glyphicon-user"> Profile</span> </a></li>
                            <li class="divider"></li>
                            <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
        <section>

            <h3 class="text3" style="font-size: 30px">Your Profile</h3>
            <div class="card">
                <div class="circle">
                    <img src="image/b1.png" alt="user" style="width:180px;height: 180px; padding: 20px;">
                </div>
                <table class="w3-table w3-bordered" style="width: 400px;text-align: center;margin: auto;color: #333333;">


                    <?php
                    $user = $_SESSION['user_name2'];
                    $sql = "SELECT * FROM `student` WHERE username = '$user';";
                    $run_sql = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, "SELECT count(DISTINCT `book name`) as total FROM `select_pdf` WHERE username = '$user' ORDER BY `book name`,`author` DESC");
                    $data = mysqli_fetch_assoc($result);

                    while ($raws = mysqli_fetch_array($run_sql)) {

                        echo '<tr><td><b>Name :</b></td><td>' . $raws['first name'] . ' ' . $raws['last name'] . '</td></tr>';
                        echo '<tr><td><b>User Name :</b></td><td>' . $raws['username'] . '</td></tr>';
                        echo '<tr><td><b>Email :</b></td><td>' . $raws['email'] . '</td></tr>';
                        echo '<tr><td><b>Roll :</b></td><td>' . $raws['roll'] . '</td></tr>';
                        echo '<tr><td><b>Downloaded Books :</b></td><td>' . $data['total'] . '</td></tr>';
                    }
                    
                    ?>

                </table>
                <form action="student_edit_profile.php" >
                    
                    <p><button>Edit Profile</button></p>
                </form>
            </div>
        </section>
        <footer style="height: 135px;">
            <?php
            include "./footer.php";
            ?></footer>
    </body>
</html>
