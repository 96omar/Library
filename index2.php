
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
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>
            section{
                margin-top: -20px;
                margin-right: -20px;
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
                    <li class="active"><a style="text-decoration: none; font-size: 20px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>


                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none;font-size: 20px;" href=""><span class="glyphicon glyphicon-log-in"> Login <span class="caret"></span></span></a>
                        <ul class="dropdown-menu">
                            <li><a  href="student_signin.php">As Student</a></li>
                            <li class="divider"></li>
                            <li><a  href="admin_signin.php">As Admin</a></li>              
                        </ul>
                    </li>

                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none;font-size: 20px;" href=""><span class="glyphicon glyphicon-user"> SignUp <span class="caret"></span></span></a>
                        <ul class="dropdown-menu">
                            <li><a  href="student_registration.php">As Student</a></li>
                            <li class="divider"></li>
                            <li><a  href="admin_registration.php">As Admin</a></li>              
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
        <section style="height: auto;  ">
            <div class="container2" style="margin-left: -15px;">
                <img alt="lib_background" src="image/lib3.jpg" class="image" style="width: 1535px;height: 690px;">

                <div class="middle">
                    <div class="text">Welcome To Maktabtk</div><br><br>
                    <h1 style="text-align: center; font-size: 30px;color: whitesmoke;">Open at : 07:00 AM</h1><br>
                    <h1 style="text-align: center; font-size: 30px;color: whitesmoke;">Closes at : 06:00 PM</h1><br>

                </div>

            </div>

        </section>
        <footer style="height: 135px;">
            <?php
            include "./footer.php";
            ?></footer>

        <?php
// put your code here
        ?>
    </body>
</html>
