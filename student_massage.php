<?php
include 'db.php';
session_start();

if (!$_SESSION['user_name2']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}
$userr = $_SESSION['user_name2'];

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student_update_profile
 *
 * @author omark
 */
$ins_sql = "UPDATE `massage` SET `status`='yes' WHERE username = '$userr' and sender = 'admin'";
$run_sql = mysqli_query($conn, $ins_sql);
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
        <title>Chat</title>
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


        .container {
            border: 2px solid #dedede;
            background-color: lightslategrey;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            margin: 0 auto;
              
            

        }
        .container:hover{
            opacity: 0.6;
        }

        .darker {
            border-color: #ccc;
            background-color: steelblue;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #aaa;
            color: whitesmoke;
        }

        .time-left {
            float: left;
            padding-top : 20px;
            color: whitesmoke;
        }
        
        .open-button {
            
         
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 20px;

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

        <section style="overflow: scroll;">

            <h2 class="text3">Chat Messages</h2>
            <?php
            if (isset($_GET['btn2'])) {

                $massage = $_GET['masg'];
                $user = $_SESSION['user_name2'];

                $ins_sql = "INSERT INTO massage VALUES ('' ,'$user', '$massage', 'no' , 'student')";
                $run_sql = mysqli_query($conn, $ins_sql);

                if (!$run_sql) {
                    die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
                    ?>
                    <script type="text/javascript">
                        alert("Please Try Enter your massage Again");
                        window.location = "Student_massage.php"
                    </script>
                    <?php
                } else {
                    /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
                    ?>
                    <script type="text/javascript">

                        window.location = "Student_massage.php"
                    </script>
                    <?php
                }
            } else {
                $user2 = $_SESSION['user_name2'];
                $sql2 = "SELECT * FROM `massage` WHERE username = '$user2';";

                $run_sql2 = mysqli_query($conn, $sql2);
                $data = mysqli_fetch_assoc($run_sql2);
                while ($raws = mysqli_fetch_array($run_sql2)) {


                    if ($raws['sender'] == 'student') {
                        $massage_student = $raws['massage'];
                        ?>

                        <div class="container">
                            <img src="image/b1.png" alt="Avatar" style="width:100%;">
                            <p><?php echo $massage_student; ?></p>
                            <span class="time-right">Student / <?php echo $userr; ?></span>
                        </div><br>
                        <?php
                    } elseif ($raws['sender'] == 'admin') {
                        $massage_admin = $raws['massage'];
                        ?>

                        <div class="container darker">
                            <img src="image/admin.png" alt="Avatar" class="right" style="width:100%;">
                            <p><?php echo $massage_admin; ?></p>
                            <span class="time-left">admin</span>
                        </div><br>

                    <?php } ?>

                    <?php
                }
            }
            ?>
            <!--<div style=" margin: 0 auto; padding-bottom: 20px;">
                <button class="open-button" name="btn2"><span class="glyphicon glyphicon-send"></span>&nbsp; Send Massage</button>
            </div>-->
            <div class="open-button">
                <form class="form-inline" action="">
                    <div class="form-group">
                        <div class="col-xs-4">
                            <input type="text" class="form-control input-lg" id="pwd" style="width: 1080px;" placeholder="Enter your massage" name="masg" required="">
                        </div>
                    </div>
                     <div class="form-group">
                         
                         <button type="submit" class="btn btn-success input-lg" style="width: 100%;" name="btn2"><span class="glyphicon glyphicon-send"></span>&nbsp; Send</button>
                     </div>
                </form>
            </div>

        </section>

        <footer style="height: 135px;">
            <?php
            include "./footer.php";
            ?></footer>



    </body>
</html>
