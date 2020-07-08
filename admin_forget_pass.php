<?php
include './db.php';
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
            max-width: 900px;
            height: 400px;
            margin: auto;
            text-align: center;
            font-family: arial;
            padding-top: 30px;

        }

        .circle {
            margin: auto;
            text-align: center;
            height: 150px;
            width: 150px;
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
            width: 100px;
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
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">

                <ul class="nav navbar-nav">


                    <div class="navbar-header" style="padding-right: 20px;font-size: 50px;font-family: 'Comic Sans MS', cursive, sans-serif;">
                        <a href="index.php" ><img alt="book_logo" src="image/book.png" class="imlogo"></a>
                        <a class="navbar-brand" href="index.php">Maktabtk</a>
                    </div>

                    <li ><a style="text-decoration: none; font-size: 20px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

                </ul>


            </div>
        </nav>
        <section style="">

            <h3 class="text3" style="font-size: 30px">Rest Your Password</h3>
            <div class="card">
                <div class="circle">
                    <img src="image/admin.png" alt="user" style="width:140px;height: 140px; padding: 20px;">
                </div>

                <form class="form-horizontal" action="" method="post" role="form" style="max-width: 800px;text-align: center;margin-left: 320px;margin-top: 50px">                 

                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="email" name="em_ail" class="form-control" value="" placeholder="Enter Your Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="user_name" class="form-control" value="" placeholder="Enter Your User Name" required>
                        </div>
                    </div>
                    <button type="submit" name="btnn" style="margin: auto;max-width: 100%;margin-left: -320px;">Check</button>
                </form>
            </div>
        </section>
        <?php
        if (isset($_POST['btnn'])) {
            $user = $_POST['user_name'];
            $mail = $_POST['em_ail'];
            $sql = "SELECT * FROM `admin` WHERE username = '$user';";
            $run_sql = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($run_sql);
            if ($count == 0) {
                echo '<p style="color: red;background-color: white;text-align: center; ">User Name and Password Not Exist</p>';
            } else {
                while ($raws = mysqli_fetch_array($run_sql)) {
                    $edtStudentEmail = $raws['email'];
                    $edtStudentUserName = $raws['username'];
                }
                if ($user == $edtStudentUserName and $mail == $edtStudentEmail) {
                    ?>
                    <script type="text/javascript">
                       
                        window.location = "admin_reset_password.php?id_user=<?php echo $edtStudentUserName;?>"
                    </script>
                    <?php
                } else {
                    echo '<b><p style="color: red;background-color: white;text-align: center; ">User Name and Password Not Exist</p></b>';
                }
            }
        }
        ?>
        <footer style="height: 135px;">
            <?php
            include "./footer.php";
            ?></footer>
    </body>
</html>
