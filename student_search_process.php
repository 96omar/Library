<?php
include'db.php';
session_start();

if (!$_SESSION['user_name3']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}
if (isset($_GET['id_del'])) {
    $sqldelete = "DELETE FROM student WHERE id='" . $_GET['id_del'] . "'";
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
        <title>Book Search</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <nav class="navbar navbar-inverse" style="font-size: 18px">
            <div class="container-fluid">
                <div class="navbar-header" style="padding-right: 20px;font-size: 30px;font-family: 'Comic Sans MS', cursive, sans-serif;">
                    <a class="navbar-brand" href="#">Maktabtk</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li ><a href="admin_index.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="dropdown ">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="admin_book.php"><span class="glyphicon glyphicon-menu-hamburger"></span> Books <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="add_book.php"><span class="glyphicon glyphicon-plus-sign"></span>  Add Books</a></li>
                                <li><a href="admin_book.php"><span class="glyphicon glyphicon-cog"></span>  Edit Books</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="student_details.php"><span class="glyphicon glyphicon-user"></span>  Students Details</a></li> 	
                        <li><a href="view_feedback.php"><span class="glyphicon glyphicon-list-alt"></span>  View FeedBack</a></li> 	
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
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
        <section style="width: 1520px">
            <div class="container">
                <h1 class="text3">Student In Library</h1>

            </div>

            <div class = "container" style = "width: 1400px; margin-top: 5px">
                <!--search bar -->
                <form class="example" action="student_search_process.php" style="max-width:400px;">
                    <input class="form-control" type="text" placeholder="Search By Student User Name..." name="searchbar_student" required="">
                    <button name="searchbtn" type="submit" ><i class="fa fa-search"></i></button>
                </form>
                <table class = "table table-hover"  >
                    <thead style="font-size: 18px;color: whitesmoke; background-color: midnightblue;">
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Roll</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>

                        <?php
                        $query = $_GET['searchbar_student'];
                        $da = $query;
                        //$min_length = 2;
                        //if (strlen($query) >= $min_length) {



                        $raw_results = mysqli_query($conn, "SELECT * FROM `student` WHERE username LIKE '%$da%'");


                        if (mysqli_num_rows($raw_results)) {
                            while ($raws = mysqli_fetch_assoc($raw_results)) {
                                // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                                 echo '<tr>
                                    <td>' . $raws['id'] . '</td>
                                    <td>' . $raws['first name'] . '</td>
                                    <td>' . $raws['last name'] . '</td>
                                    <td>' . $raws['username'] . '</td>
                                    <td>' . $raws['email'] . '</td>
                                    <td>' . $raws['roll'] . '</td>
                                   '
                            ;
                            echo'<td><a class="btn btn-info btn-xs" href="edit_student.php?edit_id=' . $raws['id'] . '">Edit</a></td>
                            <td><a class="btn btn-danger btn-xs"href="student_details.php?id_del=' . $raws['id'] . '">Delete</a></td>
                            </tr>';
                                // posts results gotten from database(title and text) you can also show id ($results['id'])
                            }
                        } else { // if one or more rows are returned do following
                            //die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
                            echo '<br><h4 style="color:red;">Student UserName Not Found!</h4>';
                        }


                        /* } else { // if query length is less than minimum
                          echo "Minimum length is " . $min_length;
                          } */
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