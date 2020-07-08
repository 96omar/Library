<?php
include'db.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>
    <style type="text/css">

    </style>
    <body>
        <?php
        
        $sql = "SELECT COUNT(status) as total FROM `massage` WHERE status = 'no' and sender = 'student';";
        
        $run_sql = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($run_sql);

        ?>
        <nav class="navbar navbar-inverse" style="font-size: 18px">
            <div class="container-fluid">
                <div class="navbar-header" style="padding-right: 20px;font-size: 30px;font-family: 'Comic Sans MS', cursive, sans-serif;">
                    <a class="navbar-brand" href="admin_index.php">Maktabtk</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li ><a href="admin_index.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-menu-hamburger"></span> Books <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="add_book.php"><span class="glyphicon glyphicon-plus-sign"></span>  Add Books</a></li>
                                <li><a href="admin_book.php"><span class="glyphicon glyphicon-cog"></span>  Edit Books</a></li>
                            </ul>
                        </li>
                        <li><a href="student_details.php"><span class="glyphicon glyphicon-user"></span>  Students Details</a></li>
                        <li><a href="admin_pdf_books.php"><span class="glyphicon glyphicon-file"></span>  PDF Books</a></li>   
                        <li><a href="admin_view_downloaded_pdf.php"><span class="glyphicon glyphicon-download-alt"></span>  Downloaded Books</a></li>  
                        <li><a href="view_feedback.php"><span class="glyphicon glyphicon-list-alt"></span>  View FeedBack</a></li> 	
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="admin_massage.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp; <span class="badge bg-green"><?php echo $data['total']; ?></span></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px"></span>    &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['user_name3']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="admin_profile.php"><span class="glyphicon glyphicon-user"> Profile</span> </a></li>
                                <li class="divider"></li>
                                <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>
