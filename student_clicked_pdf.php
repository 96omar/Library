<?php
include 'db.php';

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

        <title>My PDF</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <style>
        section{
            margin-top: -20px;
            margin-right: -20px;
        }
        .bg {
            /* The image used */
            background-image: url("image/pdf.jpg");

            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
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

                    <li ><a style="text-decoration: none; font-size: 20px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="books.php"><span class="glyphicon glyphicon-menu-hamburger"></span> Books</a></li>
                    <li><a style="text-decoration: none;font-size: 20px;" href="student_pdf_viewer.php"><span class="glyphicon glyphicon-file"></span> PDF Books</a></li>
                    <li class="active"><a style="text-decoration: none;font-size: 20px;" href="student_clicked_pdf.php"><span class="glyphicon glyphicon-download-alt"></span> My Downloaded PDF Books</a></li>
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

        <section style = "width: 1520px;height: 700px;">
            <div class = "container">
                <h1 class = "text3">Lists of Downloded PDF Books</h1>
            </div>
            <div class = "container" style = "width: 1400px; margin-top: 5px">
                <table class = "table table-hover"  >
                    <thead style="font-size: 18px;color: whitesmoke; background-color: darkslateblue;">


                    <th>Book Name</th>
                    <th>Authors</th>
                    <th>Downloaded</th>
                    <th>Total Books</th>
                    

                    </thead>
                    <tbody>
                        <?php
                        $user = $_SESSION['user_name2'];
                        $sql = "SELECT DISTINCT `book name`, `author` FROM `select_pdf` WHERE username = '$user' ORDER BY `book name`,`author` DESC";
                        $run_sql = mysqli_query($conn, $sql);
                        
                        $result=mysqli_query($conn,"SELECT count(DISTINCT `book name`) as total FROM `select_pdf` WHERE username = '$user' ORDER BY `book name`,`author` DESC");
                        $data=mysqli_fetch_assoc($result);
                            //echo $data['total'];

                        while ($raws = mysqli_fetch_array($run_sql)) {
                            $bookName = $raws['book name'];
                            $authorName = $raws['author'];
                            
                            echo '<tr>
                                    <td>' .$bookName . '</td>
                                    <td>' . $authorName . '</td>
                                    <td><p><span class="glyphicon glyphicon-download-alt"></span> Downloaded</p></td>
                                    ';
                            
                        }
                        echo '<td><b style = "font-size : 18px; color:darkslateblue;">'.$data['total'].' Books</b></td></tr>';
                        ?>


                    </tbody>
                </table>
            </div>


        </section>
        <?php
        ?>

        <footer style="width: 1520px; height: 130px">

            <?php
            include "./footer.php";
            ?>
        </footer>
    </body>
</html>
