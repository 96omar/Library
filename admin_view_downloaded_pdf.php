<?php
include 'db.php';

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

        <title>pdf downloaded</title>
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
        include './nav.php';
        ?>

        <section style = "width: 1520px;height: auto;">
            <div class = "container">
                <h1 class = "text3">Lists of student Downloaded PDF Books</h1>
            </div>
            <div class = "container" style = "width: 1400px; margin-top: 5px">
                <table class = "table table-hover"  >
                    <thead style="font-size: 18px;color: whitesmoke; background-color: midnightblue;">
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Student Name</th>
                    <th>Book Name</th>
                    <th>Authors</th>
                    <th>Downloaded</th>



                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT `id`,`username`,`name`,`book name`,`author` FROM `select_pdf` GROUP BY `book name` ORDER BY `book name`,`author` DESC";
                        $run_sql = mysqli_query($conn, $sql);

                        while ($raws = mysqli_fetch_array($run_sql)) {

                            $bookName = $raws['book name'];
                            $authorName = $raws['author'];

                            echo '<tr>
                                    <td>' . $raws['id'] . '</td>
                                    <td>' . $raws['username'] . '</td>
                                    <td>' . $raws['name'] . '</td>
                                    <td>' . $bookName . '</td>
                                    <td>' . $authorName . '</td>
                                    <td><p><span class="glyphicon glyphicon-download-alt"></span> Downloaded</p></td>
                                    </tr>';
                        }
                        
                        ?>


                    </tbody>
                </table>
            </div>


        </section>


        <footer style="width: 1520px; height: 130px">

            <?php
            include "./footer.php";
            ?>
        </footer>
    </body>
</html>
