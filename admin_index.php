
<?php
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
        <title>
            Library Management system
        </title>

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>
            section{
                margin-top: -20px;
                margin-right: -20px;
            }
            body, html {
                height: 100%;
                margin: 0;
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
            .container3 {
                position: relative;
                font-family: Arial;
            }

            .text-block {
                position: absolute;
                bottom: 500px;
                right: 20px;
                background-color: black;
                color: white;
                padding-left: 150px;
                padding-right: 150px;
                padding-top: 50px;
                padding-bottom: 50px;
                opacity: 0.6;
            }
            .container3:hover img {
                opacity: 0.7;
            }

        </style>
    </head>
    <body>
        <?php include './nav.php';
        ?>
        <section style="height: auto;">


            <div class="container3">
                <img src="image/cover.jpg" alt="admin console" style="width:100%;">
                <div class="text-block">
                    <h2>Welcome To Admin console</h2>

                </div>
            </div>
        </section>

        <footer style="height: 135px;">
            <?php
            include "./footer.php";
            ?></footer>
    </body>
</html>
