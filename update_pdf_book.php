<?php
include 'db.php';

session_start();

if (!$_SESSION['user_name3']) {

    header("Location: index2.php"); //redirect to the login page to secure the welcome page without login access.  
}

if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $edit_sql = "select * FROM pdf WHERE id='" . $_GET['update_id'] . "'";
    $run_sql = mysqli_query($conn, $edit_sql);
    while ($raws = mysqli_fetch_array($run_sql)) {

        $edName = $raws['name'];
        $edAuthors = $raws['authors'];
        $edRefrence = $raws['ref'];
    }
} else {
    $edName = $raws['name'];
    $edAuthors = $raws['authors'];
    $edRefrence = $raws['ref'];
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
            background-image: url("image/lib9.jpg");

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
                    <h1 class="text3" style="margin-right: 0px;font-size: 50px;color: #333333;">Book Raw</h1>
                    <form class="form-horizontal" action="" method="post" role="form" style="font-size: 20px">
                        
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-3">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" value="<?php echo $edName; ?>" placeholder="Enter Name Of Book" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Authors</label>
                            <div class="col-sm-6">
                                <input type="text" name="authors" class="form-control" value="<?php echo $edAuthors; ?>" placeholder="Enter Name Of Authors">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label col-sm-3">Edition</label>
                            <div class="col-sm-6">
                                <input type="text" name="ref" class="form-control" value="<?php echo $edRefrence; ?>" placeholder="Enter The Reference of The Book">
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary mb-2" name="btn"><span class="glyphicon glyphicon-floppy-disk"></span> Update Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        if (isset($_POST['btn'])) {

            
            $edName = $_POST['name'];
            $edAuthors = $_POST['authors'];
            $edRef = $_POST['ref'];
            

            $ins_sql = "UPDATE `books` SET `name`='$edName',`authors`='$edAuthors',`edition`='$edRef' WHERE id = '$id'";
            $run_sql = mysqli_query($conn, $ins_sql);

            if (!$run_sql) {
                die(json_encode(array('result' => false, 'message' => 'Could not enter data: ' . mysql_error())));
                ?>
                <script type="text/javascript">
                    alert("Please Try Update Book Again");
                    window.location = "admin_pdf_books.php"
                </script>
                <?php
            } else {
                /* echo json_encode(array('result' => true, 'message' => 'Entered data successfully')); */
                ?>
                <script type="text/javascript">
                    alert("Book Update Successfully");
                    window.location = "admin_pdf_books.php"
                </script>
                <?php
            }
        }
        ?>

        <footer style="width: 1520px; height: 130px">

            <?php
            include "./footer.php";
            ?>
        </footer>
    </body>
</html>
