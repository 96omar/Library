<?php
include 'db.php';

session_start();

if (!$_SESSION['user_name3']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}
if (isset($_GET['id_del'])) {
    $sqldelete = "DELETE FROM massage WHERE id='" . $_GET['id_del'] . "'";
    $run_sql = mysqli_query($conn, $sqldelete);
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

        <title>Massages</title>
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

        <section style = "width: 1520px;overflow: scroll;">
            <div class = "container">
                <h1 class = "text3">Student Massages</h1>
            </div>
            <div class = "container" style = "width: 1400px; margin-top: 5px">
                <table class = "table table-hover"  >

                    <?php
                    $count2 = 0;
                    $sql = "SELECT * FROM `massage` WHERE sender = 'student' and status = 'no' GROUP BY `username`";
                    $run_sql = mysqli_query($conn, $sql);
                    $count2 = mysqli_num_rows($run_sql);
                    if ($count2 == 0) {
                        ?>
                        <thead style="font-size: 18px;color: whitesmoke; background-color: midnightblue;">


                        <th>Result</th>                       
                        <th>Respond</th>

                        </thead>
                        <tbody>
                            <?php
                            echo '<tr><td style = "color:midnightblue;font-size:20px;font-weight:bold;">No New Massages Found</td>'
                            . '<td><a class="btn btn-info btn-xs" href="admin_all_massages.php">Check All Massages</a></td></tr>';
                            ?>
                        </tbody>
                        <?php
                        } else {
                            ?>
                        <thead style="font-size: 18px;color: whitesmoke; background-color: midnightblue;">


                        <th>Id</th>
                        <th>User Name</th>
                        <th>Massage</th>
                        <th>Respond</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($raws = mysqli_fetch_array($run_sql)) {
                                echo '<tr>
                                    <td>' . $raws['id'] . '</td>
                                    <td>' . $raws['username'] . '</td>
                                    <td>' . $raws['massage'] . '</td>'

                                ;
                                echo'<td><a class="btn btn-info btn-xs" href="admin_massage_send.php?id=' . $raws['id'] . '& user=' . $raws['username'] . ' ">Respond</a></td>
                            <td><a class="btn btn-danger btn-xs"href="admin_massage.php?id_del=' . $raws['id'] . '">Delete</a></td>
                            </tr>';
                            }
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
