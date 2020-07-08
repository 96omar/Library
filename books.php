<?php
include'db.php';
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
        <title>Book</title>
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
            body{
                margin-bottom: -1000px;
            }
            .srch{
                padding-right: 1000px;
            }
            form.example input[type=text] {
                padding: 5px;
                font-size: 15px;
                border: 1px solid grey;
                float: left;
                width: 80%;
                background: #f1f1f1;
            }

            form.example button {
                float: left;
                width: 15%;
                padding: 5px;
                padding-top: 5px;
                background: gray;
                color: white;
                font-size: 15px;
                border: 1px solid grey;
                border-left: none;
                cursor: pointer;
            }

            form.example button:hover {
                background: #717171;

            }





        </style>
    </head>

    <body>
        <?php
        $user = $_SESSION['user_name2'];
        $sql = "SELECT COUNT(status) as total FROM `massage` WHERE status = 'no' and username = '$user' and sender = 'admin';";

        $run_sql = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($run_sql);
        ?>
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">

                <ul class="nav navbar-nav">

                    <a href="index.php" ><img alt="book_logo" src="image/book.png" class="imlogo"></a>

                    <li ><a style="text-decoration: none; font-size: 20px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li class="active"><a style="text-decoration: none;font-size: 20px;" href="books.php"><span class="glyphicon glyphicon-menu-hamburger"></span> Books</a></li>
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



        <section style = "width: 1520px">


            <div class = "container">
                <h1 class = "text3">Lists Of Books</h1>
            </div>

            <div class = "container" style = "width: 1400px; margin-top: 5px">
                <!--search bar -->
                <form class="example" action="books_process.php" style="max-width:400px">
                    <input class="form-control" type="text" placeholder="Search Books..." name="searchbar" required="">
                    <button name="searchbtn" type="submit" ><i class="fa fa-search"></i></button>
                </form>
                <table class = "table table-hover">
                    <thead style="font-size: 18px;color: whitesmoke; background-color: darkslateblue;">

                    <th>Bid</th>
                    <th>Name</th>
                    <th>Authors</th>
                    <th>Edition</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th>Department</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `books` ORDER BY `books`.name ASC;";
                        $run_sql = mysqli_query($conn, $sql);

                        while ($raws = mysqli_fetch_array($run_sql)) {
                            echo '<tr>
                                    
                                    <td>' . $raws['bid'] . '</td>
                                    <td>' . $raws['name'] . '</td>
                                    <td>' . $raws['authors'] . '</td>
                                    <td>' . $raws['edition'] . '</td>
                                    <td>' . $raws['status'] . '</td>
                                    <td>' . $raws['quantity'] . '</td>
                                    <td>' . $raws['department'] . '</td>
                                    </tr>';
                        }
                        ?>


                    </tbody>
                </table>
            </div>

        </section>
        <footer style="width: 1520px; height: 110px">

            <?php
            include "./footer.php";
            ?>
        </footer>

    </body>
</html>
