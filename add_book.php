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

        <title>Edit Books</title>
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
            background-image: url("image/add.jpg");

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

        <section style = "width: 1520px">
            <div class="bg">
                <div class="container" style="float: right;padding-left: 400px">
                    <h1 class="text3" style="margin-right: 0px;font-size: 50px;color: #333333">Book Raw</h1>
                    <form class="form-horizontal" action="add_book_process.php" method="post" role="form" style="font-size: 20px">
                        <div class="form-group">
                            <label for="name" class="control-label col-sm-3">Bid</label>
                            <div class="col-sm-6">
                                <input type="text" name="bid" class="form-control" value="" placeholder="Enter bid" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-3">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" value="" placeholder="Enter Name Of Book" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Authors</label>
                            <div class="col-sm-6">
                                <input type="text" name="authors" class="form-control" value="" placeholder="Enter Name Of Authors">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Edition</label>
                            <div class="col-sm-6">
                                <input type="text" name="edition" class="form-control" value="" placeholder="Enter Edition of The Book">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Status</label>
                            <div class="col-sm-6">
                                <input type="text" name="status" class="form-control" value="" placeholder="Enter Status">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Quantity</label>
                            <div class="col-sm-6">
                                <input type="text" name="quantity" class="form-control" value="" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Department</label>
                            <div class="col-sm-6">
                                <input type="text" name="department" class="form-control" value="" placeholder="Enter Department">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary mb-2" name="btn"><span class="glyphicon glyphicon-floppy-disk"></span> Add Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <footer style="width: 1520px; height: 130px">

            <?php
            include "./footer.php";
            ?>
        </footer>
    </body>
</html>
