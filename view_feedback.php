<?php
include'db.php';
session_start();

if (!$_SESSION['user_name3']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}

if (isset($_GET['id_del'])) {
    $sqldelete = "DELETE FROM feedback WHERE id='" . $_GET['id_del'] . "'";
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
        <meta charset="UTF-8">
        <title>View Feedback</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
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
    <body>
        <?php include './nav.php';
        ?>

        <section style = "width: 1520px;">
            <div class = "container">
                <h1 class = "text3">List of Feedback </h1>
            </div>

            <div class = "container" style = "width: 1400px; margin-top: 5px">
                
                <table class = "table table-hover"  >
                    <thead style="font-size: 18px;color: whitesmoke; background-color: midnightblue;">
                    <th>Id</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Country</th>
                    <th>Subject</th>                   
                    <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `feedback`;";
                        $run_sql = mysqli_query($conn, $sql);

                        while ($raws = mysqli_fetch_array($run_sql)) {
                            echo '<tr>
                                    <td>' . $raws['id'] . '</td>
                                    <td>' . $raws['username'] . '</td>
                                    <td>' . $raws['first name'] . '</td>
                                    <td>' . $raws['last name'] . '</td>
                                    <td>' . $raws['country'] . '</td>
                                    <td>' . $raws['subject'] . '</td>
                                    
                                   '
                            ;
                            echo'
                            <td><a class="btn btn-danger btn-xs"href="view_feedback.php?id_del=' . $raws['id'] . '">Delete</a></td>
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
