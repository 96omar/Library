<?php
include './db.php';
session_start();

if (!$_SESSION['user_name3']) {

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
        <title>Admin Profile</title>
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
         <?php include './nav.php';
        ?>
        <section >

            <h3 class="text3" style="font-size: 30px">Your Profile</h3>
            <div class="card">
                <div class="circle">
                    <img src="image/admin.png" alt="user" style="width:200px;height: 200px; padding: 20px;">
                </div>
                <table class="w3-table w3-bordered" style="width: 400px;text-align: center;margin: auto;color: #333333;">
                    <?php
                    $user = $_SESSION['user_name3'];
                    $sql = "SELECT * FROM `admin` WHERE username = '$user';";
                    $run_sql = mysqli_query($conn, $sql);

                    while ($raws = mysqli_fetch_array($run_sql)) {

                        echo '<tr><td><b>Name :</b></td><td>' . $raws['first'] .' '. $raws['last'] . '</td></tr>';
                        echo '<tr><td><b>User Name :</b></td><td>' . $raws['username'] . '</td></tr>';
                        echo '<tr><td><b>Email :</b></td><td>' . $raws['email'] . '</td></tr>';
                        echo '<tr><td><b>Contact :</b></td><td>' . $raws['contact'] . '</td></tr>';
                    }
                    ?>

                </table>
                <form action="admin_edit_profile.php" >
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
